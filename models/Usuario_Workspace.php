<?php
namespace Models;
require_once __DIR__ . '/../models/BaseModel.php';

class Usuario_Workspace extends BaseModel
{
    private int $id_usuario;
    private int $id_workspace;
    private string $assigned_at;
    private int $assigned_by;

    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    // Procedimientos almacenados
    
    public function insertarUsuarioWorkspace(int $id_usuario, int $id_workspace,int $assigned_by)
    {
        return $this->callProcedure('crear', [$id_usuario, $id_workspace, $assigned_by]);
    }

    public function editarUsuarioWorkspace(int $id_usuario, int $id_workspace, int $assigned_by)
    {
        return $this->callProcedure('editar', [$id_usuario, $id_workspace, $assigned_by]);
    }

    public function visualizarUsuarioWorkspaces()
    {
        return $this->callProcedure('visualizar', []);
    }

    public function visualizarUsuarioWorkspacePorId(int $id_usuario, int $id_workspace)
    {
        return $this->callProcedure('visualizar_por_id', [$id_usuario, $id_workspace]);
    }

    public function eliminarUsuarioWorkspace(int $id_usuario, int $id_workspace)
    {
        return $this->callProcedure('eliminar', [$id_usuario, $id_workspace]);
    }

    //Getters y Setters
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }
    public function getIdWorkspace()
    {
        return $this->id_workspace;
    }
    public function getAssignedAt()
    {
        return $this->assigned_at;
    }
    public function getAssignedBy()
    {
        return $this->assigned_by;
    }
    public function setIdUsuario(int $id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }
    public function setIdWorkspace(int $id_workspace)
    {
        $this->id_workspace = $id_workspace;
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