<?php
namespace Controllers;

require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../models/Proyecto.php';
require_once __DIR__ . '/../controllers/Controller.php';

use Database\Database;
use Models\Proyecto;
use Controllers\Controller;

class UsuarioWorkspaceController extends Controller
{
    private Proyecto $proyectoModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->proyectoModel = new Proyecto($pdo);
    }

    protected function getAll(): void
    {
        $proyecto = $this->proyectoModel->visualizarProyectos();
        $this->sendResponse(200, $proyecto);
    }

    protected function get(int $id): void
    {
        $proyecto = $this->proyectoModel->visualizarProyectoPorId($id);
        if ($proyecto) {
            $this->sendResponse(200, $proyecto);
        } else {
            $this->sendResponse(404, ['message' => 'Proyecto no encontrado.']);
        }
    }

    protected function post(): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            $this->sendResponse(400, ['message' => 'Datos inválidos']);
            return;
        }

        $resultado = $this->proyectoModel->insertarProyecto(
            $data['nombre'],
            $data['descripcion'] ?? null,
            $data['created_by'],
         
        );

        $this->sendResponse($resultado ? 201 : 500, [
            'message' => $resultado ? 'Proyecto Ticket creado correctamente' : 'Error al crear el Proyecto Ticket'
        ]);
    }

    protected function put(int $id): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            $this->sendResponse(400, ['message' => 'Datos inválidos']);
            return;
        }

        $resultado = $this->proyectoModel->editarProyecto(
            $data['id_proyecto'],
            $data['nombre'],
            $data['descripcion'] ?? null,
            $data['activo'],
            $data['updated_at'],
            $data['updated_by'] ?? null
        );

        $this->sendResponse($resultado ? 200 : 500, [
            'message' => $resultado ? 'Proyecto actualizado correctamente' : 'Error al actualizar el Proyecto'
        ]);
    }

    protected function delete(int $id): void
    {
        $resultado = $this->proyectoModel->eliminarProyecto($id);
        $this->sendResponse($resultado ? 200 : 500, [
            'message' => $resultado ? 'Proyecto eliminado correctamente' : 'Error al eliminar el Proyecto'
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