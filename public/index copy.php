<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Maintenance mode check
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Check for Laravel Composer autoload
if (file_exists(__DIR__.'/../vendor/autoload.php')) {
    require __DIR__.'/../vendor/autoload.php';

    /** @var Application $app */
    $app = require_once __DIR__.'/../bootstrap/app.php';

    $kernel = $app->make(Kernel::class);

    $response = $kernel->handle(
        $request = Request::capture()
    )->send();

    $kernel->terminate($request, $response);
} else {
    // Standalone Preview Fallback
    // Serves the storefront seamlessly when previewed with `php -S localhost:8000 -t public`
    // prior to running `composer install` for full Laravel dependencies.
    if (file_exists(__DIR__.'/../resources/views/standalone_preview.php')) {
        require __DIR__.'/../resources/views/standalone_preview.php';
    } else {
        echo '<h1>LIVA Skincare — Laravel Asset & Route Structure Ready</h1>';
        echo '<p>Run <code>composer install</code> or copy these files into your Laravel project.</p>';
    }
}
