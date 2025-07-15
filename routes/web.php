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

// Routes Breeze pour le profil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
