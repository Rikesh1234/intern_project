<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SEOPoilicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function  viewAny(User $user){
        return $user->hasPermission('seo-read');
    }

    public function create(User $user){
        return $user->hasPermission('seo-create-and-update');
    }

    public function delete(User $user){
        return $user->hasPermission('seo-delete');
    }
}
