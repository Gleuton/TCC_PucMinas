<?php

use App\Http\Route;
use Laravel\Lumen\Routing\Router;

/** @var Router $router */

$router->group(
    ['prefix' => 'api'],
    static function () use ($router) {
        Route::resources($router, 'UserTypeController', 'user_type');
        Route::resources($router, 'UserController', 'user');
    }
);
