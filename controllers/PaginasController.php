<?php

namespace Controllers;
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
        
        $router->render('paginas/contacto', [
            'titulo' => 'Contacto'
        ]);
    }
}