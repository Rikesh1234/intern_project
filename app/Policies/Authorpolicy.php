<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Authorpolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function  viewAny(User $user){
        return $user->hasPermission('author-read');
    }

    public function create(User $user){
        return $user->hasPermission('author-create');
    }

    public function update(User $user){
        return $user->hasPermission('author-update');
    }

    public function delete(User $user){
        return $user->hasPermission('author-delete');
    }
}
