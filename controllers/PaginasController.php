<?php

namespace Controllers;

use Model\Contacto;
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
        
        $router->render('paginas/catalogo', [
            'titulo' => 'Nuestro Catálogo'
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