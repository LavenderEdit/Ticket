<?php
namespace Controllers;

require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../models/Usuario.php';

use Database\Database;
use Models\Usuario;

class AuthController
{
    private Usuario $usuarioModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->usuarioModel = new Usuario($pdo);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $correo = $_POST['correo'] ?? '';
            $password = $_POST['contra'] ?? '';

            $usuario = $this->usuarioModel->autenticarUsuario($correo, $password);

            if ($usuario) {
                $_SESSION['usuario'] = [
                    'id_usuario' => $usuario['id_usuario'],
                    'nombre' => $usuario['nombre'],
                    'rol_id' => $usuario['rol_id']
                ];

                header("Location: " . "views/dashboard.php");
                exit;
            } else {
                $_SESSION['error_login'] = "Credenciales incorrectas.";
                header("Location: " . "views/auth/login.php");
                exit;
            }
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: " . "/GestorSimple/");
        exit;
    }
}
