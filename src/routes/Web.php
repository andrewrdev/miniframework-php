<?php

namespace src\routes;

class Web
{
    /*
    |------------------------------------------------------------------------------------------------------------------
    | Routes
    |------------------------------------------------------------------------------------------------------------------
    */

    public function routes()
    {
        $routes['index'] = array(
            'route' => '/',
            'controller' => 'indexController',
            'action' => 'index'
        );

        $routes['sobre'] = array(
            'route' => '/sobre',
            'controller' => 'indexController',
            'action' => 'sobre'
        );

        return $routes;
    }
}
