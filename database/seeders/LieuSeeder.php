<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lieux = [
            ['nom' => 'Forum di Assago', 'capacite'=>12000],
            ['nom' => 'Piste Stelvio', 'capacite'=>8000],
            ['nom' => 'Palais des Sports', 'capacite'=>15000],
            ['nom' => 'Anneau olympique', 'capacite'=>10000],
            ['nom' => 'Stade de glace', 'capacite'=>6000],
        ];
        
        foreach($lieux as $lieu){
            \App\Models\Lieu::create($lieu);
        }
    }
}
