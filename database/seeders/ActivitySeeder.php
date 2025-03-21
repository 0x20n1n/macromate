<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create predefined activity levels
        Activity::create([
            'name' => 'Sedentary',
            'description' => 'Gamer, streamer, office job',
            'multiplier' => 1.2,
        ]);

        Activity::create([
            'name' => 'Lightly Active',
            'description' => 'Light exercise 1-3 days/week',
            'multiplier' => 1.375,
        ]);

        Activity::create([
            'name' => 'Moderately Active',
            'description' => 'Moderate exercise 3-5 days/week',
            'multiplier' => 1.55,
        ]);

        Activity::create([
            'name' => 'Very Active',
            'description' => 'Hard exercise 6-7 days/week',
            'multiplier' => 1.725,
        ]);

        Activity::create([
            'name' => 'Extra Active',
            'description' => 'Athlete or physical labor job',
            'multiplier' => 1.9,
        ]);
    }
}
