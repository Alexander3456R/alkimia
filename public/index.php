<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AuthController;
use Controllers\DashboardController;
use Controllers\InventarioController;
use Controllers\MensajesController;
use Controllers\PaginasController;
use Controllers\RegistradosController;

$router = new Router();



// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
$router->get('/mensaje', [AuthController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);

// Zona de administracion

$router->get('/admin/dashboard', [DashboardController::class, 'index']);
$router->get('/admin/mensajes', [MensajesController::class, 'index']);
$router->post('/admin/mensajes/eliminar', [MensajesController::class, 'eliminar']);// Protegida
$router->get('/admin/registrados', [RegistradosController::class, 'index']);// Protegida
$router->get('/admin/inventario', [InventarioController::class, 'index']);// Protegida
$router->get('/admin/inventario/crear', [InventarioController::class, 'crear']);// Protegida
$router->post('/admin/inventario/crear', [InventarioController::class, 'crear']);// Protegida
$router->get('/admin/inventario/editar', [InventarioController::class, 'editar']);// Protegida
$router->post('/admin/inventario/editar', [InventarioController::class, 'editar']);// Protegida
$router->post('/admin/inventario/eliminar', [InventarioController::class, 'eliminar']);// Protegida






// Zona catalogo
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/catalogo', [PaginasController::class, 'catalogo']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

$router->comprobarRutas();