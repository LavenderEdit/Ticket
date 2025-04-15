CREATE DATABASE IF NOT EXISTS TicketingSystemDB;
USE TicketingSystemDB;
-- DROP DATABASE TicketingSystemDB;

-------------------------------------------------------
-- Tabla Roles
-------------------------------------------------------
CREATE TABLE Roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) UNIQUE NOT NULL,
    descripcion TEXT,
    activo TINYINT(1) DEFAULT 1,  -- 1: Activo, 0: Inactivo
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-------------------------------------------------------
-- Tabla Permisos
-------------------------------------------------------
CREATE TABLE Permisos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) UNIQUE NOT NULL,
    descripcion TEXT,
    activo TINYINT(1) DEFAULT 1,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-------------------------------------------------------
-- Tabla Rol_Permiso
-------------------------------------------------------
CREATE TABLE Rol_Permiso (
    rol_id INT,
    permiso_id INT,
    PRIMARY KEY (rol_id, permiso_id),
    FOREIGN KEY (rol_id) REFERENCES Roles(id) ON DELETE CASCADE,
    FOREIGN KEY (permiso_id) REFERENCES Permisos(id) ON DELETE CASCADE
);

-------------------------------------------------------
-- Tabla Usuario
-------------------------------------------------------
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

-------------------------------------------------------
-- Tabla Usuario_Rol (para relaciones muchos a muchos)
-------------------------------------------------------
CREATE TABLE Usuario_Rol (
    usuario_id INT,
    rol_id INT,
    PRIMARY KEY (usuario_id, rol_id),
    FOREIGN KEY (usuario_id) REFERENCES Usuario(id) ON DELETE CASCADE,
    FOREIGN KEY (rol_id) REFERENCES Roles(id) ON DELETE CASCADE
);

-------------------------------------------------------
-- Tabla Compra
-------------------------------------------------------
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

-------------------------------------------------------
-- Tabla CompraDetalle
-------------------------------------------------------
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

-------------------------------------------------------
-- Tabla Ticket
-------------------------------------------------------
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

-------------------------------------------------------
-- Notas y Buenas Prácticas
-------------------------------------------------------
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
