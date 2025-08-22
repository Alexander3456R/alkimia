<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Inventario;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;


class InventarioController {

    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
            exit;
        }

        $pagina_actual = $_GET['page'] ?? 1;
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        if(!$pagina_actual || $pagina_actual < 1) {
            $pagina_actual = 1; // evitar redirección infinita
        }

        $registros_por_pagina = 6;
        $total = Inventario::total();

        // ⚡ Si no hay registros en toda la tabla, mostramos tabla vacía sin redirección
        if($total === 0) {
            $router->render('admin/inventario/index', [
                'titulo' => 'Inventario Alkimia Fashion Boutique',
                'inventario' => [],
                'paginacion' => ''
            ]);
            return; // salimos de la función
        }

        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        // ⚡ Si estoy en una página vacía (ej: borré todos en la última página)
        if($pagina_actual > $paginacion->total_paginas()) {
            $pagina_actual = 1; // reiniciamos a la página 1
            $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);
        }

        $inventario = Inventario::paginar($registros_por_pagina, $paginacion->offset());
        $paginacionHtml = $paginacion->paginacion();

        $router->render('admin/inventario/index', [
            'titulo' => 'Inventario Alkimia Fashion Boutique',
            'inventario' => $inventario,
            'paginacion' => $paginacionHtml
        ]);
    }




    public static function crear(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
            exit;
        }

        $alertas = [];
        $exito = false;
        $añadir_inventario = new Inventario();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(!is_admin()) {
                header('Location: /login');
                exit;
            }
            // Leer Imagen
            if(!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/build/img/catalogo';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0777, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);
                $imagen_avif = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('avif', 80);

                $nombre_imagen = md5(uniqid(rand(), true));
                $_POST['imagen'] = $nombre_imagen;
            }
            // Sincronizar datos del formulario
            $añadir_inventario->sincronizar($_POST);

            // Validar datos
            $alertas = $añadir_inventario->validar();

            // Guardar el registro
            if(empty($alertas)) {
                // Guardar la imagenes
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
                $imagen_avif->save($carpeta_imagenes . '/' . $nombre_imagen . ".avif");

                // Guardar en la base de datos
                $resultado = $añadir_inventario->guardar();

                if($resultado) {
                    $exito = true;
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
            exit;
        }

        $alertas = [];
        $id = $_GET['id'] ?? null;
        $id = filter_var($id, FILTER_VALIDATE_INT);
        $exito = false;

        if(!$id) {
            header('Location: /admin/inventario');
            exit;
        }

        $inventario = Inventario::find($id);
        if(!$inventario) {
            header('Location: /admin/inventario');
            exit;
        }

        $inventario->imagen_actual = $inventario->imagen;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
                exit;
            }
             // Leer Imagen
            if(!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/build/img/catalogo';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0777, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);
                $imagen_avif = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('avif', 80);

                $nombre_imagen = md5(uniqid(rand(), true));
                $_POST['imagen'] = $nombre_imagen;
            } else {
                $_POST['imagen'] = $inventario->imagen_actual;
            }
            $inventario->sincronizar($_POST);
            $alertas = $inventario->validar();
            

             // Guardar el registro
            if(empty($alertas)) {
                if(isset($nombre_imagen)) {

                    // 🔥 Eliminar imágenes anteriores
                    $extensiones = ['png', 'webp', 'avif'];
                    foreach($extensiones as $ext) {
                        $ruta = $carpeta_imagenes . '/' . $inventario->imagen_actual . '.' . $ext;
                        if(file_exists($ruta)) {
                            unlink($ruta);
                        }
                    }

                    // Guardar las imagenes
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
                    $imagen_avif->save($carpeta_imagenes . '/' . $nombre_imagen . ".avif");
                }
                // Guardar en la base de datos
                $resultado = $inventario->guardar();

                if($resultado) {
                    $exito = true;
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

            // 🔹 Contar registros restantes
            $total = Inventario::total();

            if($resultado) {
                echo json_encode([
                    'resultado' => true,
                    'total' => $total // enviamos el total de registros restantes
                ]);
            } else {
                echo json_encode(['resultado' => false, 'error' => 'No se pudo eliminar']);
            }
            exit;
        }
    }

}