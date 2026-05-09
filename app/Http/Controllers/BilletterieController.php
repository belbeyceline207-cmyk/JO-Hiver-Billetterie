<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;

class BilletterieController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Tour::with(['sport','lieu'])->orderBy('prix');
        // Filtre prix min
        if ($request->prix_min) {
            $query->where('prix', '>=', $request->prix_min);
        }
        // Filtre prix max
        if ($request->prix_max) {
            $query->where('prix', '<=', $request->prix_max);
        }
        $tours = $query->get();
         return view('billetterie.index', compact('tours'));
    }
}
