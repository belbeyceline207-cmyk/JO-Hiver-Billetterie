<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Sport;
use App\Models\Lieu;
use App\Models\Reservation;

class OrganisateurController extends Controller
{
    // Dashboard
    public function index()
    {
        return view('organisateur.index');
    }

    // Formulaire ajouter
    public function createForm()
    {
        $sports = Sport::all();
        $lieux = Lieu::all();
        return view('organisateur.create', compact('sports', 'lieux'));
    }

    // Ajouter une compétition
    public function store(Request $request)
    {
        $request->validate([
            'sport_id'    => 'required|exists:sports,id',
            'lieu_id'     => 'required|exists:lieux,id',
            'type'        => 'required|in:qualifications,finale',
            'date'        => 'required|date',
            'heure_debut' => 'required',
            'heure_fin'   => 'required',
            'prix'        => 'required|numeric|min:0',
        ]);

        Tour::create($request->all());
        return redirect('/organisateur')->with('success', '✅ Compétition ajoutée !');
    }

    // Liste des compétitions
    public function liste()
    {
        $tours = Tour::with(['sport', 'lieu'])
            ->withCount('reservations')
            ->get()
            ->map(function($tour) {
                $tour->places_disponibles = $tour->lieu->capacite - $tour->reservations_count;
                return $tour;
            });
        $sports = Sport::all();
        $lieux = Lieu::all();
        return view('organisateur.liste', compact('tours', 'sports', 'lieux'));
    }

    // Modifier
    public function update(Request $request, $id)
    {
        $request->validate([
            'sport_id'    => 'required|exists:sports,id',
            'lieu_id'     => 'required|exists:lieux,id',
            'type'        => 'required|in:qualifications,finale',
            'date'        => 'required|date',
            'heure_debut' => 'required',
            'heure_fin'   => 'required',
            'prix'        => 'required|numeric|min:0',
        ]);

        Tour::findOrFail($id)->update($request->all());
        return redirect('/organisateur/competitions/liste')->with('success', '✅ Compétition modifiée !');
    }

    // Supprimer
    public function destroy($id)
    {
        Tour::findOrFail($id)->delete();
        return redirect('/organisateur/competitions/liste')->with('success', '🗑️ Compétition supprimée !');
    }

    // Réservations
    public function reservations()
    {
        $reservations = Reservation::with(['spectateur', 'tour.sport', 'tour.lieu'])->get();
        return view('organisateur.reservations', compact('reservations'));
    }

    // Stats
    public function stats()
    {
        $tours = Tour::with(['sport', 'lieu'])
            ->withCount('reservations')
            ->get()
            ->map(function($tour) {
                $tour->places_disponibles = $tour->lieu->capacite - $tour->reservations_count;
                return $tour;
            });
        return view('organisateur.stats', compact('tours'));
    }
}