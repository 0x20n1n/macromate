<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Calculation extends Model
{
    /** @use HasFactory<\Database\Factories\CalculationFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'age',
        'weight',
        'height',
        'gender',
        'activity_id',
        'body_fat_percentage',
        'formula',
        'bmr',
        'tdee',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'age' => 'integer',
        'weight' => 'float',
        'height' => 'float',
        'body_fat_percentage' => 'float',
        'bmr' => 'float',
        'tdee' => 'float',
    ];

    /**
     * Get the activity level associated with this calculation.
     */
    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }

    /**
     * Get the user associated with this calculation.
     * This relationship is optional in the demo version.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    /**
     * Calculate BMR using Mifflin-St Jeor Equation
     */
    public function calculateMifflinStJeorBMR(): float
    {
        if ($this->gender === 'male') {
            return (10 * $this->weight) + (6.25 * $this->height) - (5 * $this->age) + 5;
        }

        return (10 * $this->weight) + (6.25 * $this->height) - (5 * $this->age) - 161;
    }

    /**
     * Calculate BMR using Katch-McArdle Formula
     */
    public function calculateKatchMcArdleBMR(): float
    {
        if ($this->body_fat_percentage === null) {
            return $this->calculateMifflinStJeorBMR();
        }

        $leanBodyMass = $this->weight * (1 - ($this->body_fat_percentage / 100));
        
        return 370 + (21.6 * $leanBodyMass);
    }

    /**
     * Calculate TDEE based on BMR and activity level
     */
    public function calculateTDEE(): float
    {
        return $this->bmr * $this->activity->multiplier;
    }
}
