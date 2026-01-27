<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// Add these imports:
use Illuminate\Auth\Events\Login;
use App\Models\userDevices;

$app =  Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
$events = $app->make('events'); // get the event dispatcher

$events->listen(Login::class, function ($event) {
    $user = $event->user;

    $deviceName = request()->header('User-Agent') ?? 'Unknown Device';
    $ipAddress  = request()->ip();
    $location   = 'Unknown Location'; // or geoip if you have it installed

    userDevices::updateOrCreate(
        [
            'user_id'     => $user->id,
            'device_name' => $deviceName,
        ],
        [
            'ip_address'  => $ipAddress,
            'location'    => $location,
            'last_login'  => now(),
        ]
    );
});

return $app;