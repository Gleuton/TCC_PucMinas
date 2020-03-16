<?php

use App\Http\Route;
use Laravel\Lumen\Routing\Router;

/** @var Router $router */

$router->group(
    ['prefix' => 'nc_type'],
    static function () use ($router) {
        Route::resources($router, 'NcTypeController');
    }
);

$router->group(
    ['prefix' => 'nc_status'],
    static function () use ($router) {
        Route::resources($router, 'NcStatusController');
    }
);

