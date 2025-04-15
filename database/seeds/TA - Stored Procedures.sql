DELIMITER $$
-- Procedimientos para la tabla Roles

-- sp_crear_Roles: Inserta un nuevo registro en Roles
DROP PROCEDURE IF EXISTS sp_crear_Roles$$
CREATE PROCEDURE sp_crear_Roles (
    IN p_nombre VARCHAR(50),
    IN p_descripcion TEXT
)
BEGIN
    INSERT INTO Roles (nombre, descripcion, activo)
    VALUES (p_nombre, p_descripcion, 1);
END$$

-- sp_editar_Roles: Actualiza un registro existente en Roles
DROP PROCEDURE IF EXISTS sp_editar_Roles$$
CREATE PROCEDURE sp_editar_Roles (
    IN p_id INT,
    IN p_nombre VARCHAR(50),
    IN p_descripcion TEXT,
    IN p_activo TINYINT
)
BEGIN
    UPDATE Roles 
    SET nombre = p_nombre,
        descripcion = p_descripcion,
        activo = p_activo,
        fecha_actualizacion = CURRENT_TIMESTAMP
    WHERE id = p_id;
END$$

-- sp_visualizar_Roles: Muestra todos los registros activos de Roles
DROP PROCEDURE IF EXISTS sp_visualizar_Roles$$
CREATE PROCEDURE sp_visualizar_Roles ()
BEGIN
    SELECT * FROM Roles WHERE activo = 1;
END$$

-- sp_visualizar_por_id_Roles: Muestra el registro de Roles por id
DROP PROCEDURE IF EXISTS sp_visualizar_por_id_Roles$$
CREATE PROCEDURE sp_visualizar_por_id_Roles (
    IN p_id INT
)
BEGIN
    SELECT * FROM Roles WHERE id = p_id;
END$$

-- sp_eliminar_Roles: Soft delete, marca un registro de Roles como inactivo
DROP PROCEDURE IF EXISTS sp_eliminar_Roles$$
CREATE PROCEDURE sp_eliminar_Roles (
    IN p_id INT
)
BEGIN
    UPDATE Roles SET activo = 0, fecha_actualizacion = CURRENT_TIMESTAMP WHERE id = p_id;
END$$

-----------------------------------------
-- Procedimientos para la tabla Permisos
-----------------------------------------

-- sp_crear_Permisos: Inserta un nuevo registro en Permisos
DROP PROCEDURE IF EXISTS sp_crear_Permisos$$
CREATE PROCEDURE sp_crear_Permisos (
    IN p_nombre VARCHAR(50),
    IN p_descripcion TEXT
)
BEGIN
    INSERT INTO Permisos (nombre, descripcion, activo)
    VALUES (p_nombre, p_descripcion, 1);
END$$

-- sp_editar_Permisos: Actualiza un registro existente en Permisos
DROP PROCEDURE IF EXISTS sp_editar_Permisos$$
CREATE PROCEDURE sp_editar_Permisos (
    IN p_id INT,
    IN p_nombre VARCHAR(50),
    IN p_descripcion TEXT,
    IN p_activo TINYINT
)
BEGIN
    UPDATE Permisos 
    SET nombre = p_nombre,
        descripcion = p_descripcion,
        activo = p_activo,
        fecha_actualizacion = CURRENT_TIMESTAMP
    WHERE id = p_id;
END$$

-- sp_visualizar_Permisos: Muestra todos los registros activos de Permisos
DROP PROCEDURE IF EXISTS sp_visualizar_Permisos$$
CREATE PROCEDURE sp_visualizar_Permisos ()
BEGIN
    SELECT * FROM Permisos WHERE activo = 1;
END$$

-- sp_visualizar_por_id_Permisos: Muestra el registro de Permisos por id
DROP PROCEDURE IF EXISTS sp_visualizar_por_id_Permisos$$
CREATE PROCEDURE sp_visualizar_por_id_Permisos (
    IN p_id INT
)
BEGIN
    SELECT * FROM Permisos WHERE id = p_id;
END$$

