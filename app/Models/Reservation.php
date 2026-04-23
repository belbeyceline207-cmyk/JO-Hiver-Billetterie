<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'spectateur_id', 'tour_id'
    ];

    public function spectateur()
    {
        return $this->belongsTo(Spectateur::class);
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
