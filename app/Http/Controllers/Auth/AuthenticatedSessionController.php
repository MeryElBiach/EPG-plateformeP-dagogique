<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate(); // tente de connecter l'utilisateur

        $request->session()->regenerate(); // sécurise la session 

        return redirect()->intended(route('dashboard', absolute: false)); // redirection après login
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {   //C’est la méthode appelée quand tu fais POST /logout
        Auth::guard('web')->logout(); //déconnecte l'utilisateur

        $request->session()->invalidate(); // détruit les données de session

        $request->session()->regenerateToken(); // empêche les attaques CSRF

        return redirect('/'); // redirige vers la page d’accueil
    }
}

//  rediriger selon le rôle, tu peux faire ça à la place :

// $user = Auth::user();

// if ($user->role === 'admin') {
//     return redirect()->route('admin.dashboard');
// } elseif ($user->role === 'prof') {
//     return redirect()->route('prof.dashboard');
// } else {
//     return redirect()->route('etudiant.dashboard');
// }