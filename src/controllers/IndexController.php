<?php

namespace src\controllers;

use src\classes\View;

class IndexController
{
    /*
    |------------------------------------------------------------------------------------------------------------------
    | Index
    |------------------------------------------------------------------------------------------------------------------
    */

    public function index()
    {
        View::render([
            'templates/head',
            'IndexView',
            'templates/footer',
        ]);
    }

    /*
    |------------------------------------------------------------------------------------------------------------------
    | Sobre
    |------------------------------------------------------------------------------------------------------------------
    */

    public function sobre()
    {
        View::render([
            'templates/head',
            'SobreView',
            'templates/footer',
        ]);
    }
}
