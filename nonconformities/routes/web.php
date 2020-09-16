<?php

use App\Http\Route;
use Laravel\Lumen\Routing\Router;

/** @var Router $router */

$router->get('/', fn() => 'Nonconformity Api');

$router->group(
    [
        'prefix'     => 'api',
        'middleware' => ['auth']
    ],
    static function () use ($router) {
        Route::resources(
            $router,
            'NcTypeController',
            'nc_type'
        );
        Route::resources(
            $router,
            'NcStatusController',
            'nc_status'
        );
        Route::resources(
            $router,
            'NonconformityController',
            'nonconformity'
        );
        Route::resources(
            $router,
            'ImpactedProcessController',
            'impacted_process'
        );
        Route::resources(
            $router,
            'ProcessController',
            'process'
        );
    }
);
