<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Sedentary',
                'Lightly Active',
                'Moderately Active',
                'Very Active',
                'Extra Active',
            ]),
            'description' => fake()->randomElement([
                'Gamer, streamer, office job',
                'Light exercise 1-3 days/week',
                'Moderate exercise 3-5 days/week',
                'Hard exercise 6-7 days/week',
                'Athlete or physical labor job',
            ]),
            'multiplier' => fake()->randomElement([
                1.2, // Sedentary
                1.375, // Lightly Active
                1.55, // Moderately Active
                1.725, // Very Active
                1.9, // Extra Active
            ]),
        ];
    }

    /**
     * Create a sedentary activity.
     */
    public function sedentary(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Sedentary',
            'description' => 'Gamer, streamer, office job',
            'multiplier' => 1.2,
        ]);
    }

    /**
     * Create a lightly active activity.
     */
    public function lightlyActive(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Lightly Active',
            'description' => 'Light exercise 1-3 days/week',
            'multiplier' => 1.375,
        ]);
    }

    /**
     * Create a moderately active activity.
     */
    public function moderatelyActive(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Moderately Active',
            'description' => 'Moderate exercise 3-5 days/week',
            'multiplier' => 1.55,
        ]);
    }

    /**
     * Create a very active activity.
     */
    public function veryActive(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Very Active',
            'description' => 'Hard exercise 6-7 days/week',
            'multiplier' => 1.725,
        ]);
    }

    /**
     * Create an extra active activity.
     */
    public function extraActive(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Extra Active',
            'description' => 'Athlete or physical labor job',
            'multiplier' => 1.9,
        ]);
    }
}
