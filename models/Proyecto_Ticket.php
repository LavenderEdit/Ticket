<?php
namespace Models;
require_once __DIR__ . '/../models/BaseModel.php';

class Proyecto_Ticket extends BaseModel
{
    private int $id_ticket;
    private int $id_proyecto;
    private ?string $assigned_at;
    private int $assigned_by;

    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    //Procedimientos almacenados
    public function insertarProyectoTicket(int $id_ticket, int $id_proyecto,int $assigned_by)
    {
        return $this->callProcedure('crear', [$id_ticket, $id_proyecto, $assigned_by]);
    }
    public function editarProyectoTicket(int $id_ticket, int $id_proyecto, int $assigned_by)
    {
        return $this->callProcedure('editar', [$id_ticket, $id_proyecto, $assigned_by]);
    }

    public function visualizarProyectoTickets()
    {
        return $this->callProcedure('visualizar', []);
    }

    public function visualizarProyectoTicketPorId(int $id_ticket, int $id_proyecto)
    {
        return $this->callProcedure('visualizar_por_id', [$id_ticket, $id_proyecto]);
    }

    public function eliminarProyectoTicket(int $id_ticket, int $id_proyecto)
    {
        return $this->callProcedure('eliminar', [$id_ticket, $id_proyecto]);
    }

    //Getters y Setters
    public function getIdTicket()
    {
        return $this->id_ticket;
    }
    public function getIdProyecto()
    {
        return $this->id_proyecto;
    }
    public function getAssignedAt()
    {
        return $this->assigned_at;
    }
    public function getAssignedBy()
    {
        return $this->assigned_by;
    }
    public function setIdTicket(int $id_ticket)
    {
        $this->id_ticket = $id_ticket;
    }
    public function setIdProyecto(int $id_proyecto)
    {
        $this->id_proyecto = $id_proyecto;
    }
    public function setAssignedAt(string $assigned_at)
    {
        $this->assigned_at = $assigned_at;
    }
    public function setAssignedBy(int $assigned_by)
    {
        $this->assigned_by = $assigned_by;
    }    
}