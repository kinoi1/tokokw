<?php

namespace App\Providers;

use App\Models\Main;
use Illuminate\Support\ServiceProvider;

class MainServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Mengikat model ke container
        $this->app->singleton(Main::class, function ($app) {
            return new Main();
        });
    }

    public function boot()
    {
        //
    }
}
