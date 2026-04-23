<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;

class PanierController extends Controller
{
    // Voir le panier 
    public function index()
    {
        $panier = session()->get('panier', []);
        $tours = [];

        foreach($panier as $tour_id => $item ){
            $tours[$tour_id] = [
                'tour' => Tour::with(['sport','lieu']) -> find($tour_id) ,
                'quantite' => $item['quantite']
            ];
        }
        $total = array_sum(array_map(function($item){
            return $item['tour']->prix * $item['quantite'];
        }, $tours));

        return view('panier.index', compact('tours', 'total'));
    }

    // ajout au panier
    public function ajouter(Request $request)
    {
        $panier = session()->get('panier', []);
        $tour_id = $request->tour_id;
        
        if (isset($panier[$tour_id])) {
            // Si le tour est déjà dans le panier → on augmente la quantité
            $panier[$tour_id]['quantite'] += $request->quantite;
        } else {
            // Sinon → on l'ajoute
            $panier[$tour_id] = ['quantite' => $request->quantite];
        }
        
        session()->put('panier', $panier);
        // ✅ On reste sur la billetterie au lieu d'aller au panier
    return redirect('/billetterie')->with('success', '🛒 Billet ajouté au panier !');
    }

    // Supprimer du panier
    public function supprimer($tour_id)
    {
        $panier = session()->get('panier', []);
        unset($panier[$tour_id]);
        session()->put('panier', $panier);
        return redirect('/panier')->with('success', '🗑️ Billet supprimé du panier !');
    }

    //vider le panier
    public function vider()
    {
        session()->forget('panier');
        return redirect('/panier')->with('success', 'Panier vidé !');
    }

}
