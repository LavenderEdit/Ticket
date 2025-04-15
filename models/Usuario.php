<?php
namespace Models;
require_once __DIR__ . '/../models/BaseModel.php';

class Usuario extends BaseModel
{
    private int $id;
    private string $nombre;
    private ?string $telefono;
    private string $email;
    private ?string $fecha_logeo;
    private string $contrasena;
    private ?int $rol_id;
    private bool $activo;
    private string $fecha_creacion;
    private string $fecha_actualizacion;

    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    // Procedimientos almacenados
    public function autenticarUsuario(string $correo, string $password)
    {
        $result = $this->callProcedure('autenticar', [$correo]);

        if ($result && isset($result[0])) {
            $usuario = $result[0];

            if ($password === $usuario['contrasenia']) {
                unset($usuario['contrasenia']);
                return $usuario;
            }
        }

        return false;
    }

    // Crud Básico
    public function insertarUsuario(string $nombre, ?string $telefono, string $email, ?string $fechaLogeo, string $contrasena, ?int $rol_id)
    {
        return $this->callProcedure('crear', [$nombre, $telefono, $email, $fechaLogeo, $contrasena, $rol_id]);
    }

    public function editarUsuario(int $id, string $nombre, ?string $telefono, string $email, ?string $fechaLogeo, string $contrasena, ?int $rol_id, bool $activo)
    {
        return $this->callProcedure('editar', [$id, $nombre, $telefono, $email, $fechaLogeo, $contrasena, $rol_id, $activo]);
    }

    public function visualizarUsuarios()
    {
        return $this->callProcedure('visualizar', []);
    }

    public function visualizarUsuarioPorId(int $id)
    {
        return $this->callProcedure('visualizar_por_id', [$id]);
    }

    public function eliminarUsuario(int $id)
    {
        return $this->callProcedure('eliminar', [$id]);
    }

    // Getters y setters
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): void
    {
        $this->telefono = $telefono;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getFechaLogeo(): ?string
    {
        return $this->fecha_logeo;
    }

    public function setFechaLogeo(?string $fechaLogeo): void
    {
        $this->fecha_logeo = $fechaLogeo;
    }

    public function getContrasena(): string
    {
        return $this->contrasena;
    }

    public function setContrasena(string $contrasena): void
    {
        $this->contrasena = $contrasena;
    }

    public function getRolId(): ?int
    {
        return $this->rol_id;
    }

    public function setRolId(?int $rol_id): void
    {
        $this->rol_id = $rol_id;
    }

    public function isActivo(): bool
    {
        return $this->activo;
    }

    public function setActivo(bool $activo): void
    {
        $this->activo = $activo;
    }

    public function getFechaCreacion(): string
    {
        return $this->fecha_creacion;
    }

    public function setFechaCreacion(string $fechaCreacion): void
    {
        $this->fecha_creacion = $fechaCreacion;
    }

    public function getFechaActualizacion(): string
    {
        return $this->fecha_actualizacion;
    }

    public function setFechaActualizacion(string $fechaActualizacion): void
    {
        $this->fecha_actualizacion = $fechaActualizacion;
    }
}