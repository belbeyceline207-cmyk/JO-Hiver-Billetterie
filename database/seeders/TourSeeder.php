<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tours = [
            ['sport_id' => 1, 'lieu_id' => 1, 'type' => 'qualifications', 'date' => '2026-02-10', 'heure_debut' => '09:00', 'heure_fin' => '11:00', 'prix' => 30],
            ['sport_id' => 1, 'lieu_id' => 1, 'type' => 'finale', 'date' => '2026-02-15', 'heure_debut' => '14:00', 'heure_fin' => '16:00', 'prix' => 80],
            ['sport_id' => 2, 'lieu_id' => 2, 'type' => 'qualifications', 'date' => '2026-02-10', 'heure_debut' => '10:00', 'heure_fin' => '12:00', 'prix' => 25],
            ['sport_id' => 2, 'lieu_id' => 2, 'type' => 'finale', 'date' => '2026-02-16', 'heure_debut' => '15:00', 'heure_fin' => '17:00', 'prix' => 70],
            ['sport_id' => 3, 'lieu_id' => 3, 'type' => 'qualifications', 'date' => '2026-02-11', 'heure_debut' => '09:00', 'heure_fin' => '11:00', 'prix' => 35],
            ['sport_id' => 3, 'lieu_id' => 3, 'type' => 'finale', 'date' => '2026-02-17', 'heure_debut' => '14:00', 'heure_fin' => '16:00', 'prix' => 90],
            ['sport_id' => 4, 'lieu_id' => 4, 'type' => 'qualifications', 'date' => '2026-02-11', 'heure_debut' => '11:00', 'heure_fin' => '13:00', 'prix' => 20],
            ['sport_id' => 4, 'lieu_id' => 4, 'type' => 'finale', 'date' => '2026-02-18', 'heure_debut' => '16:00', 'heure_fin' => '18:00', 'prix' => 60],
            ['sport_id' => 5, 'lieu_id' => 5, 'type' => 'qualifications', 'date' => '2026-02-12', 'heure_debut' => '10:00', 'heure_fin' => '12:00', 'prix' => 15],
            ['sport_id' => 5, 'lieu_id' => 5, 'type' => 'finale', 'date' => '2026-02-19', 'heure_debut' => '14:00', 'heure_fin' => '16:00', 'prix' => 50],
        ];
        
        foreach ($tours as $tour) {
            \App\Models\Tour::create($tour);
        }
    }
}
