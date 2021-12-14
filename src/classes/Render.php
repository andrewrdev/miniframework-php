<?php 

namespace src\classes;

class Render
{
    /*
    |------------------------------------------------------------------------------------------------------------------
    | View
    |------------------------------------------------------------------------------------------------------------------
    */

    public static function view($views, $data = null)
    {

        if (isset($data) && !empty($data)) {
            extract($data);
        }
        
        if (isset($views)) {
            foreach ($views as $view) {
                require_once __DIR__ . '/../views/' . $view . '.php';
            }
        }
    }
}