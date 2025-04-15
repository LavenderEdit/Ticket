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
