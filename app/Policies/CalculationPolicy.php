<?php

namespace App\Policies;

use App\Models\Calculation;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CalculationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Any authenticated user can view their own calculations
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Calculation $calculation): bool
    {
        return $user->id === $calculation->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true; // Any authenticated user can create calculations
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Calculation $calculation): bool
    {
        return $user->id === $calculation->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Calculation $calculation): bool
    {
        return $user->id === $calculation->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Calculation $calculation): bool
    {
        return $user->id === $calculation->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Calculation $calculation): bool
    {
        return $user->id === $calculation->user_id;
    }
}
