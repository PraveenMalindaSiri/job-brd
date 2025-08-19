<?php

namespace App\Policies;

use App\Models\MyJob;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MyJobPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, MyJob $myJob): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MyJob $myJob): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MyJob $myJob): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MyJob $myJob): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MyJob $myJob): bool
    {
        return false;
    }

    public function apply(User $user, MyJob $job): bool
    {
        return !$job->hasUserApplied($user);
    }
}
