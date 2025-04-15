<?php
namespace Models;
require_once __DIR__ . '/../models/BaseModel.php';

class UsuarioRol extends BaseModel
{
    private int $usuario_id;
    private int $rol_id;

    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    // Procedimientos almacenados
    public function insertarUsuarioRol(int $usuarioId, int $rolId)
    {
        return $this->callProcedure('crear', [$usuarioId, $rolId]);
    }

    public function editarUsuarioRol(int $oldUsuarioId, int $oldRolId, int $newUsuarioId, int $newRolId)
    {
        return $this->callProcedure('editar', [$oldUsuarioId, $oldRolId, $newUsuarioId, $newRolId]);
    }

    public function visualizarUsuarioRol()
    {
        return $this->callProcedure('visualizar', []);
    }

    public function visualizarUsuarioRolPorId(int $usuarioId, int $rolId)
    {
        return $this->callProcedure('visualizar_por_id', [$usuarioId, $rolId]);
    }

    public function eliminarUsuarioRol(int $usuarioId, int $rolId)
    {
        return $this->callProcedure('eliminar', [$usuarioId, $rolId]);
    }

    // Getters y setters
    public function getUsuarioId(): int
    {
        return $this->usuario_id;
    }
    public function getRolId(): int
    {
        return $this->rol_id;
    }
    public function setUsuarioId(int $usuarioId): void
    {
        $this->usuario_id = $usuarioId;
    }
    public function setRolId(int $rolId): void
    {
        $this->rol_id = $rolId;
    }
}