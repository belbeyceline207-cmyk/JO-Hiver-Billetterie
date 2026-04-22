<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Sport;

class CalendrierController extends Controller
{
    public function index(Request $request)
    {
        $query = Tour::with(['sport','lieu'])->orderBy('date');

        //filtrer par sport
        if ($request->has('sport_id') && $request->sport_id != ''){
            $query->where('sport_id', $request->sport_id);
            $sports = Sport::where('id', $request->sport_id)->get(); // ← seulement le sport filtré
        } else {
         $sports = Sport::all(); // ← tous les sports
        }
        $tours = $query->get()->groupBy('date'); // Grouper par jour

        return view('calendrier.index', compact('tours','sports'));
    }
}
