<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Routing\Attributes\Middleware;
use App\Models\Formation;
use App\Models\Module;

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
    $modules = Module::with('formation')->latest()->get();
    return view('Admin.modules.index', compact('modules'));
}

public function createModule()
{
    $formations = Formation::all();
    return view('Admin.modules.create', compact('formations'));
}

public function storeModule(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'elements' => 'nullable|string',
        'formation_id' => 'required|exists:formations,id',
    ]);

    Module::create($request->only(['nom', 'elements', 'formation_id']));

    return redirect()->route('admin.modules.index')->with('success', 'Module ajouté avec succès.');
}

public function editModule(Module $module)
{
    $formations = Formation::all();
    return view('Admin.modules.edit', compact('module', 'formations'));
}

public function updateModule(Request $request, Module $module)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'elements' => 'nullable|string',
        'formation_id' => 'required|exists:formations,id',
    ]);

    $module->update($request->only(['nom', 'elements', 'formation_id']));

    return redirect()->route('admin.modules.index')->with('success', 'Module modifié avec succès.');
}

}
