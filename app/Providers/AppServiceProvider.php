<?php

namespace App\Providers;

use App\Models\Stream;
use App\Services\StreamService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(StreamService::class, function ($app) {
            return new StreamService(
                $app->make(Stream::class),
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
