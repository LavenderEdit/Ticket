<?php
namespace Controllers;

require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../models/Workspace.php';
require_once __DIR__ . '/../controllers/Controller.php';

use Database\Database;
use Models\Workspace;
use Controllers\Controller;

class WorkspaceController extends Controller
{
    private Workspace $workspaceModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->workspaceModel = new Workspace($pdo);
    }

    protected function getAll(): void
    {
        $workspace = $this->workspaceModel->visualizarWorkspaces();
        $this->sendResponse(200, $workspace);
    }

    protected function get(int $id): void
    {
        $workspace = $this->workspaceModel->visualizarWorkspacePorId($id);
        if ($workspace) {
            $this->sendResponse(200, $workspace);
        } else {
            $this->sendResponse(404, ['message' => 'workspace no encontrado.']);
        }
    }

    protected function post(): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            $this->sendResponse(400, ['message' => 'Datos inválidos']);
            return;
        }

        $resultado = $this->workspaceModel->insertarWorkspace(
            $data['nombre'] ?? '',
            $data['descripcion'] ?? null,
            $data['created_by']
        );

        $this->sendResponse($resultado ? 201 : 500, [
            'message' => $resultado ? 'workspace creado correctamente' : 'Error al crear el workspace'
        ]);
    }

    protected function put(int $id): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            $this->sendResponse(400, ['message' => 'Datos inválidos']);
            return;
        }

        $resultado = $this->workspaceModel->editarworkspace(
            $id,
            $data['nombre'] ?? '',
            $data['descripcion'] ?? null,
            $data['icono'] ?? null,
            $data['activo'] ?? true,
            $data['invite_code'] ?? null,
            $data['updated_by'] ?? null
        );

        $this->sendResponse($resultado ? 200 : 500, [
            'message' => $resultado ? 'workspace actualizado correctamente' : 'Error al actualizar el workspace'
        ]);
    }

    protected function delete(int $id): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $id_usuario = $_SESSION['usuario']['id_usuario'] ?? null;
        if (!$id_usuario) {
            $this->sendResponse(401, ['message' => 'No autorizado.']);
            return;
        }

        $resultado = $this->workspaceModel->eliminarworkspace($id, $id_usuario);

        $this->sendResponse(
            $resultado ? 200 : 404,
            [
                'message' => $resultado
                    ? 'Workspace eliminado correctamente.'
                    : 'No se encontró el workspace o no tienes permisos.'
            ]
        );
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