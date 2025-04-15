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

    public function asignarPermisoARol(int $rolId, int $permisoId)
    {
        return $this->callProcedure('Asignar_Permiso_A_Rol', [$rolId, $permisoId]);
    }

    public function obtenerPermisosPorRol(int $rolId)
    {
        return $this->callProcedure('Obtener_Permisos_Por_Rol', [$rolId]);
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