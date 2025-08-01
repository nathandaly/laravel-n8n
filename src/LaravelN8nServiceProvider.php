<?php

declare(strict_types=1);

namespace NateDaly\N8n;

use Illuminate\Support\ServiceProvider;

class LaravelN8nServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/laravel-n8n.php', 'laravel-n8n'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/laravel-n8n.php' => config_path('laravel-n8n.php'),
            ], 'laravel-n8n-config');
        }
    }
}
