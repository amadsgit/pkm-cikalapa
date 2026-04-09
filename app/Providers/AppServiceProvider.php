<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot()
    {
        // if (config('app.env') === 'production' || env('FORCE_HTTPS', false)) {
        //     if (app()->environment('production')) {
        //         URL::forceScheme('https');
        //     }
        // }

        if (env('FORCE_HTTPS', false)) {
            URL::forceScheme('https');
        }
    }
}
