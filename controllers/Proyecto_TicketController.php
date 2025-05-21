<?php
namespace Controllers;

require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../models/Proyecto_Ticket.php';
require_once __DIR__ . '/../controllers/Controller.php';

use Database\Database;
use Models\Proyecto_Ticket;
use Controllers\Controller;

class UsuarioWorkspaceController extends Controller
{
    private Proyecto_Ticket $proyectoTicketeModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->proyectoTicketeModel = new Proyecto_Ticket($pdo);
    }

    protected function getAll(): void
    {
        $proyectoTickets = $this->proyectoTicketeModel->visualizarProyectoTickets();
        $this->sendResponse(200, $proyectoTickets);
    }

    protected function get(int $id): void
    {
        $proyectoTickets = $this->proyectoTicketeModel->visualizarProyectoTicketPorId($id, $id);
        if ($proyectoTickets) {
            $this->sendResponse(200, $proyectoTickets);
        } else {
            $this->sendResponse(404, ['message' => 'Proyecto Ticket no encontrado.']);
        }
    }

    protected function post(): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            $this->sendResponse(400, ['message' => 'Datos inválidos']);
            return;
        }

        $resultado = $this->proyectoTicketeModel->insertarProyectoTicket(
            $data['id_ticket'],
            $data['id_proyecto'],
            $data['assigned_by']
        
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

        $resultado = $this->proyectoTicketeModel->editarProyectoTicket(
            $data['id_ticket'],
            $data['id_proyecto'],
            $data['assigned_by']
   
        );

        $this->sendResponse($resultado ? 200 : 500, [
            'message' => $resultado ? 'Proyecto Ticket actualizado correctamente' : 'Error al actualizar el Proyecto Ticket'
        ]);
    }

    protected function delete(int $id): void
    {
        $resultado = $this->proyectoTicketeModel->eliminarProyectoTicket($id,$id);
        $this->sendResponse($resultado ? 200 : 500, [
            'message' => $resultado ? 'Proyecto Ticket eliminado correctamente' : 'Error al eliminar el Proyecto Ticket'
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