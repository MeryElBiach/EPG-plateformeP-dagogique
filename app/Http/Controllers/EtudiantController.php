<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Support;
use App\Models\Evaluation;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EtudiantController extends Controller
{
    /**
     * Tableau de bord de l'étudiant
     */
    public function index()
    {
        $student = Auth::user();
        abort_if($student->role !== 'etudiant', 403);

        // 1) Sa formation
        $formation = $student->formation;

        // 2) Nombre de modules de sa formation
        $modulesCount = $formation->modules()->count();

        // 3) Nombre total de supports disponibles pour sa formation
        $supportsCount = Support::whereHas('module', fn($q) =>
            $q->where('formation_id', $formation->id)
        )->count();

        // 4) Nombre de commentaires qu'il/elle a postés
        $commentsCount = $student->commentaires()->count();

        // 5) Moyenne des évaluations qu'il/elle a laissées
        $avgRatingGiven = $student->evaluations()->avg('valeur');
        $avgRatingGiven = $avgRatingGiven ? round($avgRatingGiven, 1) : '–';

        // 6) Derniers supports ajoutés dans sa formation
        $recentSupports = Support::whereHas('module', fn($q) =>
            $q->where('formation_id', $formation->id)
        )
        ->latest()
        ->take(3)
        ->get();

        return view('Etudiant.dash', compact(
            'student',
            'formation',
            'modulesCount',
            'supportsCount',
            'commentsCount',
            'avgRatingGiven',
            'recentSupports'
        ));
    }
    public function modulesIndex()
    {
        $student = Auth::user();
        abort_if($student->role !== 'etudiant', 403);

        // Récupère sa formation et ses modules
        $formation = $student->formation;
        $modules   = $formation->modules()->withCount('supports')->get();

        return view('Etudiant.Module.index', compact(
            'formation',
            'modules'
        ));
    }
public function supportsIndex()
{
    $student = Auth::user();
    abort_if($student->role !== 'etudiant', 403);

    // Charge modules + supports + commentaires (avec l'étudiant) + notes moyennes
    $modules = Module::with([
        'supports' => function($q) {
            $q->withCount('commentaires')
              ->withAvg('evaluations', 'valeur')
              ->with(['commentaires' => function($qq) {
                  $qq->latest()->limit(3)->with('etudiant');
              }]);
        }
    ])
    ->where('formation_id', $student->formation_id)
    ->orderBy('nom')
    ->get();

    // Injecte la note de l'étudiant dans chaque support
    foreach($modules as $module) {
        foreach($module->supports as $support) {
            $support->user_note = Evaluation::where('etudiant_id', $student->id)
                ->where('support_id', $support->id)
                ->value('valeur');
        }
    }

    $favIds = Auth::user()->favoris()->pluck('support_id')->toArray();

return view('Etudiant.Support.index', compact('modules','student','favIds'));
}

public function preview($id)
{
    $support = Support::findOrFail($id);
    $support->increment('views'); // Compteur de vues

    // On redirige directement vers le PDF dans le dossier public/supports/
    return redirect(asset('storage/'.$support->fichier));
}

// Téléchargement du fichier
  public function download($id)
{
    $support = Support::findOrFail($id);
    $support->increment('downloads');

    // Chemin physique
    $filePath = public_path('storage/'.$support->fichier);
    $nomFichier = $support->titre.'.'.pathinfo($filePath, PATHINFO_EXTENSION);

    if (file_exists($filePath)) {
        return response()->download($filePath, $nomFichier);
    } else {
        return back()->with('error', 'Fichier introuvable.');
    }
}
public function evaluer(Request $request, $id)
{
    // 1. Validation du champ "note"
    $request->validate([
        'note' => 'required|integer|min:1|max:5',
    ]);

    // 2. Récupère le support
    $support = Support::findOrFail($id);

    // 3. ID de l'étudiant connecté
    $etudiantId = Auth::id();

    // 4. Recherche une évaluation existante pour ce support/étudiant
    $evaluation = Evaluation::where('etudiant_id', $etudiantId)
                            ->where('support_id', $support->id)
                            ->first();

    if ($evaluation) {
        // 5a. Si déjà noté, on met à jour la note
        $evaluation->valeur = $request->note;
        $evaluation->save();
    } else {
        // 5b. Sinon, on crée une nouvelle évaluation
        Evaluation::create([
            'valeur' => $request->note,
            'etudiant_id' => $etudiantId,
            'support_id' => $support->id,
        ]);
    }

    // 6. Retour avec message de succès
    return back()->with('success', 'Votre note a bien été enregistrée !');
}
public function commenter(Request $request, $id)
{
    $request->validate([
        'contenu' => 'required|string|max:500',
    ]);

    $support = Support::findOrFail($id);

    Commentaire::create([
        'contenu'     => $request->contenu,
        'etudiant_id' => Auth::id(),
        'support_id'  => $support->id,
    ]);

    return back()->with('success', 'Commentaire publié !');
}
      public function indexFavoris()
    {
        $user     = Auth::user();
        // Charge les supports favoris de l'étudiant, avec pagination ou pas
        $favoris  = $user->favoris()  // relation à définir
                          ->with('module')
                          ->paginate(9);

        return view('Etudiant.Favoris.index', compact('favoris'));
    }

    // Ajoute un support aux favoris (sans dupliquer)
    public function storeFavoris(Support $support)
    {
        $user = Auth::user();
        $user->favoris()->syncWithoutDetaching([$support->id]);

        return back()->with('success', 'Support ajouté à vos favoris.');
    }

    // Retire un support des favoris
    public function destroyFavoris(Support $support)
    {
        $user = Auth::user();
        $user->favoris()->detach($support->id);

        return back()->with('success', 'Support retiré de vos favoris.');
    }
    public function CompteShow()
    {
        $user = Auth::user();
        return view('Etudiant.compte.show', compact('user'));
    }

}