-- sp_eliminar_Permisos: Soft delete, marca un registro de Permisos como inactivo
DROP PROCEDURE IF EXISTS sp_eliminar_Permisos$$
CREATE PROCEDURE sp_eliminar_Permisos (
    IN p_id INT
)
BEGIN
    UPDATE Permisos SET activo = 0, fecha_actualizacion = CURRENT_TIMESTAMP WHERE id = p_id;
END$$

-----------------------------------------
-- Procedimientos para la tabla Rol_Permiso
-----------------------------------------
-- Nota: Para las tablas de relación, se requiere pasar los dos identificadores.
-- sp_crear_Rol_Permiso: Inserta una relación entre rol y permiso
DROP PROCEDURE IF EXISTS sp_crear_Rol_Permiso$$
CREATE PROCEDURE sp_crear_Rol_Permiso (
    IN p_rol_id INT,
    IN p_permiso_id INT
)
BEGIN
    INSERT INTO Rol_Permiso (rol_id, permiso_id)
    VALUES (p_rol_id, p_permiso_id);
END$$

-- sp_editar_Rol_Permiso: Actualiza una relación (requiere las llaves antiguas para identificar la fila)
DROP PROCEDURE IF EXISTS sp_editar_Rol_Permiso$$
CREATE PROCEDURE sp_editar_Rol_Permiso (
    IN p_old_rol_id INT,
    IN p_old_permiso_id INT,
    IN p_new_rol_id INT,
    IN p_new_permiso_id INT
)
BEGIN
    UPDATE Rol_Permiso 
    SET rol_id = p_new_rol_id,
        permiso_id = p_new_permiso_id
    WHERE rol_id = p_old_rol_id AND permiso_id = p_old_permiso_id;
END$$

-- sp_visualizar_Rol_Permiso: Muestra todas las relaciones entre roles y permisos
DROP PROCEDURE IF EXISTS sp_visualizar_Rol_Permiso$$
CREATE PROCEDURE sp_visualizar_Rol_Permiso ()
BEGIN
    SELECT * FROM Rol_Permiso;
END$$

-- sp_visualizar_por_id_Rol_Permiso: Muestra la relación en función de rol_id y permiso_id
DROP PROCEDURE IF EXISTS sp_visualizar_por_id_Rol_Permiso$$
CREATE PROCEDURE sp_visualizar_por_id_Rol_Permiso (
    IN p_rol_id INT,
    IN p_permiso_id INT
)
BEGIN
    SELECT * FROM Rol_Permiso
    WHERE rol_id = p_rol_id AND permiso_id = p_permiso_id;
END$$

-- sp_eliminar_Rol_Permiso: Elimina (física) una relación de rol y permiso
DROP PROCEDURE IF EXISTS sp_eliminar_Rol_Permiso$$
CREATE PROCEDURE sp_eliminar_Rol_Permiso (
    IN p_rol_id INT,
    IN p_permiso_id INT
)
BEGIN
    DELETE FROM Rol_Permiso 
    WHERE rol_id = p_rol_id AND permiso_id = p_permiso_id;
END$$

-----------------------------------------
-- Procedimientos para la tabla Usuario
-----------------------------------------

-- sp_crear_Usuario: Inserta un nuevo registro en Usuario
DROP PROCEDURE IF EXISTS sp_crear_Usuario$$
CREATE PROCEDURE sp_crear_Usuario (
    IN p_nombre VARCHAR(100),
    IN p_telefono VARCHAR(20),
    IN p_email VARCHAR(100),
    IN p_fecha_logeo DATETIME,
    IN p_contrasena VARCHAR(255),
    IN p_rol_id INT
)
BEGIN
    INSERT INTO Usuario (nombre, telefono, email, fecha_logeo, contrasena, rol_id, activo)
    VALUES (p_nombre, p_telefono, p_email, p_fecha_logeo, p_contrasena, p_rol_id, 1);
END$$

