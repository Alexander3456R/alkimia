<?php

namespace Controllers;

use Model\Contacto;
use Classes\Paginacion;
use MVC\Router;

class MensajesController {

    public static function index(Router $router) {

         if(!is_admin()) {
            header('Location: /login');
        }


        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/mensajes?page=1');
        }

        $registros_por_pagina = 2;
        $total = Contacto::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/mensajes?page=1');
        }

        $mensajes = Contacto::paginar($registros_por_pagina, $paginacion->offset());


        $router->render('admin/mensajes/index', [
                'titulo' => 'Zona de mensajes',
                'mensajes' => $mensajes,
                'paginacion' => $paginacion->paginacion()
            ]);
    }


    public static function eliminar() {

         if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(!is_admin()) {
                header('Location: /login');
            }

            $id = $_POST['id'];
            $mensajes = Contacto::find($id);
            if(isset($mensajes)) {
                header('Location: /admin/mensajes');
            }
            $resultado = $mensajes->eliminar();

            if($resultado) {
                header('Location: /admin/mensajes');
            }
        }
    }
}