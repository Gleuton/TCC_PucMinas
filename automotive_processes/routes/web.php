<?php

use App\Http\Route;
use Laravel\Lumen\Routing\Router;

/** @var Router $router */

$router->group(
    [
        'prefix'     => 'api',
        'middleware' => ['auth']
    ],
    static function () use ($router) {
        Route::resources(
            $router,
            'ProcessController',
            'process'
        );
    }
);
