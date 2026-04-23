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
        $panier = session()->get('panier', []);

        if (empty($panier)) {
            return redirect('/billetterie')->with('error', 'Votre panier est vide !');
        }

        $tours = [];
        foreach ($panier as $tour_id => $item) {
            $tours[$tour_id] = [
                'tour' => Tour::with(['sport', 'lieu'])->find($tour_id),
                'quantite' => $item['quantite']
            ];
        }

        return view('reservation.index', compact('tours'));
    }

    // Enregistrer la réservation
    public function confirmer(Request $request)
    {
        // Validation
        $request->validate([
            'prenom'              => 'required|string|max:255',
            'nom'                 => 'required|string|max:255',
            'email'               => 'required|email',
            'telephone'           => 'required|string',
            'personnes'           => 'required|array',
            'personnes.*.prenom'  => 'required|string',
            'personnes.*.nom'     => 'required|string',
            'personnes.*.tour_id' => 'required|exists:tours,id',
        ]);

        // Stocker les réservations pour le récap
        $reservations = [];

        // Pour chaque personne → créer spectateur + réservation
        foreach ($request->personnes as $personne) {
            $spectateur = Spectateur::create([
                'prenom'    => $personne['prenom'],
                'nom'       => $personne['nom'],
                'email'     => $request->email,
                'telephone' => $request->telephone,
            ]);

            Reservation::create([
                'spectateur_id' => $spectateur->id,
                'tour_id'       => $personne['tour_id'],
            ]);

            // On stocke les infos pour le récap
            $reservations[] = [
                'spectateur' => $spectateur,
                'tour' => Tour::with(['sport', 'lieu'])->find($personne['tour_id']),
            ];
        }

        // Vider le panier
        session()->forget('panier');

        // Passer le récap à la page de confirmation
        return redirect('/confirmation')->with([
            'success' => '🎉 Réservation confirmée !',
            'recap' => [
                'prenom'       => $request->prenom,
                'nom'          => $request->nom,
                'email'        => $request->email,
                'telephone'    => $request->telephone,
                'reservations' => $reservations,
            ]
        ]);
    }

     // Page de confirmation
    public function confirmation()
    {
        return view('reservation.confirmation');
    }
}
