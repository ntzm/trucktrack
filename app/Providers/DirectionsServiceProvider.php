<?php

namespace App\Providers;

use App\Directions\PolylineFetcher;
use GuzzleHttp\Client;
use Illuminate\Cache\Repository;
use Illuminate\Support\ServiceProvider;

class DirectionsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(PolylineFetcher::class, function () {
            return new PolylineFetcher(
                $this->app[Repository::class],
                new Client(),
                $this->app['config']->get('credentials.google_maps_api_key')
            );
        });
    }
}
