<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TinymceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes([
            __DIR__.'/config/tinymce.php' => base_path('config/tinymce.php')
        ], 'config');
        $this->publishes([
            __DIR__.'/assets/js/tinymce/' => base_path('vendor/js/tinymce')
        ], 'public');
        $this->loadViewsFrom(__DIR__.'/resources/view','tinymce');
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
