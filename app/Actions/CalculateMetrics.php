<?php

namespace App\Actions;

use App\Models\Activity;
use App\Models\Calculation;

class CalculateMetrics
{
    /**
     * Execute the action.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    public function execute(array $data): array
    {
        // Get the activity multiplier
        $activity = Activity::findOrFail($data['activity_id']);
        
        // Calculate BMR based on selected formula
        $bmr = $this->calculateBMR(
            $data['gender'],
            $data['age'],
            $data['weight'],
            $data['height'],
            $data['body_fat'] ?? null,
            $data['formula']
        );
        
        // Calculate TDEE
        $tdee = $bmr * $activity->multiplier;
        
        // Create and save calculation if user is logged in
        $userId = auth()->id();
        $calculation = null;
        
        if ($userId || !empty($data['save_calculation'])) {
            $calculation = Calculation::create([
                'age' => $data['age'],
                'weight' => $data['weight'],
                'height' => $data['height'],
                'gender' => $data['gender'],
                'activity_id' => $activity->id,
                'body_fat_percentage' => $data['body_fat'] ?? null,
                'formula' => $data['formula'],
                'bmr' => $bmr,
                'tdee' => $tdee,
                'user_id' => $userId,
            ]);
        }
        
        return [
            'bmr' => round($bmr),
            'tdee' => round($tdee),
            'activity_multiplier' => $activity->multiplier,
            'formula' => $data['formula'],
            'calculation_id' => $calculation?->id,
            'macro_split' => $this->calculateMacroSplit($tdee),
        ];
    }
    
    /**
     * Calculate BMR based on formula.
     */
    private function calculateBMR(
        string $gender,
        int $age,
        float $weight,
        float $height,
        ?float $bodyFat,
        string $formula
    ): float {
        if ($formula === 'katch_mcardle' && $bodyFat !== null) {
            $leanBodyMass = $weight * (1 - ($bodyFat / 100));
            return 370 + (21.6 * $leanBodyMass);
        }
        
        // Default to Mifflin-St Jeor
        if ($gender === 'male') {
            return (10 * $weight) + (6.25 * $height) - (5 * $age) + 5;
        }
        
        return (10 * $weight) + (6.25 * $height) - (5 * $age) - 161;
    }
    
    /**
     * Calculate recommended macro split.
     * 
     * @param float $tdee
     * @return array<string, array<string, int>>
     */
    private function calculateMacroSplit(float $tdee): array
    {
        // Default protein is 0.8g per pound of body weight, but we'll use percentages here
        $balancedSplit = [
            'protein' => round(($tdee * 0.30) / 4), // 30% of calories from protein (4 calories per gram)
            'carbs' => round(($tdee * 0.40) / 4),   // 40% of calories from carbs (4 calories per gram)
            'fat' => round(($tdee * 0.30) / 9),     // 30% of calories from fat (9 calories per gram)
        ];
        
        $lowCarbSplit = [
            'protein' => round(($tdee * 0.40) / 4), // 40% of calories from protein
            'carbs' => round(($tdee * 0.20) / 4),   // 20% of calories from carbs
            'fat' => round(($tdee * 0.40) / 9),     // 40% of calories from fat
        ];
        
        $highCarbSplit = [
            'protein' => round(($tdee * 0.25) / 4), // 25% of calories from protein
            'carbs' => round(($tdee * 0.55) / 4),   // 55% of calories from carbs
            'fat' => round(($tdee * 0.20) / 9),     // 20% of calories from fat
        ];
        
        return [
            'balanced' => $balancedSplit,
            'low_carb' => $lowCarbSplit,
            'high_carb' => $highCarbSplit,
        ];
    }
} 