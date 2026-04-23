<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Sport;
use App\Models\Lieu;
use App\Models\Reservation;

class OrganisateurController extends Controller
{
    // Dashboard principal
    public function index()
    {
        $tours = Tour::with(['sport', 'lieu'])
            ->withCount('reservations')
            ->get()
            ->map(function($tour) {
                $tour->places_disponibles = $tour->lieu->capacite - $tour->reservations_count;
                return $tour;
            });

        $reservations = Reservation::with(['spectateur', 'tour.sport', 'tour.lieu'])->get();
        $sports = Sport::all();
        $lieux = Lieu::all();

        return view('organisateur.index', compact('tours', 'reservations', 'sports', 'lieux'));
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

    // Modifier une compétition
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
        return redirect('/organisateur')->with('success', '✅ Compétition modifiée !');
    }

    // Supprimer une compétition
    public function destroy($id)
    {
        Tour::findOrFail($id)->delete();
        return redirect('/organisateur')->with('success', '🗑️ Compétition supprimée !');
    }
}
