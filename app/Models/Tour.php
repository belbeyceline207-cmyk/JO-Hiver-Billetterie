<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = [
        'sport_id', 'lieu_id', 'type', 'date', 'heure_debut', 'heure_fin', 'prix'
    ];

    // Relation avec Sport
    public function sport() {
        return $this->belongsTo(Sport::class);
    }

    // Relation avec Lieu
    public function lieu() {
        return $this->belongsTo(Lieu::class);
    }

    // Relation avec Reservations
    public function reservations() {
        return $this->hasMany(Reservation::class);
    }
}  