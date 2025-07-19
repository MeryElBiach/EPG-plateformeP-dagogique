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


// Routes Breeze pour le profil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
