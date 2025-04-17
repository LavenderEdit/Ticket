<?php
namespace Controllers;

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../models/Permisos.php';

use Database\Database;
use Models\Permisos;
use Controllers\Controller;

class PermisoController extends Controller
{
    private Permisos $permisosModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->permisosModel = new Permisos($pdo);
    }

    protected function getAll(): void
    {
        $permisos = $this->permisosModel->visualizarPermisos();
        $this->sendResponse(200, $permisos);
    }

    protected function get(int $id): void
    {
        $permiso = $this->permisosModel->visualizarPermisoPorId($id);
        if ($permiso) {
            $this->sendResponse(200, $permiso);
        } else {
            $this->sendResponse(404, ['message' => 'Permiso no encontrado.']);
        }
    }

    protected function post(): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            $this->sendResponse(400, ['message' => 'Datos inválidos']);
            return;
        }

        $resultado = $this->permisosModel->insertarPermisos(
            $data['nombre'] ?? '',
            $data['descripcion'] ?? null
        );

        $this->sendResponse($resultado ? 201 : 500, [
            'message' => $resultado ? 'Permiso creado correctamente' : 'Error al crear el permiso'
        ]);
    }

    protected function put(int $id): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            $this->sendResponse(400, ['message' => 'Datos inválidos']);
            return;
        }

        $resultado = $this->permisosModel->editarPermisos(
            $id,
            $data['nombre'] ?? '',
            $data['descripcion'] ?? null,
            $data['activo'] ?? true
        );

        $this->sendResponse($resultado ? 200 : 500, [
            'message' => $resultado ? 'Permiso actualizado correctamente' : 'Error al actualizar el permiso'
        ]);
    }

    protected function delete(int $id): void
    {
        $resultado = $this->permisosModel->eliminarPermiso($id);
        $this->sendResponse($resultado ? 200 : 500, [
            'message' => $resultado ? 'Permiso eliminado correctamente' : 'Error al eliminar el permiso'
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
