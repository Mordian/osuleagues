<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class OsuServiceProvider extends ServiceProvider
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
        $this->app->singleton('Osu', function() {
            return new \Arielhr\Osuapi(env('OSU_API_KEY'));
        });
    }
}
