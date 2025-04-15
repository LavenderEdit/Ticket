<?php
namespace Models;
require_once __DIR__ . '/../models/BaseModel.php';

class RolPermiso extends BaseModel
{
    private int $rol_id;
    private int $permiso_id;

    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    public function asignarPermisoARol(int $rol_id, int $permiso_id)
    {
        return $this->callProcedure('crear', [$rol_id, $permiso_id]);
    }

    public function editarPermisoARol(int $old_rol_id, int $old_permiso_id, int $new_rol_id, int $new_permiso_id)
    {
        return $this->callProcedure('editar', [$old_rol_id, $old_permiso_id, $new_rol_id, $new_permiso_id]);
    }

    public function visualizarPermisosDeRoles()
    {
        return $this->callProcedure('visualizar', []);
    }

    public function visualizarPermisoDeRolPorId(int $rol_id, int $permiso_id)
    {
        return $this->callProcedure('visualizar_por_id', [$rol_id, $permiso_id]);
    }

    public function eliminarPermisoARol(int $rol_id, int $permiso_id)
    {
        return $this->callProcedure('eliminar', [$rol_id, $permiso_id]);
    }

    // Getters y setters
    public function getRolId(): int
    {
        return $this->rol_id;
    }
    public function getPermisoId(): int
    {
        return $this->permiso_id;
    }
    public function setRolId(int $rolId): void
    {
        $this->rol_id = $rolId;
    }
    public function setPermisoId(int $permisoId): void
    {
        $this->permiso_id = $permisoId;
    }
}