-- sp_editar_Usuario: Actualiza datos de un usuario
DROP PROCEDURE IF EXISTS sp_editar_Usuario$$
CREATE PROCEDURE sp_editar_Usuario (
    IN p_id INT,
    IN p_nombre VARCHAR(100),
    IN p_telefono VARCHAR(20),
    IN p_email VARCHAR(100),
    IN p_fecha_logeo DATETIME,
    IN p_contrasena VARCHAR(255),
    IN p_rol_id INT,
    IN p_activo TINYINT
)
BEGIN
    UPDATE Usuario
    SET nombre = p_nombre,
        telefono = p_telefono,
        email = p_email,
        fecha_logeo = p_fecha_logeo,
        contrasena = p_contrasena,
        rol_id = p_rol_id,
        activo = p_activo,
        fecha_actualizacion = CURRENT_TIMESTAMP
    WHERE id = p_id;
END$$

-- sp_visualizar_Usuario: Muestra todos los usuarios activos
DROP PROCEDURE IF EXISTS sp_visualizar_Usuario$$
CREATE PROCEDURE sp_visualizar_Usuario ()
BEGIN
    SELECT * FROM Usuario WHERE activo = 1;
END$$

-- sp_visualizar_por_id_Usuario: Muestra un usuario por su id
DROP PROCEDURE IF EXISTS sp_visualizar_por_id_Usuario$$
CREATE PROCEDURE sp_visualizar_por_id_Usuario (
    IN p_id INT
)
BEGIN
    SELECT * FROM Usuario WHERE id = p_id;
END$$

-- sp_eliminar_Usuario: Soft delete, marca un usuario como inactivo
DROP PROCEDURE IF EXISTS sp_eliminar_Usuario$$
CREATE PROCEDURE sp_eliminar_Usuario (
    IN p_id INT
)
BEGIN
    UPDATE Usuario SET activo = 0, fecha_actualizacion = CURRENT_TIMESTAMP WHERE id = p_id;
END$$

-----------------------------------------
-- Procedimientos para la tabla Usuario_Rol
-----------------------------------------
-- Nota: Tabla de relación entre Usuario y Roles

-- sp_crear_Usuario_Rol: Inserta una relación entre usuario y rol
DROP PROCEDURE IF EXISTS sp_crear_Usuario_Rol$$
CREATE PROCEDURE sp_crear_Usuario_Rol (
    IN p_usuario_id INT,
    IN p_rol_id INT
)
BEGIN
    INSERT INTO Usuario_Rol (usuario_id, rol_id)
    VALUES (p_usuario_id, p_rol_id);
END$$

-- sp_editar_Usuario_Rol: Actualiza la relación (requiere la llave antigua para identificar el registro)
DROP PROCEDURE IF EXISTS sp_editar_Usuario_Rol$$
CREATE PROCEDURE sp_editar_Usuario_Rol (
    IN p_old_usuario_id INT,
    IN p_old_rol_id INT,
    IN p_new_usuario_id INT,
    IN p_new_rol_id INT
)
BEGIN
    UPDATE Usuario_Rol
    SET usuario_id = p_new_usuario_id, rol_id = p_new_rol_id
    WHERE usuario_id = p_old_usuario_id AND rol_id = p_old_rol_id;
END$$

-- sp_visualizar_Usuario_Rol: Muestra todas las relaciones de Usuario_Rol
DROP PROCEDURE IF EXISTS sp_visualizar_Usuario_Rol$$
CREATE PROCEDURE sp_visualizar_Usuario_Rol ()
BEGIN
    SELECT * FROM Usuario_Rol;
END$$

-- sp_visualizar_por_id_Usuario_Rol: Muestra la relación según usuario_id y rol_id
DROP PROCEDURE IF EXISTS sp_visualizar_por_id_Usuario_Rol$$
CREATE PROCEDURE sp_visualizar_por_id_Usuario_Rol (
    IN p_usuario_id INT,
    IN p_rol_id INT
)
BEGIN
    SELECT * FROM Usuario_Rol
    WHERE usuario_id = p_usuario_id AND rol_id = p_rol_id;
END$$

-- sp_eliminar_Usuario_Rol: Elimina una relación de Usuario_Rol
DROP PROCEDURE IF EXISTS sp_eliminar_Usuario_Rol$$
CREATE PROCEDURE sp_eliminar_Usuario_Rol (
    IN p_usuario_id INT,
    IN p_rol_id INT
)
BEGIN
    DELETE FROM Usuario_Rol 
    WHERE usuario_id = p_usuario_id AND rol_id = p_rol_id;
