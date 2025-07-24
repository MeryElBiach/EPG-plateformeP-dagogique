<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;  
use App\Models\Module;
use App\Models\Support;
use App\Models\Formation;
use App\Models\Commentaire;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class EnseignantController extends Controller
{
    /*──────────────────────────────────────────────────────────
    |  DASHBOARD (accueil prof)                                |
    ──────────────────────────────────────────────────────────*/
    public function index()
    {
        $teacher = Auth::user();
        abort_if($teacher->role !== 'enseignant', 403);

        $teacherId = $teacher->id;

        /* 1)  Compter tous les supports du prof */
        $supportsCount = Support::where('enseignant_id', $teacherId)->count();

        /* 2)  Compter TOUS les commentaires (pas de champ “vue_le”)  */
        $commentsCount = Commentaire::whereHas('support', fn ($q) =>
                $q->where('enseignant_id', $teacherId)
            )->count();

        /* 3)  Moyenne des évaluations (arrondie à 1 déc.)            */
        $avgRating = Evaluation::whereHas('support', fn ($q) =>
                $q->where('enseignant_id', $teacherId)
            )->avg('valeur');
        $avgRating = $avgRating ? round($avgRating, 1) : '–';

        /* 4)  Dernier support déposé                                 */
        $lastSupport = Support::where('enseignant_id', $teacherId)->latest()->first();

        /* 5)  Formations concernées                                  */
        $formations = Formation::whereHas('modules', fn ($q) =>
                    $q->where('enseignant_id', $teacherId)
                )
                ->withCount([
                    'modules as modules_count' => fn ($q) =>
                        $q->where('enseignant_id', $teacherId)
                ])
                ->orderBy('nom')
                ->get();

        /* 6)  Derniers supports et commentaires (3) pour l’activité  */
        $recentSupports = Support::where('enseignant_id', $teacherId)
                            ->latest()->take(3)->get();

        $recentComments = Commentaire::with('support:id,titre')
                            ->whereHas('support', fn ($q) =>
                                $q->where('enseignant_id', $teacherId)
                            )
                            ->latest()->take(3)->get();

        /* 7)  “À faire” : supports sans fichier (ex : brouillons)    */
        $todos = Support::where('enseignant_id', $teacherId)
                    ->whereNull('fichier')
                    ->take(3)->get();

        return view('Enseignant.dash', compact(
            'teacher', 'supportsCount', 'commentsCount', 'avgRating',
            'lastSupport', 'formations', 'recentSupports', 'recentComments', 'todos'
        ));
    }

    /*──────────────────────────────────────────────────────────
    |  MES MODULES (liste avec cartes)                         |
    ──────────────────────────────────────────────────────────*/
    public function modulesIndex(Request $request)
    {
        $teacher = Auth::user();
        abort_if($teacher->role !== 'enseignant', 403);

        /* ───── 1. Récupérer les modules + supports associés ───── */
        $modules = Module::with([
                'formation',
                'supports:id,module_id,type,titre,created_at'
            ])
            ->withCount('supports')               // → $module->supports_count
            ->where('enseignant_id', $teacher->id)
            ->orderBy('nom')
            ->get()
            ->map(function ($m) {

                /* ───── 2. Vérifier la présence des 3 TYPES obligatoires ───── */
                $m->has_cours    = $m->supports->where('type', 'cours')->isNotEmpty();
                $m->has_td       = $m->supports->where('type', 'td')->isNotEmpty();
                $m->has_solution = $m->supports->where('type', 'solution')->isNotEmpty();

                /*  Chaque type couvre 1/3 du minimum :
                 *      0 type  →  0 %
                 *      1 type  → 33 %
                 *      2 types → 66 %
                 *      3 types → 99 % (≈100)                                 */
                $covered   = ($m->has_cours ? 1 : 0)
                           + ($m->has_td ? 1 : 0)
                           + ($m->has_solution ? 1 : 0);
                $m->progress = $covered * 33;     // 0 | 33 | 66 | 99

                /* ───── 3. Compter tous les commentaires du module ───── */
                $m->comments_unread = Commentaire::whereHas('support',
                        fn ($q) => $q->where('module_id', $m->id)
                    )->count();

                /* ───── 4. Moyenne des notes des supports du module ───── */
                $m->avg_rating = Evaluation::whereHas('support',
                        fn ($q) => $q->where('module_id', $m->id)
                    )->avg('valeur');

                /* ───── 5. Dernier support (titre + date) ───── */
                $last = $m->supports->sortByDesc('created_at')->first();
                if ($last) {
                    $m->last_support_title = Str::limit($last->titre, 40);
                    $m->last_support_date  = $last->created_at;
                }

                return $m; //  ← module enrichi pour la vue
            });

        /* ───── 6. Groupés par formation pour l’accordéon ───── */
        $modulesByFormation = $modules->groupBy(fn ($m) => $m->formation->nom);

        return view('Enseignant.MesModules.index',
            compact('modulesByFormation', 'modules'));
    }
      public function supportsIndex()
    {
        $teacherId = Auth::id();

        // Récupérer tous les modules (avec leurs supports et formation)
        $modules = Module::with(['formation', 'supports'])
                         ->where('enseignant_id', $teacherId)
                         ->get();

        // (Optionnel : ici tu pourras transformer $modules en $depotData
        //  avec le découpage des éléments de chaque module)

        return view('enseignant.supports.index', [
            'modules' => $modules,
        ]);
    }
public function supportsCreate()
{
    $teacherId = Auth::id();

    $modules = Module::with('formation')
                     ->where('enseignant_id', $teacherId)
                     ->get();

    // Extract formations
    $formations = $modules->pluck('formation')
                          ->unique('id')
                          ->values();

    // Prépare le JSON pour JS, avec les titres d’éléments splittés
    $modulesJs = $modules->map(function($m) {
        return [
            'id'        => $m->id,
            'formation' => $m->formation->id,
            'name'      => $m->nom,
            'elements'  => array_filter(
                array_map(
                    'trim',
                    preg_split("/\r?\n/", $m->elements ?? '')
                ),
                fn($el) => $el !== ''
            ),
        ];
    })->toJson();

    return view('Enseignant.Supports.create', compact(
        'formations', 'modulesJs'
    ));
}
public function supportsStore(Request $request)
{
    $data = $request->validate([
        'module_id' => 'required|exists:modules,id',
        'element'   => 'required|string',
        'type'      => 'required|in:cours,td,solution',
        'fichier'   => 'nullable|file|mimes:pdf,ppt,pptx,doc,docx,zip|max:51200',
    ]);

    // Prépare les données à insérer
    $insert = [
        'module_id'      => $data['module_id'],
        'titre'          => $data['element'],
        'type'           => $data['type'],
        'enseignant_id'  => Auth::id(),
        'date_soumission'=> now(),
    ];

    if ($request->hasFile('fichier')) {
        $insert['fichier'] = $request->file('fichier')
                                    ->store('supports','public');
    }

    // Création d’un nouvel enregistrement à chaque fois
    Support::create($insert);

    return redirect()
        ->route('enseignant.supports.index')
        ->with('success', 'Support enregistré avec succès.');
}
 public function showSupport(Support $support)
    {
        // Sécurité : s’assurer que l’utilisateur est bien le propriétaire
        abort_if($support->enseignant_id !== Auth::id(), 403);

        // Incrémente le compteur de vues
        $support->increment('views');

        // Affiche une vue dédiée (à créer) ou redirige vers le PDF directement
        return view('enseignant.supports.show', compact('support'));
    }
    public function downloadSupport(Support $support)
    {
        abort_if($support->enseignant_id !== Auth::id(), 403);

        // Incrémente le compteur de téléchargements
        $support->increment('downloads');

        // Renvoie le fichier au navigateur
        return Storage::disk('public')
                      ->download($support->fichier, "{$support->titre}.pdf");
    }
     public function editSupport(Support $support)
    {
        abort_if($support->enseignant_id !== Auth::id(), 403);

        // On veut les mêmes dropdown que pour create
        $modules = Module::with('formation')
                         ->where('enseignant_id', Auth::id())
                         ->get();
        $formations = $modules->pluck('formation')
                              ->unique('id')
                              ->values();
        $modulesJs = $modules->map(fn($m) => [
            'id'        => $m->id,
            'formation' => $m->formation->id,
            'name'      => $m->nom,
            'elements'  => array_filter(
                array_map('trim', preg_split("/\r?\n/", $m->elements ?? ''))
            ),
        ])->toJson();

        return view('enseignant.supports.edit', compact(
            'support', 'formations', 'modulesJs'
        ));
    }

    /**
     * Enregistre les modifications d’un support existant.
     */
    public function updateSupport(Request $request, Support $support): RedirectResponse
    {
        abort_if($support->enseignant_id !== Auth::id(), 403);

        $data = $request->validate([
            'module_id' => 'required|exists:modules,id',
            'element'   => 'required|string',
            'type'      => 'required|in:cours,td,solution',
            'fichier'   => 'nullable|file|mimes:pdf,ppt,pptx,doc,docx,zip|max:51200',
        ]);

        $support->module_id      = $data['module_id'];
        $support->titre          = $data['element'];
        $support->type           = $data['type'];
        $support->date_soumission= now();

        if ($request->hasFile('fichier')) {
            // Optionnel : supprimer l’ancien fichier si besoin
            $support->fichier = $request->file('fichier')
                                        ->store('supports','public');
        }

        $support->save();

        return redirect()
            ->route('enseignant.supports.index')
            ->with('success', 'Support mis à jour avec succès.');
    }

    /**
     * Supprime un support.
     */
    public function destroySupport(Support $support): RedirectResponse
    {
        abort_if($support->enseignant_id !== Auth::id(), 403);

        // Optionnel : supprimer le fichier sur le disque
        if ($support->fichier) {
            Storage::disk('public')->delete($support->fichier);
        }

        $support->delete();

        return back()->with('success', 'Support supprimé.');
    }

}
