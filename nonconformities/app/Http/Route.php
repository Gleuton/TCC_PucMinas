<?php

namespace App\Http;

use Laravel\Lumen\Routing\Router;

class Route
{
    public static function resources(Router $router, string $controller): void
    {
        $id = '/{id}';
        $router->get('/', $controller.'@index');
        $router->post('/', $controller.'@store');
        $router->get($id, $controller.'@show');
        $router->put($id, $controller.'@update');
        $router->delete($id, $controller.'@destroy');
    }
}
