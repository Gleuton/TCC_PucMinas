<?php

use Laravel\Lumen\Routing\Router;

/** @var Router $router */

$router->group(['prefix'=>'nc_type'],
    static function () use ($router){
        $router->get('/','NcTypeController@index');
        $router->post('/','NcTypeController@store');
        $router->get('/{id}/','NcTypeController@show');
        $router->put('/{id}/','NcTypeController@update');
    }
);