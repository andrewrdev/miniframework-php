<?php

namespace src\classes;

class View
{
    /*
    |------------------------------------------------------------------------------------------------------------------
    | Render
    |------------------------------------------------------------------------------------------------------------------
    */

    public static function render($views, $data = null)
    {
        foreach ($views as $view) {
            require_once __DIR__ . '/../views/' . $view . '.php';
        }
    }
}
