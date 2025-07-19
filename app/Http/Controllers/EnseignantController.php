<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Routing\Attributes\Middleware;

#[Middleware('auth')]
class EnseignantController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'enseignant') {
            abort(Response::HTTP_FORBIDDEN, 'Accès non autorisé.');
        }

        return view('Enseignant.dash');
    }
}