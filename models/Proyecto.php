<?php
namespace Models;
require_once __DIR__ . '/../models/BaseModel.php';

class Proyecto extends BaseModel
{
    private int $id_proyecto;
    private string $nombre;
    private ?string $descripcion;
    private bool $activo;
    private string $created_at;
    private int $created_by;
    private string $updated_at;
    private int $updated_by;

    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    //Procedemientos Almacendos
    public function insertarProyecto(string $nombre, ?string $descripcion,int $created_by)
    {
        return $this->callProcedure('crear', [$nombre, $descripcion,$created_by]);
    }

    public function editarProyecto(int $id_proyecto, string $nombre, ?string $descripcion, bool $activo, string $updated_at, ?int $updated_by)
    {
        return $this->callProcedure('editar', [$id_proyecto, $nombre, $descripcion, $activo, $updated_at,$updated_by]);
    }

    public function visualizarProyectos()
    {
        return $this->callProcedure('visualizar', []);
    }

    public function visualizarProyectoPorId(int $id_proyecto)
    {
        return $this->callProcedure('visualizar_por_id', [$id_proyecto]);
    }

    public function eliminarProyecto(int $id_proyecto)
    {
        return $this->callProcedure('eliminar', [$id_proyecto]);
    }

    //Getters y Setters
    public function getIdProyecto()
    {
        return $this->id_proyecto;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function isActivo()
    {
        return $this->activo;
    }
    public function getCreatedAt()
    {
        return $this->created_at;
    }
    public function getCreatedBy()
    {
        return $this->created_by;
    }
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
    public function getUpdatedBy()
    {
        return $this->updated_by;
    }
    public function setIdProyecti(int $id_proyecto)
    {
        $this->id_proyecto = $id_proyecto;
    }
    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }
    public function setDescripcion(?string $descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function setActivo(bool $activo)
    {
        $this->activo = $activo;
    }
    public function setCreatedAt(string $created_at)
    {
        $this->created_at = $created_at;
    }
    public function setCreatedBy(?int $created_by)
    {
        $this->created_by = $created_by;
    }
    public function setUpdatedAt(string $updated_at)
    {
        $this->updated_at = $updated_at;
    }
    public function setUpdatedBy(?int $updated_by)
    {
        $this->updated_by = $updated_by;
    }
}