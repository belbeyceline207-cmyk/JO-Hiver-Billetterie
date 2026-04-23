<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\BilletterieController;
use App\Http\Controllers\PanierController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calendrier', [CalendrierController::class, 'index']);

Route::get('/billetterie', [BilletterieController::class, 'index']);

Route::get('/panier', [PanierController::class, 'index']);
Route::post('/panier/ajouter', [PanierController::class, 'ajouter']);
Route::delete('/panier/supprimer/{tour_id}', [PanierController::class, 'supprimer']);
Route::post('/panier/vider', [PanierController::class, 'vider']);