END$$

-----------------------------------------
-- Procedimientos para la tabla Compra
-----------------------------------------

-- sp_crear_Compra: Inserta una nueva Compra
DROP PROCEDURE IF EXISTS sp_crear_Compra$$
CREATE PROCEDURE sp_crear_Compra (
    IN p_tecnico_id INT,
    IN p_total DECIMAL(10,2)
)
BEGIN
    INSERT INTO Compra (tecnico_id, total, activo)
    VALUES (p_tecnico_id, p_total, 1);
END$$

-- sp_editar_Compra: Actualiza una Compra existente
DROP PROCEDURE IF EXISTS sp_editar_Compra$$
CREATE PROCEDURE sp_editar_Compra (
    IN p_id INT,
    IN p_tecnico_id INT,
    IN p_total DECIMAL(10,2),
    IN p_activo TINYINT
)
BEGIN
    UPDATE Compra
    SET tecnico_id = p_tecnico_id,
        total = p_total,
        activo = p_activo,
        fecha_actualizacion = CURRENT_TIMESTAMP
    WHERE id = p_id;
END$$

-- sp_visualizar_Compra: Muestra todas las Compras activas
DROP PROCEDURE IF EXISTS sp_visualizar_Compra$$
CREATE PROCEDURE sp_visualizar_Compra ()
BEGIN
    SELECT * FROM Compra WHERE activo = 1;
END$$

-- sp_visualizar_por_id_Compra: Muestra una Compra por id
DROP PROCEDURE IF EXISTS sp_visualizar_por_id_Compra$$
CREATE PROCEDURE sp_visualizar_por_id_Compra (
    IN p_id INT
)
BEGIN
    SELECT * FROM Compra WHERE id = p_id;
END$$

-- sp_eliminar_Compra: Soft delete para Compra
DROP PROCEDURE IF EXISTS sp_eliminar_Compra$$
CREATE PROCEDURE sp_eliminar_Compra (
    IN p_id INT
)
BEGIN
    UPDATE Compra SET activo = 0, fecha_actualizacion = CURRENT_TIMESTAMP WHERE id = p_id;
END$$

-----------------------------------------
-- Procedimientos para la tabla CompraDetalle
-----------------------------------------

-- sp_crear_CompraDetalle: Inserta un detalle de compra
DROP PROCEDURE IF EXISTS sp_crear_CompraDetalle$$
CREATE PROCEDURE sp_crear_CompraDetalle (
    IN p_compra_id INT,
    IN p_componente VARCHAR(100),
    IN p_cantidad INT,
    IN p_precio DECIMAL(10,2)
)
BEGIN
    INSERT INTO CompraDetalle (compra_id, componente, cantidad, precio, activo)
    VALUES (p_compra_id, p_componente, p_cantidad, p_precio, 1);
END$$

-- sp_editar_CompraDetalle: Actualiza un registro en CompraDetalle
DROP PROCEDURE IF EXISTS sp_editar_CompraDetalle$$
CREATE PROCEDURE sp_editar_CompraDetalle (
    IN p_id INT,
    IN p_compra_id INT,
    IN p_componente VARCHAR(100),
    IN p_cantidad INT,
    IN p_precio DECIMAL(10,2),
    IN p_activo TINYINT
)
BEGIN
    UPDATE CompraDetalle
    SET compra_id = p_compra_id,
        componente = p_componente,
        cantidad = p_cantidad,
        precio = p_precio,
        activo = p_activo,
        fecha_actualizacion = CURRENT_TIMESTAMP
    WHERE id = p_id;
END$$

-- sp_visualizar_CompraDetalle: Muestra todos los detalles activos
DROP PROCEDURE IF EXISTS sp_visualizar_CompraDetalle$$
CREATE PROCEDURE sp_visualizar_CompraDetalle ()
BEGIN
    SELECT * FROM CompraDetalle WHERE activo = 1;
END$$

