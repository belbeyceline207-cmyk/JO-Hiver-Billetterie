<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendrierController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calendrier', [CalendrierController::class, 'index']);

