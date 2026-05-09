<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Spectateur;
use App\Models\Reservation;

class ReservationController extends Controller
{
    // Afficher le formulaire de réservation
    public function index()
    {
        // Récupèrer le panier en session
        $panier = session()->get('panier', []);

        // Si le panier est vide, on redirige vers la billetterie
        if (empty($panier)) {
            return redirect('/billetterie')->with('error', 'Votre panier est vide !');
        }

        // Récupère les infos de chaque tour du panier
        $tours = [];
        foreach ($panier as $tour_id => $item) {
            $tours[$tour_id] = [
                'tour' => Tour::with(['sport', 'lieu'])->find($tour_id),
                'quantite' => $item['quantite']
            ];
        }

        return view('reservation.index', compact('tours'));
    }

    // Enregistrer la réservation en base de données
    public function confirmer(Request $request)
    {
        // Vérifier que les champs obligatoires sont remplis
        $request->validate([
            'prenom'    => 'required',
            'nom'       => 'required',
            'email'     => 'required|email',
            'telephone' => 'required',
            'personnes' => 'required|array',
        ]);


        $reservations = [];

        // Pour chaque billet on crée un spectateur et une réservation
        foreach ($request->personnes as $personne) {

            // Créer le spectateur avec les infos saisies
            // Email et téléphone sont identiques pour tous les billets de la commande
            $spectateur = Spectateur::create([
                'prenom'    => $personne['prenom'],
                'nom'       => $personne['nom'],
                'email'     => $request->email,
                'telephone' => $request->telephone,
            ]);

            // Créer la réservation qui lie le spectateur au tour
            Reservation::create([
                'spectateur_id' => $spectateur->id,
                'tour_id'       => $personne['tour_id'],
            ]);

            // Stocker les infos pour afficher le récapitulatif
            $reservations[] = [
                'spectateur' => $spectateur,
                'tour' => Tour::with(['sport', 'lieu'])->find($personne['tour_id']),
            ];
        }

        // Vider le panier après confirmation
        session()->forget('panier');

        // Rediriger vers la page de confirmation avec le récapitulatif
        return redirect('/confirmation')->with([
            'success' => 'Réservation confirmée !',
            'recap' => [
                'prenom'       => $request->prenom,
                'nom'          => $request->nom,
                'email'        => $request->email,
                'telephone'    => $request->telephone,
                'reservations' => $reservations,
            ]
        ]);
    }

    // Afficher la page de confirmation
    public function confirmation()
    {
        return view('reservation.confirmation');
    }
}