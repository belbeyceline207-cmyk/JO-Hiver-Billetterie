<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\BilletterieController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calendrier', [CalendrierController::class, 'index']);

Route::get('/billetterie', [BilletterieController::class, 'index']);
