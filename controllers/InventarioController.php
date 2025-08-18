<?php

namespace Controllers;

use Classes\Paginacion;
use MVC\Router;

class InventarioController {

    public static function index(Router $router) {

         if(!is_admin()) {
            header('Location: /login');
        }
    }
}