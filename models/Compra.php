<?php
namespace Models;
require_once __DIR__ . '/../models/BaseModel.php';

class Compra extends BaseModel
{
    private int $id;
    private int $tecnico_id;
    private string $fecha;
    private float $total;
    private bool $activo;
    private string $fecha_creacion;
    private string $fecha_actualizacion;

    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    // Procedimientos de Almacenado
    public function insertarCompra(int $tecnicoId, float $total, bool $activo)
    {
        return $this->callProcedure('Insertar_Compra', [$tecnicoId, $total, $activo]);
    }

    public function obtenerCompras()
    {
        return $this->callProcedure('Obtener_Compras', []);
    }

    // Getters y setters
    public function getId(): int
    {
        return $this->id;
    }
    public function getTecnicoId(): int
    {
        return $this->tecnico_id;
    }
    public function getFecha(): string
    {
        return $this->fecha;
    }
    public function getTotal(): float
    {
        return $this->total;
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
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setTecnicoId(int $tecnicoId): void
    {
        $this->tecnico_id = $tecnicoId;
    }
    public function setFecha(string $fecha): void
    {
        $this->fecha = $fecha;
    }
    public function setTotal(float $total): void
    {
        $this->total = $total;
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
}