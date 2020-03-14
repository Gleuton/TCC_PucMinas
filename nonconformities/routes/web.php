<?php

use Laravel\Lumen\Routing\Router;

/** @var Router $router */

$router->group(
    ['prefix' => 'teste'],
    static function () use ($router){
        $router->get(
            '/',
            function () use ($router) {
                return $router->app->version();
            }
        );
    }
);