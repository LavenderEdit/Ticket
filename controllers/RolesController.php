<?php
namespace Controllers;

require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../models/Roles.php';
require_once __DIR__ . '/../controllers/Controller.php';

use Database\Database;
use Models\Roles;
use Controllers\Controller;

class RolesController extends Controller
{
    private Roles $rolesModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->rolesModel = new Roles($pdo);
    }

    protected function getAll(): void
    {
        $roles = $this->rolesModel->visualizarRoles();
        $this->sendResponse(200, $roles);
    }

    protected function get(int $id): void
    {
        $role = $this->rolesModel->visualizarRolPorId($id);
        if ($role) {
            $this->sendResponse(200, $role);
        } else {
            $this->sendResponse(404, ['message' => 'Role no encontrado.']);
        }
    }

    protected function post(): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            $this->sendResponse(400, ['message' => 'Datos inválidos']);
            return;
        }

        $resultado = $this->rolesModel->insertarRol(
            $data['nombre'] ?? '',
            $data['descripcion'] ?? ''
        );

        $this->sendResponse($resultado ? 201 : 500, [
            'message' => $resultado ? 'Role creado correctamente' : 'Error al crear role'
        ]);
    }

    protected function put(int $id): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            $this->sendResponse(400, ['message' => 'Datos inválidos']);
            return;
        }

        $resultado = $this->rolesModel->editarRol(
            $id,
            $data['nombre'] ?? '',
            $data['descripcion'] ?? '',
            $data['activo'] ?? true
        );

        $this->sendResponse($resultado ? 200 : 500, [
            'message' => $resultado ? 'Rol actualizado correctamente' : 'Error al actualizar el rol'
        ]);
    }

    protected function delete(int $id): void
    {
        $resultado = $this->rolesModel->eliminarRol($id);
        $this->sendResponse($resultado ? 200 : 500, [
            'message' => $resultado ? 'Rol eliminado correctamente' : 'Error al eliminar el rol'
        ]);
    }
}
