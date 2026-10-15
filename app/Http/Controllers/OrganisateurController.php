<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Sport;
use App\Models\Lieu;
use App\Models\Reservation;

class OrganisateurController extends Controller
{
    // Afficher le dashboard organisateur
    public function index()
    {
        return view('organisateur.index');
    }

    // Affiche le formulaire d'ajout de compétition
    public function createForm()
    {
        $sports = Sport::all();
        $lieux = Lieu::all();
        return view('organisateur.create', compact('sports', 'lieux'));
    }

    // Enregistrer une nouvelle compétition en base
    public function store(Request $request)
    {
        // Vérifier que tous les champs sont bien remplis
        $request->validate([
            'sport_id'    => 'required',
            'lieu_id'     => 'required',
            'type'        => 'required',
            'date'        => 'required',
            'heure_debut' => 'required',
            'heure_fin'   => 'required',
            'prix'        => 'required',
        ]);

        // Créer le tour en base avec les données du formulaire
        Tour::create($request->all());
        return redirect('/organisateur')->with('success', 'Compétition ajoutée !');
    }

    // Afficher la liste de toutes les compétitions
    public function liste()
    {
        // Récupèrer les tours avec le nombre de réservations
        $tours = Tour::with(['sport', 'lieu'])->withCount('reservations')->get();

        // Calculer les places disponibles pour chaque tour
        foreach ($tours as $tour) {
            $tour->places_disponibles = $tour->lieu->capacite - $tour->reservations_count;
        }

        $sports = Sport::all();
        $lieux = Lieu::all();
        return view('organisateur.liste', compact('tours', 'sports', 'lieux'));
    }

    // la mise à jour d'une compétition existante
    public function update(Request $request, $id)
    {
        // Vérifier que tous les champs sont remplis
        $request->validate([
            'sport_id'    => 'required',
            'lieu_id'     => 'required',
            'type'        => 'required',
            'date'        => 'required',
            'heure_debut' => 'required',
            'heure_fin'   => 'required',
            'prix'        => 'required',
        ]);

        // Trouve le tour par son id et met à jour ses données
        Tour::findOrFail($id)->update($request->all());
        return redirect('/organisateur/competitions/liste')->with('success', 'Compétition modifiée !');
    }

    // Supprimer une compétition
    public function destroy($id)
    {
        // Trouver le tour par son id et le supprime
        Tour::findOrFail($id)->delete();
        return redirect('/organisateur/competitions/liste')->with('success', 'Compétition supprimée !');
    }

    // Affiche toutes les réservations avec option de recherche
    public function reservations(Request $request)
    {
        $query = Reservation::with(['spectateur', 'tour.sport', 'tour.lieu']);

        // Si un nom ou email est saisi dans la recherche
        if ($request->search) {
            $search = $request->search ;
            $query->whereHas('spectateur', function($q) use ($search) {
                $q->where('nom', 'like', '%' . $search . '%')
                ->orWhere('prenom', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        $reservations = $query->get();
        return view('organisateur.reservations', compact('reservations'));
    }

    // Afficher les statistiques
    public function stats()
    {
        // Récupèrer les tours avec le nombre de réservations
        $tours = Tour::with(['sport', 'lieu'])->withCount('reservations')->get();

        // Calculer les places disponibles pour chaque tour
        foreach ($tours as $tour) {
            $tour->places_disponibles = $tour->lieu->capacite - $tour->reservations_count;
        }

        return view('organisateur.stats', compact('tours'));
    }
}