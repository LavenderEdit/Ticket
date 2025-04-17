<?php
namespace Controllers;

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../models/UsuarioRol.php';

use Database\Database;
use Models\UsuarioRol;
use Controllers\Controller;

class UsuarioRolController extends Controller
{
    private UsuarioRol $usuarioRolModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->usuarioRolModel = new UsuarioRol($pdo);
    }

    protected function getAll(): void
    {
        $usuarioRoles = $this->usuarioRolModel->visualizarUsuarioRol();
        $this->sendResponse(200, $usuarioRoles);
    }

    protected function get(int $id): void
    {
        $composite = explode('-', (string) $id);
        if (count($composite) !== 2) {
            $this->sendResponse(400, ['message' => 'Se requiere una clave compuesta con el formato usuarioId-rolId.']);
            return;
        }

        list($usuarioId, $rolId) = $composite;
        $usuarioId = intval($usuarioId);
        $rolId = intval($rolId);

        $usuarioRol = $this->usuarioRolModel->visualizarUsuarioRolPorId($usuarioId, $rolId);
        if ($usuarioRol) {
            $this->sendResponse(200, $usuarioRol);
        } else {
            $this->sendResponse(404, ['message' => 'UsuarioRol no encontrado.']);
        }
    }

    protected function post(): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            $this->sendResponse(400, ['message' => 'Datos inválidos.']);
            return;
        }

        $usuario_id = isset($data['usuario_id']) ? intval($data['usuario_id']) : 0;
        $rol_id = isset($data['rol_id']) ? intval($data['rol_id']) : 0;
        $resultado = $this->usuarioRolModel->insertarUsuarioRol($usuario_id, $rol_id);

        $this->sendResponse($resultado ? 201 : 500, [
            'message' => $resultado ? 'UsuarioRol creado correctamente.' : 'Error al crear UsuarioRol.'
        ]);
    }

    protected function put(int $id): void
    {
        $composite = explode('-', (string) $id);
        if (count($composite) !== 2) {
            $this->sendResponse(400, ['message' => 'Se requiere una clave compuesta con el formato usuarioId-rolId.']);
            return;
        }

        list($oldUsuarioId, $oldRolId) = $composite;
        $oldUsuarioId = intval($oldUsuarioId);
        $oldRolId = intval($oldRolId);

        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            $this->sendResponse(400, ['message' => 'Datos inválidos.']);
            return;
        }

        $newUsuarioId = isset($data['usuario_id']) ? intval($data['usuario_id']) : $oldUsuarioId;
        $newRolId = isset($data['rol_id']) ? intval($data['rol_id']) : $oldRolId;

        $resultado = $this->usuarioRolModel->editarUsuarioRol($oldUsuarioId, $oldRolId, $newUsuarioId, $newRolId);
        $this->sendResponse($resultado ? 200 : 500, [
            'message' => $resultado ? 'UsuarioRol actualizado correctamente.' : 'Error al actualizar UsuarioRol.'
        ]);
    }

    protected function delete(int $id): void
    {
        $composite = explode('-', (string) $id);
        if (count($composite) !== 2) {
            $this->sendResponse(400, ['message' => 'Se requiere una clave compuesta con el formato usuarioId-rolId.']);
            return;
        }

        list($usuarioId, $rolId) = $composite;
        $usuarioId = intval($usuarioId);
        $rolId = intval($rolId);

        $resultado = $this->usuarioRolModel->eliminarUsuarioRol($usuarioId, $rolId);
        $this->sendResponse($resultado ? 200 : 500, [
            'message' => $resultado ? 'UsuarioRol eliminado correctamente.' : 'Error al eliminar UsuarioRol.'
        ]);
    }

    protected function login(): void
    {
        $this->sendResponse(405, ['message' => 'Método no implementado.']);
    }
    protected function logout(): void
    {
        $this->sendResponse(405, ['message' => 'Método no implementado.']);
    }
}