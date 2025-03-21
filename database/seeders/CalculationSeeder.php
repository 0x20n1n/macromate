<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Calculation;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalculationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create some test users with calculations
        User::factory(5)->create()->each(function ($user) {
            // Create some Mifflin-St Jeor calculations for each user
            Calculation::factory(3)
                ->mifflinStJeor()
                ->for($user)
                ->create();
            
            // Create some Katch-McArdle calculations for each user
            Calculation::factory(2)
                ->katchMcArdle()
                ->for($user)
                ->create();
        });
        
        // Create some anonymous calculations (not linked to a user)
        Calculation::factory(5)
            ->mifflinStJeor()
            ->create(['user_id' => null]);
            
        Calculation::factory(5)
            ->katchMcArdle()
            ->create(['user_id' => null]);
    }
}
