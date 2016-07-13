<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //register each files in Helpers Dir as a new class
        foreach (glob(app_path().'/Helpers/*.php') as $filename){
            require_once($filename);
        }
    }
}
