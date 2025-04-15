<?php
namespace Controllers;

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../models/Usuario.php';

use Database\Database;
use Models\Usuario;
use Controllers\Controller;

class AuthController extends Controller
{
    private Usuario $usuarioModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->usuarioModel = new Usuario($pdo);
    }

    protected function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->sendResponse(405, ['message' => 'Método no permitido.']);
            exit;
        }

        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            $this->sendResponse(400, ['message' => 'Datos inválidos o ausentes.']);
            exit;
        }

        $correo = trim($data['correo'] ?? '');
        $password = $data['contra'] ?? '';

        if (empty($correo) || empty($password)) {
            $this->sendResponse(400, ['message' => 'Correo y contraseña son requeridos.']);
            exit;
        }

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $usuario = $this->usuarioModel->autenticarUsuario($correo, $password);

        if ($usuario) {
            $_SESSION['usuario'] = [
                'id_usuario' => $usuario['id'],
                'nombre' => $usuario['nombre'],
                'rol_id' => $usuario['rol_id']
            ];

            $this->sendResponse(200, [
                'message' => 'Login exitoso.',
                'usuario' => $usuario
            ]);
        } else {
            $this->sendResponse(401, ['message' => 'Credenciales incorrectas.']);
        }
    }

    protected function logout(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->sendResponse(405, ['message' => 'Método no permitido.']);
            exit;
        }

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        session_destroy();
        $this->sendResponse(200, ['message' => 'Sesión cerrada correctamente.']);
    }

    // Métodos no implementados para este controlador de autenticación.
    protected function getAll(): void
    {
        $this->sendResponse(405, ['message' => 'Método no implementado.']);
    }
    protected function get(int $id): void
    {
        $this->sendResponse(405, ['message' => 'Método no implementado.']);
    }
    protected function post(): void
    {
        $this->sendResponse(405, ['message' => 'Método no implementado.']);
    }
    protected function put(int $id): void
    {
        $this->sendResponse(405, ['message' => 'Método no implementado.']);
    }
    protected function delete(int $id): void
    {
        $this->sendResponse(405, ['message' => 'Método no implementado.']);
    }
}
