<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//For the Patch for MaximumLength error
use Illuminate\Support\Facades\Schema;

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
        //Patch for MaximumLength error
        Schema::defaultStringLength(191);
    }
}
