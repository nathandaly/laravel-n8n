<?php

declare(strict_types=1);

use NateDaly\N8n\LaravelN8nServiceProvider;

it('loads the service provider', function () {
    $providers = $this->app->getLoadedProviders();

    expect($providers)->toHaveKey(LaravelN8nServiceProvider::class);
});

it('publishes the config file', function () {
    $this->artisan('vendor:publish', [
        '--provider' => LaravelN8nServiceProvider::class,
        '--tag' => 'laravel-n8n-config'
    ])->assertSuccessful();

    expect(config_path('laravel-n8n.php'))->toBeFile();
});

it('merges the config', function () {
    $config = config('laravel-n8n');

    expect($config)->toBeArray()
        ->toHaveKeys(['base_url', 'api_key', 'webhook_path', 'timeout']);
});
