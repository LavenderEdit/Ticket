-- Selecciona la base de datos (asegúrate de haber corrido la creación de tablas previamente)
USE TicketingSystemDB;

-------------------------------------------------------
-- Insertar datos en la tabla Roles
-------------------------------------------------------
INSERT INTO Roles (nombre, descripcion) VALUES
('Administrador', 'Usuario con privilegios completos para la gestión del sistema'),
('Técnico', 'Usuario encargado de la resolución de tickets y mantenimiento del sistema'),
('Cliente', 'Usuario que reporta incidencias y realiza solicitudes de servicio'),
('Empresa', 'Organización que utiliza el sistema para gestionar incidencias');

-------------------------------------------------------
-- Insertar datos en la tabla Permisos
-------------------------------------------------------
INSERT INTO Permisos (nombre, descripcion) VALUES
('crear_ticket', 'Permite la creación de tickets por parte de los usuarios'),
('editar_ticket', 'Permite la edición y actualización de tickets existentes'),
('eliminar_ticket', 'Permite marcar tickets como eliminados o inactivos'),
('visualizar_ticket', 'Permite ver la información detallada de los tickets'),
('crear_usuario', 'Permite la creación de nuevos usuarios en el sistema'),
('editar_usuario', 'Permite la edición de usuarios existentes'),
('eliminar_usuario', 'Permite marcar usuarios como inactivos en lugar de borrarlos'),
('visualizar_usuario', 'Permite la visualización de la lista de usuarios y detalles');

-------------------------------------------------------
-- Insertar datos en la tabla Rol_Permiso
-------------------------------------------------------
-- Se asume que los IDs generados para roles y permisos son consecutivos, según el orden de inserción:
-- Roles: 1: Administrador, 2: Técnico, 3: Cliente, 4: Empresa
-- Permisos: 1: crear_ticket, 2: editar_ticket, 3: eliminar_ticket, 4: visualizar_ticket,
--           5: crear_usuario, 6: editar_usuario, 7: eliminar_usuario, 8: visualizar_usuario

-- Para Administrador (rol_id = 1): asigna todos los permisos.
INSERT INTO Rol_Permiso (rol_id, permiso_id) VALUES
(1, 1), (1, 2), (1, 3), (1, 4),
(1, 5), (1, 6), (1, 7), (1, 8);

-- Para Técnico (rol_id = 2): permisos para gestionar tickets.
INSERT INTO Rol_Permiso (rol_id, permiso_id) VALUES
(2, 1), (2, 2), (2, 4);

-- Para Cliente (rol_id = 3): permisos para crear y visualizar tickets.
INSERT INTO Rol_Permiso (rol_id, permiso_id) VALUES
(3, 1), (3, 4);

-- Para Empresa (rol_id = 4): similar al cliente, pero puede tener otras asignaciones en el futuro.
INSERT INTO Rol_Permiso (rol_id, permiso_id) VALUES
(4, 1), (4, 4);

-------------------------------------------------------
-- Insertar datos en la tabla Usuario
-------------------------------------------------------
-- Se insertan usuarios reales de diferentes roles:
INSERT INTO Usuario (nombre, telefono, email, fecha_logeo, contrasena, rol_id) VALUES
('Juan Perez', '987654321', 'juan.perez@example.com', NULL, 'hashed_password_juan', 1),
('Ana Martinez', '912345678', 'ana.martinez@example.com', NULL, 'hashed_password_ana', 1),
('Carlos Sanchez', '998877665', 'carlos.sanchez@example.com', NULL, 'hashed_password_carlos', 2),
('Laura Gutierrez', '987123456', 'laura.gutierrez@example.com', NULL, 'hashed_password_laura', 2),
('Maria Lopez', '987112233', 'maria.lopez@example.com', NULL, 'hashed_password_maria', 3),
('Pedro Rodriguez', '987445566', 'pedro.rodriguez@example.com', NULL, 'hashed_password_pedro', 3),
('TechSolutions S.A.', '512345678', 'contacto@techsolutions.com', NULL, 'hashed_password_tech', 4),
('Innovatech Ltda.', '511223344', 'info@innovatech.com', NULL, 'hashed_password_innovatech', 4);

-------------------------------------------------------
-- Insertar datos en la tabla Usuario_Rol (relación muchos a muchos)
-------------------------------------------------------
-- Ejemplo: asignar roles adicionales en ciertos usuarios para demostrar la flexibilidad.
-- Juan Perez (id 1) ya es Administrador, pero se le asigna también rol Técnico (id 2)
INSERT INTO Usuario_Rol (usuario_id, rol_id) VALUES
(1, 2),
-- Carlos Sanchez (id 3) es Técnico (ya asignado en la tabla Usuario), pero se podría asignar roles adicionales si es necesario.
(3, 2),
-- Pedro Rodriguez (id 6) como Cliente, se reafirma su rol.
(6, 3);

-------------------------------------------------------
-- Insertar datos en la tabla Compra
-------------------------------------------------------
-- Ejemplo: Compras realizadas por técnicos.
INSERT INTO Compra (tecnico_id, total) VALUES
(3, 150.75),  -- Compra realizada por Carlos Sanchez
(4, 200.00);  -- Compra realizada por Laura Gutierrez

-------------------------------------------------------
-- Insertar datos en la tabla CompraDetalle
-------------------------------------------------------
-- Detalles de la compra 1: (id de compra = 1)
INSERT INTO CompraDetalle (compra_id, componente, cantidad, precio) VALUES
(1, 'Tarjeta Madre ASUS Prime', 1, 150.75);

-- Detalles de la compra 2: (id de compra = 2)
INSERT INTO CompraDetalle (compra_id, componente, cantidad, precio) VALUES
(2, 'Módulo de Memoria RAM 16GB DDR4', 2, 100.00);

-------------------------------------------------------
-- Insertar datos en la tabla Ticket
-------------------------------------------------------
-- Ejemplos de tickets creados por distintos tipos de usuario.
-- Ticket 1: Creado por Maria Lopez (id = 5), problema de conectividad.
INSERT INTO Ticket (titulo, descripcion, estado, prioridad, creador_id) VALUES
('Problema con conexión a Internet',
 'Desde esta mañana no tengo conexión estable y necesito asistencia inmediata.',
 'Nuevo', 'Alta', 5);

-- Ticket 2: Creado por Pedro Rodriguez (id = 6), error en software.
INSERT INTO Ticket (titulo, descripcion, estado, prioridad, creador_id) VALUES
('Error en la aplicación de gestión',
 'La aplicación se cierra inesperadamente al intentar generar reportes.',
 'En Proceso', 'Media', 6);

-- Ticket 3: Creado por TechSolutions S.A. (id = 7), instalación de red.
INSERT INTO Ticket (titulo, descripcion, estado, prioridad, creador_id) VALUES
('Instalación de nueva red corporativa',
 'Se requiere la instalación y configuración de una nueva red en la oficina central.',
 'Asignado', 'Alta', 7);

-- Ticket 4: Creado por Innovatech Ltda. (id = 8), solicitud de actualización.
INSERT INTO Ticket (titulo, descripcion, estado, prioridad, creador_id, compra_id) VALUES
('Solicitud de actualización de software',
 'Se requiere actualizar la versión del software a la última disponible, revisa compatibilidades.',
 'Pre Atencion', 'Media', 8, 2);
