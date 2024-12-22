<?php

namespace App\Providers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Paginator::useBootstrap();

        Validator::extend('confirm_password', function ($attribute, $value, $parameters, $validator) {
            // $parameters[0] is the name of the field to compare with
            return $value === $validator->getData()[$parameters[0]];
        });
    
        Validator::replacer('confirm_password', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':field', $parameters[0], $message);
        });

      
    }
}
