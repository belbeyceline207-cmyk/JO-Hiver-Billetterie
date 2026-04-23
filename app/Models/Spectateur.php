<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spectateur extends Model
{
    //
    protected $fillable = [
        'prenom', 'nom', 'email', 'telephone'
    ];
}
