<?php

namespace App\Providers;

use App\Models\SEO;
use App\Models\pages;
use App\Models\postModel;
use App\Models\categories;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $seo_global = SEO::get();
            $posts_global = PostModel::where('status',1)->with('authors')->latest()->get();
            $categories_global = categories::with(['posts' => function ($query) {
                $query->where('status', 1)->latest('created_at');
            }, 'posts.authors'])
            ->where('status', 1)
            ->get();
            $pages_global = pages::where('page_status',1)->get();

            $view->with(compact('seo_global', 'posts_global', 'categories_global','pages_global'));
        });
    }
}
