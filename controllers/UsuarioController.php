<?php
namespace Controllers;

require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../controllers/Controller.php';

use Database\Database;
use Models\Usuario;
use Controllers\Controller;

class UsuarioController extends Controller
{
    private Usuario $usuarioModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->usuarioModel = new Usuario($pdo);
    }

    protected function getAll(): void
    {
        $usuarios = $this->usuarioModel->visualizarUsuarios();
        $this->sendResponse(200, $usuarios);
    }

    protected function get(int $id): void
    {
        $usuario = $this->usuarioModel->visualizarUsuarioPorId($id);
        if ($usuario) {
            $this->sendResponse(200, $usuario);
        } else {
            $this->sendResponse(404, ['message' => 'Usuario no encontrado.']);
        }
    }

    protected function post(): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            $this->sendResponse(400, ['message' => 'Datos inválidos']);
            return;
        }

        $resultado = $this->usuarioModel->insertarUsuario(
            $data['nombre'] ?? '',
            $data['telefono'] ?? '',
            $data['email'] ?? '',
            $data['fecha_logeo'] ?? '',
            $data['contrasena'] ?? '',
            $data['id_rol'] ?? null
        );

        $this->sendResponse($resultado ? 201 : 500, [
            'message' => $resultado ? 'Usuario creado' : 'Error al crear'
        ]);
    }

    protected function put(int $id): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            $this->sendResponse(400, ['message' => 'Datos inválidos']);
            return;
        }

        $resultado = $this->usuarioModel->editarUsuario(
            $id,
            $data['nombre'] ?? '',
            $data['telefono'] ?? '',
            $data['email'] ?? '',
            $data['fecha_logeo'] ?? '',
            $data['contrasena'] ?? '',
            $data['id_rol'] ?? null,
            $data['activo'] ?? true
        );

        $this->sendResponse($resultado ? 200 : 500, [
            'message' => $resultado ? 'Usuario actualizado' : 'Error al actualizar'
        ]);
    }

    protected function delete(int $id): void
    {
        $resultado = $this->usuarioModel->eliminarUsuario($id);
        $this->sendResponse($resultado ? 200 : 500, [
            'message' => $resultado ? 'Usuario eliminado' : 'Error al eliminar'
        ]);
    }
}