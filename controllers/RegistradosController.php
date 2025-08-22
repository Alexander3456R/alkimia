<?php

namespace Controllers;

use Model\Usuario;
use Classes\Paginacion;
use MVC\Router;

class RegistradosController {

    public static function index(Router $router) {

         if(!is_admin()) {
            header('Location: /login');
        }


        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/registrados?page=1');
        }

        $registros_por_pagina = 4;
        $total = Usuario::total();

        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/registrados?page=1');
        }

        $usuarios = Usuario::paginar($registros_por_pagina, $paginacion->offset());


        $router->render('admin/registrados/index', [
                'titulo' => 'Usuarios Registrados en Alkimia Fashion Boutique',
                'usuarios' => $usuarios,
                'paginacion' => $paginacion->paginacion()
            ]);
    }
}