-- sp_visualizar_por_id_CompraDetalle: Muestra un detalle de compra por id
DROP PROCEDURE IF EXISTS sp_visualizar_por_id_CompraDetalle$$
CREATE PROCEDURE sp_visualizar_por_id_CompraDetalle (
    IN p_id INT
)
BEGIN
    SELECT * FROM CompraDetalle WHERE id = p_id;
END$$

-- sp_eliminar_CompraDetalle: Soft delete en CompraDetalle
DROP PROCEDURE IF EXISTS sp_eliminar_CompraDetalle$$
CREATE PROCEDURE sp_eliminar_CompraDetalle (
    IN p_id INT
)
BEGIN
    UPDATE CompraDetalle SET activo = 0, fecha_actualizacion = CURRENT_TIMESTAMP WHERE id = p_id;
END$$

-----------------------------------------
-- Procedimientos para la tabla Ticket
-----------------------------------------

-- sp_crear_Ticket: Inserta un nuevo ticket
DROP PROCEDURE IF EXISTS sp_crear_Ticket$$
CREATE PROCEDURE sp_crear_Ticket (
    IN p_titulo VARCHAR(100),
    IN p_descripcion TEXT,
    IN p_estado ENUM('Nuevo','Asignado','Pre Atencion','En Proceso','Culminado'),
    IN p_prioridad ENUM('Alta','Media','Baja'),
    IN p_creador_id INT,
    IN p_compra_id INT,        -- Puede ser NULL
    IN p_foto_ticket LONGBLOB,   -- Opcional
    IN p_pdf_ticket LONGBLOB     -- Opcional
)
BEGIN
    INSERT INTO Ticket (titulo, descripcion, estado, prioridad, creador_id, compra_id, foto_ticket, pdf_ticket, activo)
    VALUES (p_titulo, p_descripcion, p_estado, p_prioridad, p_creador_id, p_compra_id, p_foto_ticket, p_pdf_ticket, 1);
END$$

-- sp_editar_Ticket: Actualiza un ticket existente
DROP PROCEDURE IF EXISTS sp_editar_Ticket$$
CREATE PROCEDURE sp_editar_Ticket (
    IN p_id INT,
    IN p_titulo VARCHAR(100),
    IN p_descripcion TEXT,
    IN p_estado ENUM('Nuevo','Asignado','Pre Atencion','En Proceso','Culminado'),
    IN p_prioridad ENUM('Alta','Media','Baja'),
    IN p_creador_id INT,
    IN p_compra_id INT,
    IN p_foto_ticket LONGBLOB,
    IN p_pdf_ticket LONGBLOB,
    IN p_activo TINYINT
)
BEGIN
    UPDATE Ticket
    SET titulo = p_titulo,
        descripcion = p_descripcion,
        estado = p_estado,
        prioridad = p_prioridad,
        creador_id = p_creador_id,
        compra_id = p_compra_id,
        foto_ticket = p_foto_ticket,
        pdf_ticket = p_pdf_ticket,
        activo = p_activo,
        fecha_actualizacion = CURRENT_TIMESTAMP
    WHERE id = p_id;
END$$

-- sp_visualizar_Ticket: Muestra todos los tickets activos
DROP PROCEDURE IF EXISTS sp_visualizar_Ticket$$
CREATE PROCEDURE sp_visualizar_Ticket ()
BEGIN
    SELECT * FROM Ticket WHERE activo = 1;
END$$

-- sp_visualizar_por_id_Ticket: Muestra un ticket específico por id
DROP PROCEDURE IF EXISTS sp_visualizar_por_id_Ticket$$
CREATE PROCEDURE sp_visualizar_por_id_Ticket (
    IN p_id INT
)
BEGIN
    SELECT * FROM Ticket WHERE id = p_id;
END$$

-- sp_eliminar_Ticket: Soft delete, marca un ticket como inactivo
DROP PROCEDURE IF EXISTS sp_eliminar_Ticket$$
CREATE PROCEDURE sp_eliminar_Ticket (
    IN p_id INT
)
BEGIN
    UPDATE Ticket SET activo = 0, fecha_actualizacion = CURRENT_TIMESTAMP WHERE id = p_id;
END$$

DELIMITER ;
