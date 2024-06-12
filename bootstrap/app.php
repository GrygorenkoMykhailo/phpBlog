<?php

use App\Http\Middleware\EnsureAuthenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Illuminate\Auth\AuthenticationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //$middleware->append(EnsureAuthenticated::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function(NotFoundHttpException $e){
            return redirect('/notfound');
        });
        $exceptions->render(function(BadRequestHttpException $e){
            return redirect('/badrequest');
        });
        $exceptions->render(function(AuthenticationException $e){
            return redirect('/unauthenticated');
        });
    })->create();
