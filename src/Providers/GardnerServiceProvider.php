<?php

namespace Moosura\Gardner\Providers;

use Illuminate\Support\ServiceProvider;
use Moosura\Gardner\Farmer;

class GardnerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {


//        $this->mergeConfigFrom(
//            __DIR__.'/../config/gardner.php', 'gardner'
//        );

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'gardner');
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/gardner'),
        ]);
        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/courier'),
        ], 'public');
    }

    public function register(): void
    {
        $this->app->scoped(Farmer::class, function () {
            return new Farmer();
        });

    }
}