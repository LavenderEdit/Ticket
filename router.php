<?php

$controllerName = $_GET['controller'] ?? 'auth';
$action = $_GET['action'] ?? null;

if (!$action) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'No se ha especificado una acción.']);
    exit;
}

switch (strtolower($controllerName)) {
    case 'auth':
        require_once 'controllers/AuthController.php';
        $controller = new \Controllers\AuthController();
        break;
    case 'usuario':
        require_once 'controllers/UsuarioController.php';
        $controller = new \Controllers\UsuarioController();
        break;
    case 'roles':
        require_once 'controllers/RolesController.php';
        $controller = new \Controllers\RolesController();
        break;
    case 'permiso':
        require_once 'controllers/PermisoController.php';
        $controller = new \Controllers\PermisoController();
        break;
    case 'ticket':
        require_once 'controllers/TicketController.php';
        $controller = new \Controllers\TicketController();
        break;
    case 'usuariorol':
        require_once 'controllers/UsuarioRolController.php';
        $controller = new \Controllers\UsuarioRolController();
        break;
    case 'compradetalle':
        require_once 'controllers/CompraDetalleController.php';
        $controller = new \Controllers\CompraDetalleController();
        break;
    case 'compra':
        require_once 'controllers/CompraController.php';
        $controller = new \Controllers\CompraController();
        break;
    case 'rolpermiso':
        require_once 'controllers/Rol_PermisoController.php';
        $controller = new \Controllers\Rol_PermisoController();
        break;
    default:
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Controlador no válido.']);
        exit;
}

if (!method_exists($controller, $action)) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Acción no válida para este controlador.']);
    exit;
}

$controller->{$action}();
