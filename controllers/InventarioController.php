<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Inventario;
use MVC\Router;

class InventarioController {

    public static function index(Router $router) {

         if(!is_admin()) {
            header('Location: /login');
        }


        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/inventario?page=1');
        }

        $registros_por_pagina = 5;
        $total = Inventario::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/inventario?page=1');
        }

        $inventario = Inventario::paginar($registros_por_pagina, $paginacion->offset());


         $router->render('admin/inventario/index', [
                'titulo' => 'Inventario Alkimia Fashion Boutique',
                'inventario' => $inventario,
                'paginacion' => $paginacion->paginacion()
        ]);
    }


    public static function crear(Router $router) {

         if(!is_admin()) {
            header('Location: /login');
        }

        $alertas = [];
        $exito = false;
        $añadir_inventario = new Inventario();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(!is_admin()) {
                header('Location: /login');
            }
            $añadir_inventario->sincronizar($_POST);
            $alertas = $añadir_inventario->validar();

            if(empty($alertas)) {
                $resultado = $añadir_inventario->guardar();
                if($resultado) {
                    $exito = true;
                } else {
                    $alertas['error'][] = 'Error al guardar el evento. Inténtalo de nuevo.';
                }
            }

        }

        $router->render('admin/inventario/crear', [
                'titulo' => 'Añadir Inventario',
                'alertas' => $alertas,
                'exito' => $exito,
                'añadir_inventario' => $añadir_inventario
            ]);
    }




    public static function editar(Router $router) {

         if(!is_admin()) {
            header('Location: /login');
        }

        $alertas = [];
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        $exito = false;

        if(!$id) {
            header('Location: /admin/inventario');
        }

    

        $inventario = Inventario::find($id);
        if(!$inventario) {
            header('Location: /admin/inventario');
        }


        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(!is_admin()) {
                header('Location: /login');
            }
            $inventario->sincronizar($_POST);
            $alertas = $inventario->validar();

            if(empty($alertas)) {
                $resultado = $inventario->guardar();


                if($resultado) {
                    $exito = true;
                } else {
                    $alertas['error'][] = 'Error al guardar el inventario. Inténtalo de nuevo.';
                }
            }

        }

        $router->render('admin/inventario/editar', [
                'titulo' => 'Editar Inventario',
                'alertas' => $alertas,
                'inventario' => $inventario,
                'exito' => $exito
        ]);
    }


    public static function eliminar() {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(!is_admin()) {
            echo json_encode(['resultado' => false, 'error' => 'No autorizado']);
            exit;
        }

        $id = $_POST['id'] ?? null;
        $inventario = Inventario::find($id);

        if(!$inventario) {
            echo json_encode(['resultado' => false, 'error' => 'Producto no encontrado']);
            exit;
        }

        $resultado = $inventario->eliminar();

        if($resultado) {
            echo json_encode(['resultado' => true]);
        } else {
            echo json_encode(['resultado' => false, 'error' => 'No se pudo eliminar']);
        }
        exit;
    }
}



}