<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\BilletterieController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OrganisateurController;
use App\Http\Controllers\HomeController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/calendrier', [CalendrierController::class, 'index']);

Route::get('/billetterie', [BilletterieController::class, 'index']);

Route::get('/panier', [PanierController::class, 'index']);
Route::post('/panier/ajouter', [PanierController::class, 'ajouter']);
Route::delete('/panier/supprimer/{tour_id}', [PanierController::class, 'supprimer']);
Route::post('/panier/vider', [PanierController::class, 'vider']);

Route::get('/billetterie/reserver', [ReservationController::class, 'index']);
Route::post('/billetterie/confirmer', [ReservationController::class, 'confirmer']);
Route::get('/confirmation', [ReservationController::class, 'confirmation']);

Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->prefix('organisateur')->group(function () {
    Route::get('/', [OrganisateurController::class, 'index']);
});

Route::middleware('auth')->prefix('organisateur')->group(function () {
    Route::get('/', [OrganisateurController::class, 'index']);
    Route::get('/competitions', [OrganisateurController::class, 'createForm']);
    Route::post('/competitions', [OrganisateurController::class, 'store']);
    Route::get('/competitions/liste', [OrganisateurController::class, 'liste']);
    Route::put('/competitions/{id}', [OrganisateurController::class, 'update']);
    Route::delete('/competitions/{id}', [OrganisateurController::class, 'destroy']);
    Route::get('/reservations', [OrganisateurController::class, 'reservations']);
    Route::get('/stats', [OrganisateurController::class, 'stats']);
});

Route::get('/', [HomeController::class, 'index']);
