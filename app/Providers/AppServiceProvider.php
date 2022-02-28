<?php

namespace App\Providers;

use Inertia\Inertia;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
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
        Inertia::share('flash', function() {
            return ['status' => Session::get('status')];
        });
        Schema::defaultStringLength(191);
    }
}
