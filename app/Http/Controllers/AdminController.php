<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Routing\Attributes\Middleware;

#[Middleware('auth')] // 👈 protège tout le contrôleur
class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            abort(Response::HTTP_FORBIDDEN, 'Accès non autorisé.');
        }

        return view('Admin.dash');
    }
}
