CREATE DATABASE IF NOT EXISTS TicketingSystemDB;
USE TicketingSystemDB;
-- DROP DATABASE TicketingSystemDB;


-- ==========================================
-- Tabla Roles
-- ==========================================
CREATE TABLE Roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) UNIQUE NOT NULL,
    descripcion TEXT,
    activo TINYINT(1) DEFAULT 1,  -- 1: Activo, 0: Inactivo
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


-- ==========================================
-- Tabla Permisos
-- ==========================================
CREATE TABLE Permisos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) UNIQUE NOT NULL,
    descripcion TEXT,
    activo TINYINT(1) DEFAULT 1,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


-- ==========================================
-- Tabla Rol_Permiso
-- ==========================================
CREATE TABLE Rol_Permiso (
    rol_id INT,
    permiso_id INT,
    PRIMARY KEY (rol_id, permiso_id),
    FOREIGN KEY (rol_id) REFERENCES Roles(id) ON DELETE CASCADE,
    FOREIGN KEY (permiso_id) REFERENCES Permisos(id) ON DELETE CASCADE
);


-- ==========================================
-- Tabla Usuario
-- ==========================================
CREATE TABLE Usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    telefono VARCHAR(20),
    email VARCHAR(100) UNIQUE NOT NULL,
    fecha_logeo DATETIME,
    contrasena VARCHAR(255) NOT NULL,
    rol_id INT,  -- En caso de querer definir un rol por defecto; también se puede usar la tabla Usuario_Rol para relaciones muchos a muchos
    activo TINYINT(1) DEFAULT 1,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (rol_id) REFERENCES Roles(id) ON DELETE SET NULL
);


-- ==========================================
-- Tabla Usuario_Rol
-- ==========================================
CREATE TABLE Usuario_Rol (
    usuario_id INT,
    rol_id INT,
    PRIMARY KEY (usuario_id, rol_id),
    FOREIGN KEY (usuario_id) REFERENCES Usuario(id) ON DELETE CASCADE,
    FOREIGN KEY (rol_id) REFERENCES Roles(id) ON DELETE CASCADE
);

-- ==========================================
-- Tabla Compra
-- ==========================================
CREATE TABLE Compra (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tecnico_id INT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(10,2) NOT NULL,
    activo TINYINT(1) DEFAULT 1,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (tecnico_id) REFERENCES Usuario(id) ON DELETE CASCADE
);


-- ==========================================
-- Tabla CompraDetalle
-- ==========================================
CREATE TABLE CompraDetalle (
    id INT AUTO_INCREMENT PRIMARY KEY,
    compra_id INT NOT NULL,
    componente VARCHAR(100) NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    activo TINYINT(1) DEFAULT 1,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (compra_id) REFERENCES Compra(id) ON DELETE CASCADE
);


-- ==========================================
-- Tabla Workspace
-- ==========================================
CREATE TABLE Workspace (
  id_workspace     INT AUTO_INCREMENT PRIMARY KEY,
  nombre           VARCHAR(150)    NOT NULL,
  descripcion      TEXT            NULL,
  icono            LONGBLOB        NULL,
  activo           TINYINT(1)      NOT NULL DEFAULT 1,
  invite_code      TEXT            NULL,
  created_at       TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP,
  created_by       INT             NULL,
  updated_at       TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  updated_by       INT             NULL,
  CONSTRAINT fk_workspace_created_by
    FOREIGN KEY (created_by) REFERENCES Usuario(id) ON DELETE SET NULL,
  CONSTRAINT fk_workspace_updated_by
    FOREIGN KEY (updated_by) REFERENCES Usuario(id) ON DELETE SET NULL
);


