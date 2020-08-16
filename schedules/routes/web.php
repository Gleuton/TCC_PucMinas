<?php

use App\Http\Route;
use Laravel\Lumen\Routing\Router;

/** @var Router $router */

$router->group(
    [
        'prefix'     => 'api/schedule',
        'middleware' => ['auth']
    ],
    static function () use ($router) {
        Route::resources(
            $router,
            'ScheduleStatusController'
        );
        Route::resources(
            $router,
            'ScheduleStatusController',
            'status'
        );
        Route::resources(
            $router,
            'ScheduleTypeController',
            'type'
        );
    }
);
