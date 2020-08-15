<?php

use App\Http\Route;
use Laravel\Lumen\Routing\Router;

/** @var Router $router */

$router->group(
    [
        'prefix'     => 'api/agendamento',
        'middleware' => ['auth']
    ],
    static function () use ($router) {
        Route::resources(
            $router,
            'SectorController',
            'sector'
        );
    }
);
