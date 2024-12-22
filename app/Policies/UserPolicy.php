<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function  viewAny(User $user){
        return $user->hasPermission('user-read');
    }

    public function create(User $user){
        return $user->hasPermission('user-create');
    }

    public function update(User $user){
        return $user->hasPermission('user-update');
    }

    public function delete(User $user){
        return $user->hasPermission('user-delete');
    }
}
