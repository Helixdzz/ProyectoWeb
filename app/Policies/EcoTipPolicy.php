<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EcoTip;
use Illuminate\Auth\Access\HandlesAuthorization;

class EcoTipPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any EcoTips.
     */
    public function viewAny(User $user)
    {
        return true; // Todos los usuarios autenticados pueden ver
    }

    /**
     * Determine whether the user can view the EcoTip.
     */
    public function view(User $user, EcoTip $ecoTip)
    {
        return true;
    }

    /**
     * Determine whether the user can create EcoTips.
     */
    public function create(User $user)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can update the EcoTip.
     */
    public function update(User $user, EcoTip $ecoTip)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can delete the EcoTip.
     */
    public function delete(User $user, EcoTip $ecoTip)
    {
        return $user->is_admin;
    }
}
