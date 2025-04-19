<?php
namespace Models;
require_once __DIR__ . '/../models/BaseModel.php';

class Workspace extends BaseModel
{
    private int $id_workspace;
    private string $nombre;
    private ?string $descripcion;
    private ?string $icono;
    private bool $activo;
    private string $created_at;
    private ?int $created_by;
    private string $updated_at;
    private ?int $updated_by;

    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    // Procedimientos almacenados
    public function insertarWorkspace(string $nombre, ?string $descripcion, ?string $icono,int $created_by)
    {
        return $this->callProcedure('crear', [$nombre, $descripcion,$icono,$created_by]);
    }

    public function editarWorkspace(int $id_workspace, string $nombre, ?string $descripcion, bool $activo, string $updated_at, ?int $updated_by)
    {
        return $this->callProcedure('editar', [$id_workspace, $nombre, $descripcion, $activo, $updated_at,$updated_by]);
    }

    public function visualizarWorkspaces()
    {
        return $this->callProcedure('visualizar', []);
    }

    public function visualizarWorkspacePorId(int $id_workspace)
    {
        return $this->callProcedure('visualizar_por_id', [$id_workspace]);
    }

    public function eliminarWorkspace(int $id_workspace)
    {
        return $this->callProcedure('eliminar', [$id_workspace]);
    }

    //Getters y Setters
    public function getIdWorkspace()
    {
        return $this->id_workspace;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getIcono()
    {
        return $this->icono;
    }public function isActivo()
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
    public function setIdWorkspace(int $id_workspace)
    {
        $this->id_workspace = $id_workspace;
    }
    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }
    public function setDescripcion(?string $descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function setIcono(?string $icono)
    {
        $this->icono = $icono;
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