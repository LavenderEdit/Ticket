<?php
namespace Controllers;

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../models/Rol_Permiso.php';

use Database\Database;
use Models\Rol_Permiso;
use Controllers\Controller;

class Rol_PermisoController extends Controller
{
    private Rol_Permiso $rolPermisoModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->rolPermisoModel = new Rol_Permiso($pdo);
    }

    protected function getAll(): void
    {
        $permisosRoles = $this->rolPermisoModel->visualizarPermisosDeRoles();
        $this->sendResponse(200, $permisosRoles);
    }

    protected function get(int $id): void
    {
        parse_str(file_get_contents('php://input'), $params);
        $permiso_id = isset($params['permiso_id']) ? intval($params['permiso_id']) : null;

        if ($permiso_id === null) {
            $this->sendResponse(400, ['message' => 'Faltan datos para consultar el permiso del rol.']);
            return;
        }

        $permisoRol = $this->rolPermisoModel->visualizarPermisoDeRolPorId($id, $permiso_id);
        if ($permisoRol) {
            $this->sendResponse(200, $permisoRol);
        } else {
            $this->sendResponse(404, ['message' => 'Relación Rol-Permiso no encontrada.']);
        }
    }

    protected function post(): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            $this->sendResponse(400, ['message' => 'Datos inválidos.']);
            return;
        }

        $rol_id = $data['rol_id'] ?? null;
        $permiso_id = $data['permiso_id'] ?? null;

        if (!$rol_id || !$permiso_id) {
            $this->sendResponse(400, ['message' => 'Faltan datos necesarios.']);
            return;
        }

        $resultado = $this->rolPermisoModel->asignarPermisoARol($rol_id, $permiso_id);
        $this->sendResponse($resultado ? 201 : 500, [
            'message' => $resultado ? 'Permiso asignado al rol correctamente.' : 'Error al asignar permiso.'
        ]);
    }

    protected function put(int $id): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            $this->sendResponse(400, ['message' => 'Datos inválidos.']);
            return;
        }

        $old_rol_id = $data['old_rol_id'] ?? null;
        $old_permiso_id = $data['old_permiso_id'] ?? null;
        $new_rol_id = $data['new_rol_id'] ?? null;
        $new_permiso_id = $data['new_permiso_id'] ?? null;

        if (!$old_rol_id || !$old_permiso_id || !$new_rol_id || !$new_permiso_id) {
            $this->sendResponse(400, ['message' => 'Faltan datos necesarios.']);
            return;
        }

        $resultado = $this->rolPermisoModel->editarPermisoARol(
            $old_rol_id,
            $old_permiso_id,
            $new_rol_id,
            $new_permiso_id
        );

        $this->sendResponse($resultado ? 200 : 500, [
            'message' => $resultado ? 'Permiso editado correctamente.' : 'Error al editar permiso.'
        ]);
    }

    protected function delete(int $id): void
    {
        parse_str(file_get_contents('php://input'), $params);
        $permiso_id = isset($params['permiso_id']) ? intval($params['permiso_id']) : null;

        if ($permiso_id === null) {
            $this->sendResponse(400, ['message' => 'Faltan datos para eliminar el permiso del rol.']);
            return;
        }

        $resultado = $this->rolPermisoModel->eliminarPermisoARol($id, $permiso_id);
        $this->sendResponse($resultado ? 200 : 500, [
            'message' => $resultado ? 'Permiso eliminado del rol correctamente.' : 'Error al eliminar permiso del rol.'
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
