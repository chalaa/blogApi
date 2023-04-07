<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GoogelDriveServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        $client = new \Google_Client();
    }
}
