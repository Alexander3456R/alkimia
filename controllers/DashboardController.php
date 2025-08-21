<?php

namespace Controllers;

use Model\Contacto;
use Model\Inventario;
use Model\Usuario;
use MVC\Router;


class DashboardController {

    public static function index(Router $router) {

        if(!is_admin()) {
            header('Location: /login');
        }

        // Obtener ultimos registros
        $registros = Usuario::get(5);
        foreach($registros as $registro) {
            $registro->usuario = Usuario::find($registro->id);
        }

        // Obtener eventos con más y menos lugares disponibles
        $menos_disponibles = Inventario::ordenarLimite('disponibles', 'ASC', 5);
        $mas_disponibles = Inventario::ordenarLimite('disponibles', 'DESC', 5);

        //Obtener el total de mensajes
        $mensajes = Contacto::all();
        $total_mensajes = count($mensajes);

        $router->render('admin/dashboard/index', [
                'titulo' => 'Panel de Administración',
                'registros' => $registros,
                'menos_disponibles' => $menos_disponibles,
                'mas_disponibles' => $mas_disponibles,
                'mensajes' => $mensajes,
                'total_mensajes' => $total_mensajes
            ]);
    }
}