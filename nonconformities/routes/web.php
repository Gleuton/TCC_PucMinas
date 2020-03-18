<?php

use App\Http\Route;
use Laravel\Lumen\Routing\Router;

/** @var Router $router */

$router->group(
    ['prefix' => 'api'],
    static function () use ($router) {
        Route::resources($router, 'NcTypeController', 'nc_type');
        Route::resources($router, 'NcStatusController', 'nc_status');
        Route::resources($router, 'ProcessController', 'process');
        Route::resources($router, 'UserTypeController', 'user_type');
        Route::resources($router, 'UserController', 'user');
    }
);
