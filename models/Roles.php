<?php
namespace Models;
require_once __DIR__ . '/../models/BaseModel.php';

class Roles extends BaseModel
{
    private int $id;
    private string $nombre;
    private ?string $descripcion;
    private bool $activo;
    private string $fecha_creacion;
    private string $fecha_actualizacion;

    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    public function insertarRol(string $nombre, ?string $descripcion)
    {
        return $this->callProcedure('crear', [$nombre, $descripcion]);
    }

    public function editarRol(int $id, string $nombre, ?string $descripcion, bool $activo)
    {
        return $this->callProcedure('editar', [$id, $nombre, $descripcion, $activo]);
    }
//te crees habil
    public function visualizarRoles()
    {
        return $this->callProcedure('visualizar', []);
    }

    public function visualizarRolPorId(int $id)
    {
        return $this->callProcedure('visualizar_por_id', [$id]);
    }

    public function eliminarRol(int $id)
    {
        return $this->callProcedure('eliminar', [$id]);
    }

    // Getters y setters
    public function getId(): int
    {
        return $this->id;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getDescripcion(): ?string
    {
        return $this->descripcion;
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
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }
    public function setDescripcion(?string $descripcion): void
    {
        $this->descripcion = $descripcion;
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