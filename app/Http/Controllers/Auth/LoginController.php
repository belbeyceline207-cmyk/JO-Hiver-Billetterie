<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Afficher le formulaire de connexion
    public function showForm()
    {
        return view('auth.login');
    }

    // Connecter l'utilisateur
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/organisateur');
        }

        return back()->withErrors(['email' => 'Identifiants incorrects !']);
    }

    // Déconnecter l'utilisateur
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
