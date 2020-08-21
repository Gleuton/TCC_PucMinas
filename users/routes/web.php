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
        $router->get('load-session/','LoginController@loadSession');
        Route::resources($router, 'UserTypeController', 'user_type');
        Route::resources($router, 'UserController', 'user');
    }
);
