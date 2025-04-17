<?php
namespace Controllers;

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../models/Ticket.php';

use Database\Database;
use Models\Ticket;
use Controllers\Controller;

class TicketController extends Controller
{
    private Ticket $ticketModel;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->ticketModel = new Ticket($pdo);
    }

    protected function getAll(): void
    {
        $tickets = $this->ticketModel->visualizarTickets();
        $this->sendResponse(200, $tickets);
    }

    protected function get(int $id): void
    {
        $ticket = $this->ticketModel->visualizarTicketsporId($id);
        if ($ticket) {
            $this->sendResponse(200, $ticket);
        } else {
            $this->sendResponse(404, ['message' => 'Ticket no encontrado.']);
        }
    }

    protected function post(): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            $this->sendResponse(400, ['message' => 'Datos inválidos']);
            return;
        }

        $titulo = $data['titulo'] ?? '';
        $descripcion = $data['descripcion'] ?? null;
        $estado = $data['estado'] ?? '';
        $prioridad = $data['prioridad'] ?? '';
        $creador_id = isset($data['creador_id']) ? intval($data['creador_id']) : 0;
        $compra_id = isset($data['compra_id']) ? intval($data['compra_id']) : null;
        $foto_ticket = $data['foto_ticket'] ?? null;
        $pdf_ticket = $data['pdf_ticket'] ?? null;

        $resultado = $this->ticketModel->insertarTicket(
            $titulo,
            $descripcion,
            $estado,
            $prioridad,
            $creador_id,
            $compra_id,
            $foto_ticket,
            $pdf_ticket,
        );

        $this->sendResponse($resultado ? 201 : 500, [
            'message' => $resultado ? 'Ticket creado correctamente.' : 'Error al crear el ticket.'
        ]);
    }

    protected function put(int $id): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            $this->sendResponse(400, ['message' => 'Datos inválidos']);
            return;
        }

        $titulo = $data['titulo'] ?? '';
        $descripcion = $data['descripcion'] ?? null;
        $estado = $data['estado'] ?? '';
        $prioridad = $data['prioridad'] ?? '';
        $creador_id = isset($data['creador_id']) ? intval($data['creador_id']) : null;
        $compra_id = isset($data['compra_id']) ? intval($data['compra_id']) : null;
        $foto_ticket = $data['foto_ticket'] ?? null;
        $pdf_ticket = $data['pdf_ticket'] ?? null;
        $activo = isset($data['activo']) ? (bool) $data['activo'] : true;

        $resultado = $this->ticketModel->editarTicket(
            $id,
            $titulo,
            $descripcion,
            $estado,
            $prioridad,
            $creador_id,
            $compra_id,
            $foto_ticket,
            $pdf_ticket,
            $activo
        );

        $this->sendResponse($resultado ? 200 : 500, [
            'message' => $resultado ? 'Ticket actualizado correctamente.' : 'Error al actualizar el ticket.'
        ]);
    }

    protected function delete(int $id): void
    {
        $resultado = $this->ticketModel->eliminarTicket($id);
        $this->sendResponse($resultado ? 200 : 500, [
            'message' => $resultado ? 'Ticket eliminado correctamente.' : 'Error al eliminar el ticket.'
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
