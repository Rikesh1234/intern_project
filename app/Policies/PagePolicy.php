<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function  viewAny(User $user){
        return $user->hasPermission('page-read');
    }

    public function create(User $user){
        return $user->hasPermission('page-create');
    }

    public function update(User $user){
        return $user->hasPermission('page-update');
    }

    public function delete(User $user){
        return $user->hasPermission('page-delete');
    }
}
