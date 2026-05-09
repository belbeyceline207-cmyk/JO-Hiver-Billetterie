<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;

class PanierController extends Controller
{
    // Afficher le contenu du panier
    public function index()
    {
        // Récupèrer le panier stocké en session (tableau vide si pas de panier)
        $panier = session()->get('panier', []);
        $tours = [];

        // Pour chaque billet dans le panier, on récupère les infos du tour
        foreach ($panier as $tour_id => $item) {
            $tours[$tour_id] = [
                'tour' => Tour::with(['sport', 'lieu'])->find($tour_id),
                'quantite' => $item['quantite']
            ];
        }

        // Calcul du total
        $total = 0;
        foreach ($tours as $item) {
            $total += $item['tour']->prix * $item['quantite'];
        }

        return view('panier.index', compact('tours', 'total'));
    }

    // Ajouter un billet au panier
    public function ajouter(Request $request)
    {
        $panier = session()->get('panier', []);
        $tour_id = $request->tour_id;

        if (isset($panier[$tour_id])) {
            // Si le tour est déjà dans le panier, on augmente la quantité
            $panier[$tour_id]['quantite'] += $request->quantite;
        } else {
            // Sinon on l'ajoute
            $panier[$tour_id] = ['quantite' => $request->quantite];
        }

        // Sauvegarder le panier en session
        session()->put('panier', $panier);

        // Rester sur la billetterie pour continuer les achats
        return redirect('/billetterie')->with('success', 'Billet ajouté au panier !');
    }

    // Supprimer un billet du panier
    public function supprimer($tour_id)
    {
        $panier = session()->get('panier', []);
        // Supprime le tour du tableau panier
        unset($panier[$tour_id]);
        session()->put('panier', $panier);
        return redirect('/panier')->with('success', 'Billet supprimé du panier !');
    }

    // Vider complètement le panier
    public function vider()
    {
        // Supprimer le panier de la session
        session()->forget('panier');
        return redirect('/panier')->with('success', 'Panier vidé !');
    }
}