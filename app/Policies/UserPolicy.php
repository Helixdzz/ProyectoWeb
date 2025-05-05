<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any users.
     */
    public function viewAny(User $user)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can view the user.
     */
    public function view(User $user, User $model)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can update a user.
     */
    public function update(User $user, User $model)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can delete a user.
     */
    public function delete(User $user, User $model)
    {
        return $user->is_admin;
    }
}
