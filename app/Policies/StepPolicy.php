<?php

namespace App\Policies;

use App\User;
use App\Step;
use Illuminate\Auth\Access\HandlesAuthorization;

class StepPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any steps.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the step.
     *
     * @param  \App\User  $user
     * @param  \App\Step  $step
     * @return mixed
     */
    public function view(?User $user, Step $step)
    {
        return true;
    }

    /**
     * Determine whether the user can create steps.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the step.
     *
     * @param  \App\User  $user
     * @param  \App\Step  $step
     * @return mixed
     */
    public function update(User $user, Step $step)
    {
        return $user->id === $step->user_id;
    }

    /**
     * Determine whether the user can delete the step.
     *
     * @param  \App\User  $user
     * @param  \App\Step  $step
     * @return mixed
     */
    public function delete(User $user, Step $step)
    {
        return $user->id === $step->user_id;
    }

    /**
     * Determine whether the user can restore the step.
     *
     * @param  \App\User  $user
     * @param  \App\Step  $step
     * @return mixed
     */
    public function restore(User $user, Step $step)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the step.
     *
     * @param  \App\User  $user
     * @param  \App\Step  $step
     * @return mixed
     */
    public function forceDelete(User $user, Step $step)
    {
        //
    }
}
