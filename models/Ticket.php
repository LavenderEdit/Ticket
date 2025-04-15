<?php
namespace Models;
require_once __DIR__ . '/../models/BaseModel.php';

class Ticket extends BaseModel
{
    private int $id;
    private string $titulo;
    private ?string $descripcion;
    private string $estado;
    private string $prioridad;
    private bool $activo;
    private string $fecha_creacion;
    private string $fecha_actualizacion;
    private int $creador_id;
    private ?int $compra_id;
    private ?string $foto_ticket;
    private ?string $pdf_ticket;

    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    // Procedimientos almacenados

    public function insertarTicket(string $titulo, ?string $descripcion, string $estado, string $prioridad, int $creador_id, ?int $compra_id, ?string $foto_ticket, ?string $pdf_ticket)
    {
        return $this->callProcedure('crear', [$titulo, $descripcion, $estado, $prioridad, $creador_id, $compra_id, $foto_ticket, $pdf_ticket]);
    }

    public function editarTicket(int $id, string $titulo, ?string $descripcion, string $estado, string $prioridad, ?int $creador_id, ?int $compra_id, ?string $foto_ticket, ?string $pdf_ticket, bool $activo)
    {
        return $this->callProcedure('editar', [$id, $titulo, $descripcion, $estado, $prioridad, $creador_id, $compra_id, $foto_ticket, $pdf_ticket, $activo]);
    }

    public function visualizarTickets()
    {
        return $this->callProcedure('visualizar', []);
    }

    public function visualizarTicketsporId(int $id)
    {
        return $this->callProcedure('visualizar_por_id', [$id]);
    }

    public function eliminarTicket(int $id)
    {
        return $this->callProcedure('eliminar', [$id]);
    }

    // Getters y setters
    public function getId(): int
    {
        return $this->id;
    }
    public function getTitulo(): string
    {
        return $this->titulo;
    }
    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }
    public function getEstado(): string
    {
        return $this->estado;
    }
    public function getPrioridad(): string
    {
        return $this->prioridad;
    }
    public function isActivo(): bool
    {
        return $this->activo;
    }
    public function getFechaCreacion(): string
    {
        return $this->fecha_creacion;
    }
    public function getFechaActualizacion(): string
    {
        return $this->fecha_actualizacion;
    }
    public function getCreadorId(): int
    {
        return $this->creador_id;
    }
    public function getCompraId(): ?int
    {
        return $this->compra_id;
    }
    public function getFotoTicket(): ?string
    {
        return $this->foto_ticket;
    }
    public function getPdfTicket(): ?string
    {
        return $this->pdf_ticket;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }
    public function setDescripcion(?string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }
    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }
    public function setPrioridad(string $prioridad): void
    {
        $this->prioridad = $prioridad;
    }
    public function setActivo(bool $activo): void
    {
        $this->activo = $activo;
    }
    public function setFechaCreacion(string $fechaCreacion): void
    {
        $this->fecha_creacion = $fechaCreacion;
    }
    public function setFechaActualizacion(string $fechaActualizacion): void
    {
        $this->fecha_actualizacion = $fechaActualizacion;
    }
    public function setCreadorId(int $creadorId): void
    {
        $this->creador_id = $creadorId;
    }
    public function setCompraId(?int $compraId): void
    {
        $this->compra_id = $compraId;
    }
    public function setFotoTicket(?string $fotoTicket): void
    {
        $this->foto_ticket = $fotoTicket;
    }
    public function setPdfTicket(?string $pdfTicket): void
    {
        $this->pdf_ticket = $pdfTicket;
    }
}