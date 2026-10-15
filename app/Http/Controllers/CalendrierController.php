<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Sport;

class CalendrierController extends Controller
{
    public function index(Request $request)
    {
        // Récupère tous les tours avec leurs sports et lieux, triés par date
        $query = Tour::with(['sport', 'lieu'])->orderBy('date');

        // Si un sport est sélectionné, on filtre
        if ($request->sport_id) {
            $query->where('sport_id', $request->sport_id);
            $sports = Sport::where('id', $request->sport_id)->get();
        } else {
            $sports = Sport::all();
        }

        // Groupe les tours par date pour l'affichage en tableau
        $tours = $query->get()->groupBy('date');

        return view('calendrier.index', compact('tours', 'sports'));
    }
}