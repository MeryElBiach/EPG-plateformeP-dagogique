<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
    {
        $user = Auth::user();

        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'etudiant':
                return redirect()->route('etudiant.dashboard');
            case 'enseignant':
                return redirect()->route('enseignant.dashboard');
            default:
                abort(403, 'Rôle non reconnu.');
        }
    }
}
