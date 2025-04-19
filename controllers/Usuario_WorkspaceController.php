<?php
namespace Controllers;

require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../models/Usuario_Workspace.php';
require_once __DIR__ . '/../controllers/Controller.php';

use Database\Database;
use Models\Usuario_Workspace;
use Controllers\Controller;

class UsuarioWorkspaceController extends Controller
{
    private Usuario_Workspace $usuarioWorkspaceModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->usuarioWorkspaceModel = new Usuario_Workspace($pdo);
    }

    protected function getAll(): void
    {
        $usuarioWorkspaces = $this->usuarioWorkspaceModel->visualizarUsuarioWorkspaces();
        $this->sendResponse(200, $usuarioWorkspaces);
    }

    protected function get(int $id): void
    {
        $usuarioWorkspaces = $this->usuarioWorkspaceModel->visualizarUsuarioWorkspacePorId($id, $id);
        if ($usuarioWorkspaces) {
            $this->sendResponse(200, $usuarioWorkspaces);
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

        $resultado = $this->usuarioWorkspaceModel->insertarUsuarioWorkspace(
            $data['id_usuario'],
            $data['id_workspace'],
            $data['assigned_by'],
         
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

        $resultado = $this->usuarioWorkspaceModel->editarUsuarioWorkspace(
            $data['id_usuario'],
            $data['id_workspace'],
            $data['assigned_by'],
   
        );

        $this->sendResponse($resultado ? 200 : 500, [
            'message' => $resultado ? 'workspace actualizado correctamente' : 'Error al actualizar el workspace'
        ]);
    }

    protected function delete(int $id): void
    {
        $resultado = $this->usuarioWorkspaceModel->eliminarUsuarioWorkspace($id,$id);
        $this->sendResponse($resultado ? 200 : 500, [
            'message' => $resultado ? 'workspace eliminado correctamente' : 'Error al eliminar el workspace'
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