<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withCommands([
        \App\Console\Commands\VerifySendMailCommand::class
                   ])
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin.check' => \App\Http\Middleware\AdminPanelRoleCheckMiddleware::class
                           ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
