<?php

namespace YueCode\Uvs;

use Illuminate\Support\ServiceProvider;

class UvsProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config.php' => config_path('uvs.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('uvs',function (){
           return new Uvs();
        });
    }
}
