<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\Calculation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Calculation>
 */
class CalculationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = fake()->randomElement(['male', 'female']);
        $age = fake()->numberBetween(18, 80);
        $weight = fake()->numberBetween(45, 130); // kg
        $height = fake()->numberBetween(150, 200); // cm
        $bodyFatPercentage = fake()->optional(0.7)->numberBetween(10, 40);
        $formula = fake()->randomElement(['mifflin_st_jeor', 'katch_mcardle']);
        
        // Get or create a random activity
        $activity = Activity::inRandomOrder()->first() ?? Activity::factory()->create();
        
        // Calculate BMR based on the selected formula
        $bmr = $this->calculateBMR($gender, $age, $weight, $height, $bodyFatPercentage, $formula);
        
        // Calculate TDEE
        $tdee = $bmr * $activity->multiplier;

        return [
            'age' => $age,
            'weight' => $weight,
            'height' => $height,
            'gender' => $gender,
            'activity_id' => $activity->id,
            'body_fat_percentage' => $bodyFatPercentage,
            'formula' => $formula,
            'bmr' => $bmr,
            'tdee' => $tdee,
            'user_id' => fn() => User::factory()->create()->id,
        ];
    }

    /**
     * Calculate BMR based on formula
     */
    private function calculateBMR(string $gender, int $age, float $weight, float $height, ?float $bodyFatPercentage, string $formula): float
    {
        if ($formula === 'katch_mcardle' && $bodyFatPercentage !== null) {
            $leanBodyMass = $weight * (1 - ($bodyFatPercentage / 100));
            return 370 + (21.6 * $leanBodyMass);
        }

        // Default to Mifflin-St Jeor
        if ($gender === 'male') {
            return (10 * $weight) + (6.25 * $height) - (5 * $age) + 5;
        }

        return (10 * $weight) + (6.25 * $height) - (5 * $age) - 161;
    }

    /**
     * Configure the model factory.
     */
    public function configure(): Factory
    {
        return $this->afterMaking(function (Calculation $calculation) {
            // Any additional setup after making the model
        })->afterCreating(function (Calculation $calculation) {
            // Any additional setup after creating the model
        });
    }

    /**
     * Set the calculation to use the Mifflin-St Jeor formula.
     */
    public function mifflinStJeor(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'formula' => 'mifflin_st_jeor',
            'body_fat_percentage' => null,
        ]);
    }

    /**
     * Set the calculation to use the Katch-McArdle formula with body fat percentage.
     */
    public function katchMcArdle(): Factory
    {
        $bodyFatPercentage = fake()->numberBetween(10, 40);
        
        return $this->state(function (array $attributes) use ($bodyFatPercentage) {
            $gender = $attributes['gender'] ?? fake()->randomElement(['male', 'female']);
            $age = $attributes['age'] ?? fake()->numberBetween(18, 80);
            $weight = $attributes['weight'] ?? fake()->numberBetween(45, 130);
            $height = $attributes['height'] ?? fake()->numberBetween(150, 200);
            $activity = Activity::find($attributes['activity_id']) ?? 
                        Activity::inRandomOrder()->first() ?? 
                        Activity::factory()->create();
            
            // Calculate BMR using Katch-McArdle formula
            $leanBodyMass = $weight * (1 - ($bodyFatPercentage / 100));
            $bmr = 370 + (21.6 * $leanBodyMass);
            
            // Calculate TDEE
            $tdee = $bmr * $activity->multiplier;
            
            return [
                'formula' => 'katch_mcardle',
                'body_fat_percentage' => $bodyFatPercentage,
                'bmr' => $bmr,
                'tdee' => $tdee,
            ];
        });
    }
}
