<?php

namespace App\Http;

use Laravel\Lumen\Routing\Router;

class Route
{
    public static function resources(
        Router $router,
        string $controller,
        string $prefix = ''
    ): void {
        $id = '/{id}';
        $router->get($prefix . '/', $controller . '@index');
        $router->post($prefix . '/', $controller . '@store');
        $router->get($prefix . $id, $controller . '@show');
        $router->put($prefix . $id, $controller . '@update');
        $router->delete($prefix . $id, $controller . '@destroy');
    }
}
