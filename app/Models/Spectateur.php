<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spectateur extends Model
{
    //
    protected $fillable = [
        'prenom', 'nom', 'email', 'telephone'
    ];

    // Un spectateur peut avoir plusieurs réservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
