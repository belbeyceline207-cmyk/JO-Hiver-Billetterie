<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sports = ['Hockey sur glace', 'Ski alpin', 'Patinage artistique','Biathlon', 'Curling'];
        foreach($sports as $sport){
            \App\Models\Sport::create(['nom' => $sport ]);
        }
    }
}
