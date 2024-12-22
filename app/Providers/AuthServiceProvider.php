<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\postModel as Post;
use App\Models\author;
use App\Models\categories;
use App\Models\pages;
use App\Models\role;
use App\Models\User;
use App\Models\SEO;
use App\Policies\PostPolicy;
use App\Policies\Authorpolicy;
use App\Policies\Categorypolicy;
use App\Policies\PagePolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\SEOPoilicy;



class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
            Post::class => PostPolicy::class,
            author::class => AuthorPolicy::class,
            categories::class => CategoryPolicy::class,
            pages::class => PagePolicy::class,
            role::class => RolePolicy::class,
            User::class => UserPolicy::class,
            SEO::class => SEOPoilicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
