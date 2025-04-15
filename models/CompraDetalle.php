<?php
namespace Models;
require_once __DIR__ . '/../models/BaseModel.php';

class CompraDetalle extends BaseModel
{
    private int $id;
    private int $compra_id;
    private string $componente;
    private int $cantidad;
    private float $precio;
    private bool $activo;
    private string $fecha_creacion;
    private string $fecha_actualizacion;

    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    public function insertarDetalle(int $compraId, string $componente, int $cantidad, float $precio, bool $activo)
    {
        return $this->callProcedure('Insertar_CompraDetalle', [$compraId, $componente, $cantidad, $precio, $activo]);
    }

    public function obtenerDetallesPorCompra(int $compraId)
    {
        return $this->callProcedure('Obtener_Detalles_Por_Compra', [$compraId]);
    }

    // Getters y setters
    public function getId(): int
    {
        return $this->id;
    }
    public function getCompraId(): int
    {
        return $this->compra_id;
    }
    public function getComponente(): string
    {
        return $this->componente;
    }
    public function getCantidad(): int
    {
        return $this->cantidad;
    }
    public function getPrecio(): float
    {
        return $this->precio;
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
    public function setCompraId(int $compraId): void
    {
        $this->compra_id = $compraId;
    }
    public function setComponente(string $componente): void
    {
        $this->componente = $componente;
    }
    public function setCantidad(int $cantidad): void
    {
        $this->cantidad = $cantidad;
    }
    public function setPrecio(float $precio): void
    {
        $this->precio = $precio;
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