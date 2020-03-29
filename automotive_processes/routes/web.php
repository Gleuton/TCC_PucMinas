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
            'SectorController',
            'sector'
        );
        Route::resources(
            $router,
            'InterruptionTypeController',
            'interruption_Type'
        );
        Route::resources(
            $router,
            'InterruptionController',
            'interruption'
        );
        Route::resources(
            $router,
            'ProcessController',
            'process'
        );
    }
);
