<?php

use App\Http\Route;
use Laravel\Lumen\Routing\Router;

/** @var Router $router */
$router->post('/login','LoginController@login');
$router->group(
    [
        'prefix' => 'api',
        'middleware' => ['auth']
    ],
    static function () use ($router) {
        Route::resources($router, 'UserTypeController', 'user_type');
        Route::resources($router, 'UserController', 'user');
    }
);
