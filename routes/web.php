<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EnseignantController;

Route::get('/', function () {
    return view('welcome');
});

// Route centrale qui redirige selon le rôle
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');
// Dashboards par rôle
Route::get('/admin/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth'])
    ->name('admin.dashboard');

Route::get('/etudiant/dashboard', [EtudiantController::class, 'index'])
    ->middleware(['auth'])
    ->name('etudiant.dashboard');

Route::get('/enseignant/dashboard', [EnseignantController::class, 'index'])
    ->middleware(['auth'])
    ->name('enseignant.dashboard');

// Routes de Admin
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/formations', [AdminController::class, 'formations'])->name('admin.formations.index');

    Route::get('/formations/create', [AdminController::class, 'createFormation'])->name('admin.formations.create');
    Route::post('/formations', [AdminController::class, 'storeFormation'])->name('admin.formations.store');

    Route::get('/formations/{formation}/edit', [AdminController::class, 'editFormation'])->name('admin.formations.edit');
    Route::put('/formations/{formation}', [AdminController::class, 'updateFormation'])->name('admin.formations.update');

    Route::delete('/formations/{formation}', [AdminController::class, 'destroyFormation'])->name('admin.formations.destroy');
    Route::get('/modules', [AdminController::class, 'modules'])->name('admin.modules.index');

    Route::get('/modules/create', [AdminController::class, 'createModule'])->name('admin.modules.create');
    Route::post('/modules', [AdminController::class, 'storeModule'])->name('admin.modules.store');

    Route::get('/modules/{module}/edit', [AdminController::class, 'editModule'])->name('admin.modules.edit');
    Route::put('/modules/{module}', [AdminController::class, 'updateModule'])->name('admin.modules.update');

    Route::delete('/modules/{module}', [AdminController::class, 'destroyModule'])->name('admin.modules.destroy');
});
// Routes de Enseignant

Route::middleware(['auth'])->prefix('enseignant')->name('enseignant.')->group(function () {    
        Route::get('/',            [EnseignantController::class, 'index'])->name('dashboard');
        Route::get('/mes-modules', [EnseignantController::class, 'modulesIndex'])->name('modules.index');
        // 1) Liste de tous mes supports
        Route::get('supports',  [EnseignantController::class, 'supportsIndex'])->name('supports.index');

    // 2) Formulaire de dépôt d’un support
    Route::get('supports/create', 
        [EnseignantController::class, 'supportsCreate']
    )->name('supports.create');

    // (optionnel : gestion du POST)
    Route::post('supports', 
        [EnseignantController::class, 'supportsStore']
    )->name('supports.store');
    // 3) Afficher un support (incrémente “views”)
    Route::get('supports/{support}', 
    [EnseignantController::class, 'showSupport']
)->name('supports.show');

// 4) Télécharger un support (incrémente “downloads”)
    Route::get('supports/{support}/download', 
    [EnseignantController::class, 'downloadSupport']
)->name('supports.download');
// Formulaire d’édition d’un support
    Route::get('supports/{support}/edit', 
    [EnseignantController::class, 'editSupport']
)->name('supports.edit');

// Traitement de la mise à jour
    Route::put('supports/{support}', 
    [EnseignantController::class, 'updateSupport']
)->name('supports.update');

// Suppression d’un support
    Route::delete('supports/{support}', 
    [EnseignantController::class, 'destroySupport']
)->name('supports.destroy');

    });
// Routes de Etudiant
Route::middleware(['auth'])->prefix('etudiant')->name('etudiant.')->group(function () {
    // 1) Liste de tous les modules de sa formation
    Route::get('modules', [EtudiantController::class, 'modulesIndex'])
         ->name('modules.index');
    // 2) Vue générique des supports (sans module) – fonction normale
    Route::get('supports', [EtudiantController::class, 'supportsIndex'])
         ->name('supports.index');
         // Aperçu du support (PDF ou autre)
    Route::get('/support/{id}/preview', [EtudiantController::class, 'preview'])->name('support.preview');

// Téléchargement du fichier
    Route::get('/support/{id}/download', [EtudiantController::class, 'download'])->name('support.download');
// Route POST pour soumettre une évaluation
    Route::post('/support/{id}/evaluer', [EtudiantController::class, 'evaluer'])->name('support.evaluer');
    
    Route::post('/support/{id}/commenter',[EtudiantController::class, 'commenter'])->name('support.commenter');

     // Liste des favoris
    Route::get('favoris', [EtudiantController::class, 'indexFavoris'])
         ->name('favoris.index');

    // Ajouter un favori
    Route::post('favoris/{support}', [EtudiantController::class, 'storeFavoris'])
         ->name('favoris.store');

    // Retirer un favori
    Route::delete('favoris/{support}', [EtudiantController::class, 'destroyFavoris'])
         ->name('favoris.destroy');
    Route::get('compte', [EtudiantController::class, 'CompteShow'])
     ->name('compte.show');
});



require __DIR__.'/auth.php';
