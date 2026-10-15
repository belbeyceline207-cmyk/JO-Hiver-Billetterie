<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lieu extends Model
{
    protected $table = 'lieux'; // forcer le bon nom de table car au debut la table avai tle nom 'lieus'

    protected $fillable = [
        'nom', 'capacite'
    ];
    
    public function tours() {
        return $this->hasMany(Tour::class);
    }
}
