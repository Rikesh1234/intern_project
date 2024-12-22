<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Categorypolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function  viewAny(User $user){
        return $user->hasPermission('category-read');
    }

    public function create(User $user){
        return $user->hasPermission('category-create');
    }

    public function update(User $user){
        return $user->hasPermission('category-update');
    }

    public function delete(User $user){
        return $user->hasPermission('category-delete');
    }
}
