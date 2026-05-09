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

    // Vérifier les identifiants et connecte l'utilisateur
    public function login(Request $request)
    {
        // Vérifier que l'email et le mot de passe sont remplis
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Auth::attempt vérifie si les identifiants correspondent à un utilisateur en base
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Connexion réussie => on redirige vers l'espace organisateur
            return redirect('/organisateur');
        }

        // Identifiants incorrects, on revient au formulaire avec un message d'erreur
        return back()->withErrors(['email' => 'Identifiants incorrects !']);
    }

    // Déconnecter l'utilisateur et rediriger vers le formulaire de connexion
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/organisateur');
    }
}