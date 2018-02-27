<?php

namespace Hades\Bms;

use Illuminate\Support\ServiceProvider;

class BmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/app/Http/routes.php';
        }

        /*load views*/
        $this->loadViewsFrom(__DIR__.'/resources/views', 'bms');
        $this->loadTranslationsFrom(__DIR__.'/resources/lang/en', 'bms');

        $this->publishes([
            __DIR__.'/public' => public_path(),
        ], 'public');

        $this->publishes([
            __DIR__.'/config' => config_path()
        ], 'config');

        $this->publishes([
            __DIR__.'/database/migrations/' => database_path('migrations')
        ], 'migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
