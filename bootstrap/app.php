<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php', // ✅ أضف هذا السطر
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // تسجيل الأسماء المستعارة
        $middleware->alias([
            'checkUser' => adminMiddleware::class,
            
        ]);

       
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // يمكنك التعامل مع الاستثناءات هنا
    })
    ->create();
