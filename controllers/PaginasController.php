<?php

namespace Controllers;

use Model\Contacto;
use Model\Inventario;
use Classes\Paginacion;
use MVC\Router;

class PaginasController {

    public static function index(Router $router) {
        
        $router->render('paginas/index', [
            'titulo' => 'Principal'
        ]);
    }

    public static function nosotros(Router $router) {
        
        $router->render('paginas/nosotros', [
            'titulo' => 'Sobre Nosotros'
        ]);
    }

    public static function catalogo(Router $router) {

        $pagina_actual = $_GET['page'] ?? 1;
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        if(!$pagina_actual || $pagina_actual < 1) $pagina_actual = 1;

        $registros_por_pagina = 6;
        $total = Inventario::total();

        // Si no hay mensajes, simplemente setear mensajes vacíos y no hacer redirecciones
        if($total === 0) {
            $catalogo = [];
            $paginacionHtml = ''; // No mostrar paginación
        } else {
            $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

            if($paginacion->total_paginas() < $pagina_actual) {
                $pagina_actual = 1; // Evitar bucle de redirect
                $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);
            }

            $catalogo = Inventario::paginar($registros_por_pagina, $paginacion->offset());
            $paginacionHtml = $paginacion->paginacion();
        }

        $router->render('paginas/catalogo', [
            'titulo' => 'Nuestro Catálogo',
            'catalogo' => $catalogo,
            'paginacion' => $paginacionHtml,

        ]);
    }

    

    public static function contacto(Router $router) {
        $alertas = [];
        $contacto = new Contacto;
        $exito = false;
        

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $contacto->sincronizar($_POST);
            $alertas = $contacto->validarContacto();
            $alertas = Contacto::getAlertas();

            if(empty($alertas)) {
                 $resultado = $contacto->guardar();

                 if($resultado) {
                        $exito = true;
                    }
            } 
        }

    
        
    

        $router->render('paginas/contacto', [
            'titulo' => 'Contacto',
            'contacto' => $contacto,
            'alertas' => $alertas,
            'exito' => $exito
        ]);
    }
}