-- ==========================================
-- Tabla de unión Usuario_Workspace
--    (relación N:N entre Usuario y Workspace)
-- ==========================================
CREATE TABLE Usuario_Workspace (
  id_usuario       INT             NOT NULL,
  id_workspace     INT             NOT NULL,
  assigned_at      TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP,
  assigned_by      INT             NULL,
  PRIMARY KEY (id_usuario, id_workspace),
  CONSTRAINT fk_uw_usuario
    FOREIGN KEY (id_usuario)   REFERENCES Usuario(id)    ON DELETE CASCADE,
  CONSTRAINT fk_uw_workspace
    FOREIGN KEY (id_workspace) REFERENCES Workspace(id_workspace) ON DELETE CASCADE,
  CONSTRAINT fk_uw_assigned_by
    FOREIGN KEY (assigned_by)  REFERENCES Usuario(id)    ON DELETE SET NULL
);


-- ==========================================
-- Tabla Proyecto
-- ==========================================
CREATE TABLE Proyecto (
  id_proyecto      INT AUTO_INCREMENT PRIMARY KEY,
  nombre           VARCHAR(100)    NOT NULL,
  descripcion      TEXT            NULL,
  activo           TINYINT(1)      NOT NULL DEFAULT 1,
  created_at       TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP,
  created_by       INT             NULL,
  updated_at       TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  updated_by       INT             NULL,
  CONSTRAINT fk_proyecto_created_by
    FOREIGN KEY (created_by) REFERENCES Usuario(id) ON DELETE SET NULL,
  CONSTRAINT fk_proyecto_updated_by
    FOREIGN KEY (updated_by) REFERENCES Usuario(id) ON DELETE SET NULL
);


-- ==========================================
-- Tabla Ticket
-- ==========================================
CREATE TABLE Ticket (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descripcion TEXT,
    estado ENUM('Nuevo','Asignado','Pre Atencion','En Proceso','Culminado') DEFAULT 'Nuevo',
    prioridad ENUM('Alta','Media','Baja') DEFAULT 'Media',
    activo TINYINT(1) DEFAULT 1,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    creador_id INT NOT NULL,
    compra_id INT,
    foto_ticket LONGBLOB,
    pdf_ticket LONGBLOB,
    FOREIGN KEY (creador_id) REFERENCES Usuario(id) ON DELETE CASCADE,
    FOREIGN KEY (compra_id) REFERENCES Compra(id) ON DELETE SET NULL
);


-- ==========================================
-- Tabla Proyecto_Ticket
-- ==========================================
CREATE TABLE Proyecto_Ticket (
  id_ticket        INT             NOT NULL,
  id_proyecto      INT             NOT NULL,
  assigned_at      TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP,
  assigned_by      INT             NULL,
  PRIMARY KEY (id_ticket, id_proyecto),
  CONSTRAINT fk_pt_ticket
    FOREIGN KEY (id_ticket)   REFERENCES Ticket(id)       ON DELETE CASCADE,
  CONSTRAINT fk_pt_proyecto
    FOREIGN KEY (id_proyecto) REFERENCES Proyecto(id_proyecto) ON DELETE CASCADE,
  CONSTRAINT fk_pt_assigned_by
    FOREIGN KEY (assigned_by) REFERENCES Usuario(id)    ON DELETE SET NULL
);


-- ==========================================
-- Notas y Buenas Prácticas
-- ==========================================
-- 1. Se han agregado los campos "activo", "fecha_creacion" y "fecha_actualizacion"
--    a las tablas principales para implementar soft deletes y auditoría.
--
-- 2. Se utiliza la convención de procedimiento almacenado:
--    sp_crear_[nombre_tabla]
--    sp_editar_[nombre_tabla]
--    sp_visualizar_[nombre_tabla]
--    sp_visualizar_por_id_[nombre_tabla]
--    sp_eliminar_[nombre_tabla]
--
--    Estos procedimientos podrán incluir transacciones y validaciones necesarias
--    para garantizar la integridad de los datos.
--
-- 3. Se recomienda definir índices adicionales en campos que se utilicen frecuentemente
--    en cláusulas WHERE, como "activo", para mejorar el rendimiento de las consultas.
