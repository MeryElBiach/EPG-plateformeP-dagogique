<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Routing\Attributes\Middleware;
use App\Models\Formation;
use App\Models\Module;
use App\Models\User; 

#[Middleware('auth')] 
class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            abort(Response::HTTP_FORBIDDEN, 'Accès non autorisé.');
        }

        return view('Admin.dash');
    }
    public function formations()
{
    $formations = Formation::latest()->get();

    return view('Admin.formations.index', compact('formations'));
}
   public function createFormation()
{
    return view('Admin.formations.create');
}

    public function storeFormation(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    Formation::create($request->only('nom', 'description'));

    return redirect()->route('admin.formations.index')->with('success', 'Formation ajoutée avec succès.');
}

    public function editFormation(Formation $formation)
    {
    return view('Admin.formations.edit', compact('formation'));
}

    public function updateFormation(Request $request, Formation $formation)
    {
    $request->validate([
        'nom' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    $formation->update($request->only('nom', 'description'));

    return redirect()->route('admin.formations.index')->with('success', 'Formation mise à jour.');
}

    public function destroyFormation(Formation $formation)
{
    $formation->delete();

    return redirect()->route('admin.formations.index')->with('success', 'Formation supprimée.');
}

// modules
public function modules()
{
    /* On charge CHAQUE formation avec ses modules et l’enseignant lié */
    $formations = Formation::with(['modules.enseignant'])
                           ->orderBy('nom')
                           ->get();

    /* On envoie $formations à la vue (plus $modules) */
    return view('Admin.modules.index', compact('formations'));
}

public function createModule()
{
    $formations  = Formation::all();
        // 2) on fournit la liste des utilisateurs dont rôle = enseignant
        $enseignants = User::where('role', 'enseignant')->get();

        return view('Admin.modules.create', compact('formations', 'enseignants'));
}

 public function storeModule(Request $request)
    {
        // 3) on valide aussi la clé enseignante (nullable → module « à pourvoir » possible)
        $validated = $request->validate([
            'nom'           => ['required', 'string', 'max:255'],
            'elements'      => ['nullable', 'string'],
            'formation_id'  => ['required', 'exists:formations,id'],
            'enseignant_id' => ['nullable', 'exists:users,id'],
        ]);

  Module::create($validated);

        return redirect()
            ->route('admin.modules.index')
            ->with('success', 'Module créé avec succès.');
}

  public function editModule(Module $module)
    {
        $formations  = Formation::all();
        $enseignants = User::where('role', 'enseignant')->get();

        return view('Admin.modules.edit', compact('module', 'formations', 'enseignants'));
    }

  public function updateModule(Request $request, Module $module)
    {
        $validated = $request->validate([
            'nom'           => ['required', 'string', 'max:255'],
            'elements'      => ['nullable', 'string'],
            'formation_id'  => ['required', 'exists:formations,id'],
            'enseignant_id' => ['nullable', 'exists:users,id'],
        ]);

     $module->update($validated);

        return redirect()
            ->route('admin.modules.index')
            ->with('success', 'Module mis à jour.');
    }
public function destroyModule(Module $module)
    {
        $module->delete();

        return redirect()
            ->route('admin.modules.index')
            ->with('success', 'Le module « '.$module->nom.' » a été supprimé.');
    }
}
