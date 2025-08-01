<?php

declare(strict_types=1);

namespace NateDaly\N8n\Tests;


use NateDaly\N8n\LaravelN8nServiceProvider;
use Orchestra\Testbench\TestCase;

class PackageTestCase extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            LaravelN8nServiceProvider::class,
        ];
    }
}
