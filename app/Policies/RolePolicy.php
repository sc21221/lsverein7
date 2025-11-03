<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->hasAdvancedRights();
    }

    public function update(User $user, Role $role)
    {
        return $user->admin || ($role->club_id && $user->hasAdvancedRights($role->club_id));
    }

    public function delete(User $user, Role $role)
    {
        return $this->update($user, $role);
    }

}
