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


       $pagina_actual = $_GET['page'] ?? 1;
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        if(!$pagina_actual || $pagina_actual < 1) $pagina_actual = 1;

        $registros_por_pagina = 2;
        $total = Contacto::total();

        // Si no hay mensajes, simplemente setear mensajes vacíos y no hacer redirecciones
        if($total === 0) {
            $mensajes = [];
            $paginacionHtml = ''; // No mostrar paginación
        } else {
            $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

            if($paginacion->total_paginas() < $pagina_actual) {
                $pagina_actual = 1; // Evitar bucle de redirect
                $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);
            }

            $mensajes = Contacto::paginar($registros_por_pagina, $paginacion->offset());
            $paginacionHtml = $paginacion->paginacion();
        }

        $router->render('admin/mensajes/index', [
            'titulo' => 'Zona de mensajes',
            'mensajes' => $mensajes,
            'paginacion' => $paginacionHtml
        ]);

    }


    public static function eliminar() {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(!is_admin()) {
            echo json_encode(['resultado' => false, 'error' => 'No autorizado']);
            exit;
        }

        $id = $_POST['id'] ?? null;
        $mensaje = Contacto::find($id);

        if(!$mensaje) {
            echo json_encode(['resultado' => false, 'error' => 'Mensaje no encontrado']);
            exit;
        }

        $resultado = $mensaje->eliminar();

        if($resultado) {
            echo json_encode(['resultado' => true]);
        } else {
            echo json_encode(['resultado' => false, 'error' => 'No se pudo eliminar']);
        }
        exit;
    }
}

}