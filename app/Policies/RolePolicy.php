<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function  viewAny(User $user){
        return $user->hasPermission('role-read');
    }

    public function create(User $user){
        return $user->hasPermission('role-create');
    }

    public function update(User $user){
        return $user->hasPermission('role-update');
    }

    public function delete(User $user){
        return $user->hasPermission('role-delete');
    }
}
