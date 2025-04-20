DELIMITER $$

-- -----------------------------------
-- Procedimientos para la tabla roles
-- -----------------------------------
-- sp_crear_roles: Inserta un nuevo registro en roles y retorna el registro insertado en JSON
DROP PROCEDURE IF EXISTS sp_crear_roles$$
CREATE PROCEDURE sp_crear_roles (
    IN p_nombre VARCHAR(50),
    IN p_descripcion TEXT
)
BEGIN
    INSERT INTO roles (nombre, descripcion, activo)
    VALUES (p_nombre, p_descripcion, 1);

    SET @last_id = LAST_INSERT_ID();

    SELECT JSON_OBJECT(
             'message', 'Role creado exitosamente',
             'data', (SELECT JSON_OBJECT(
                         'id', id,
                         'nombre', nombre,
                         'descripcion', descripcion,
                         'activo', activo
                      ) FROM roles WHERE id = @last_id)
           ) AS response;
END$$

-- sp_editar_roles: Actualiza un registro existente en roles y retorna el registro actualizado en JSON
DROP PROCEDURE IF EXISTS sp_editar_roles$$
CREATE PROCEDURE sp_editar_roles (
    IN p_id INT,
    IN p_nombre VARCHAR(50),
    IN p_descripcion TEXT,
    IN p_activo TINYINT
)
BEGIN
    UPDATE roles
    SET nombre = p_nombre,
        descripcion = p_descripcion,
        activo = p_activo,
        fecha_actualizacion = CURRENT_TIMESTAMP
    WHERE id = p_id;
    
    SELECT JSON_OBJECT(
             'message', 'Role actualizado exitosamente',
             'data', (SELECT JSON_OBJECT(
                         'id', id,
                         'nombre', nombre,
                         'descripcion', descripcion,
                         'activo', activo,
                         'fecha_actualizacion', fecha_actualizacion
                      ) FROM roles WHERE id = p_id)
           ) AS response;
END$$

-- sp_visualizar_roles: Muestra todos los registros activos de roles en formato JSON
DROP PROCEDURE IF EXISTS sp_visualizar_roles$$
CREATE PROCEDURE sp_visualizar_roles ()
BEGIN
    SELECT JSON_OBJECT(
             'message', 'Roles activos',
             'data', (SELECT JSON_ARRAYAGG(JSON_OBJECT(
                         'id', id,
                         'nombre', nombre,
                         'descripcion', descripcion,
                         'activo', activo
                      )) FROM roles WHERE activo = 1)
           ) AS response;
END$$

-- sp_visualizar_por_id_roles: Muestra el registro de roles por id en formato JSON
DROP PROCEDURE IF EXISTS sp_visualizar_por_id_roles$$
CREATE PROCEDURE sp_visualizar_por_id_roles (
    IN p_id INT
)
BEGIN
    SELECT JSON_OBJECT(
             'message', 'Role encontrado',
             'data', (SELECT JSON_OBJECT(
                         'id', id,
                         'nombre', nombre,
                         'descripcion', descripcion,
                         'activo', activo
                      ) FROM roles WHERE id = p_id)
           ) AS response;
END$$

-- sp_eliminar_roles: Soft delete, marca un registro de roles como inactivo y retorna el registro actualizado en JSON
DROP PROCEDURE IF EXISTS sp_eliminar_roles$$
CREATE PROCEDURE sp_eliminar_roles (
    IN p_id INT
)
BEGIN
    UPDATE roles
    SET activo = 0,
        fecha_actualizacion = CURRENT_TIMESTAMP
    WHERE id = p_id;
    
    SELECT JSON_OBJECT(
             'message', 'Role eliminado (soft delete) exitosamente',
             'data', (SELECT JSON_OBJECT(
                         'id', id,
                         'nombre', nombre,
                         'descripcion', descripcion,
                         'activo', activo,
                         'fecha_actualizacion', fecha_actualizacion
                      ) FROM roles WHERE id = p_id)
           ) AS response;
END$$

-- ---------------------------------------
-- Procedimientos para la tabla permisos
-- ---------------------------------------

-- sp_crear_permisos: Inserta un nuevo registro en permisos y retorna el registro insertado en JSON
DROP PROCEDURE IF EXISTS sp_crear_permisos$$
CREATE PROCEDURE sp_crear_permisos (
    IN p_nombre VARCHAR(50),
    IN p_descripcion TEXT
)
BEGIN
    INSERT INTO permisos (nombre, descripcion, activo)
    VALUES (p_nombre, p_descripcion, 1);

    SET @last_id = LAST_INSERT_ID();

    SELECT JSON_OBJECT(
             'message', 'Permiso creado exitosamente',
             'data', (SELECT JSON_OBJECT(
                         'id', id,
                         'nombre', nombre,
                         'descripcion', descripcion,
                         'activo', activo
                      ) FROM permisos WHERE id = @last_id)
           ) AS response;
END$$

-- sp_editar_permisos: Actualiza un registro existente en permisos y retorna el registro actualizado en JSON
DROP PROCEDURE IF EXISTS sp_editar_permisos$$
CREATE PROCEDURE sp_editar_permisos (
    IN p_id INT,
    IN p_nombre VARCHAR(50),
    IN p_descripcion TEXT,
    IN p_activo TINYINT
)
BEGIN
    UPDATE permisos
    SET nombre = p_nombre,
        descripcion = p_descripcion,
        activo = p_activo,
        fecha_actualizacion = CURRENT_TIMESTAMP
    WHERE id = p_id;

    SELECT JSON_OBJECT(
             'message', 'Permiso actualizado exitosamente',
             'data', (SELECT JSON_OBJECT(
                         'id', id,
                         'nombre', nombre,
                         'descripcion', descripcion,
                         'activo', activo,
                         'fecha_actualizacion', fecha_actualizacion
                      ) FROM permisos WHERE id = p_id)
           ) AS response;
END$$

-- sp_visualizar_permisos: Muestra todos los registros activos de permisos en formato JSON
DROP PROCEDURE IF EXISTS sp_visualizar_permisos$$
CREATE PROCEDURE sp_visualizar_permisos ()
BEGIN
    SELECT JSON_OBJECT(
             'message', 'Permisos activos',
             'data', (SELECT JSON_ARRAYAGG(JSON_OBJECT(
                         'id', id,
                         'nombre', nombre,
                         'descripcion', descripcion,
                         'activo', activo
                      )) FROM permisos WHERE activo = 1)
           ) AS response;
END$$

-- sp_visualizar_por_id_permisos: Muestra el registro de permisos por id en formato JSON
DROP PROCEDURE IF EXISTS sp_visualizar_por_id_permisos$$
CREATE PROCEDURE sp_visualizar_por_id_permisos (
    IN p_id INT
)
BEGIN
    SELECT JSON_OBJECT(
             'message', 'Permiso encontrado',
             'data', (SELECT JSON_OBJECT(
                         'id', id,
                         'nombre', nombre,
                         'descripcion', descripcion,
                         'activo', activo
                      ) FROM permisos WHERE id = p_id)
           ) AS response;
END$$

-- sp_eliminar_permisos: Soft delete, marca un registro de permisos como inactivo y retorna el registro actualizado en JSON
DROP PROCEDURE IF EXISTS sp_eliminar_permisos$$
CREATE PROCEDURE sp_eliminar_permisos (
    IN p_id INT
)
BEGIN
    UPDATE permisos
    SET activo = 0,
        fecha_actualizacion = CURRENT_TIMESTAMP
    WHERE id = p_id;

    SELECT JSON_OBJECT(
             'message', 'Permiso eliminado (soft delete) exitosamente',
             'data', (SELECT JSON_OBJECT(
                         'id', id,
                         'nombre', nombre,
                         'descripcion', descripcion,
                         'activo', activo,
                         'fecha_actualizacion', fecha_actualizacion
                      ) FROM permisos WHERE id = p_id)
           ) AS response;
END$$

-- ---------------------------------------
-- Procedimientos para la tabla rol_permiso
-- ---------------------------------------
-- Nota: Para las tablas de relación se requiere pasar los dos identificadores.

-- sp_crear_rol_permiso: Inserta una relación entre rol y permiso y retorna la relación creada en JSON
DROP PROCEDURE IF EXISTS sp_crear_rol_permiso$$
CREATE PROCEDURE sp_crear_rol_permiso (
    IN p_rol_id INT,
    IN p_permiso_id INT
)
BEGIN
    INSERT INTO rol_permiso (rol_id, permiso_id)
    VALUES (p_rol_id, p_permiso_id);

    SELECT JSON_OBJECT(
             'message', 'Relación rol-permiso creada exitosamente',
             'data', JSON_OBJECT('rol_id', p_rol_id, 'permiso_id', p_permiso_id)
           ) AS response;
END$$

-- sp_editar_rol_permiso: Actualiza una relación en rol_permiso y retorna la nueva relación en JSON
DROP PROCEDURE IF EXISTS sp_editar_rol_permiso$$
CREATE PROCEDURE sp_editar_rol_permiso (
    IN p_old_rol_id INT,
    IN p_old_permiso_id INT,
    IN p_new_rol_id INT,
    IN p_new_permiso_id INT
)
BEGIN
    UPDATE rol_permiso
    SET rol_id = p_new_rol_id,
        permiso_id = p_new_permiso_id
    WHERE rol_id = p_old_rol_id AND permiso_id = p_old_permiso_id;

    SELECT JSON_OBJECT(
             'message', 'Relación rol-permiso actualizada exitosamente',
             'data', JSON_OBJECT('rol_id', p_new_rol_id, 'permiso_id', p_new_permiso_id)
           ) AS response;
END$$

-- sp_visualizar_rol_permiso: Muestra todas las relaciones de rol_permiso en formato JSON
DROP PROCEDURE IF EXISTS sp_visualizar_rol_permiso$$
CREATE PROCEDURE sp_visualizar_rol_permiso ()
BEGIN
    SELECT JSON_OBJECT(
             'message', 'Relaciones rol-permiso',
             'data', (SELECT JSON_ARRAYAGG(JSON_OBJECT(
                         'rol_id', rol_id,
                         'permiso_id', permiso_id
                      )) FROM rol_permiso)
           ) AS response;
END$$

-- sp_visualizar_por_id_rol_permiso: Muestra la relación específica en rol_permiso en formato JSON
DROP PROCEDURE IF EXISTS sp_visualizar_por_id_rol_permiso$$
CREATE PROCEDURE sp_visualizar_por_id_rol_permiso (
    IN p_rol_id INT,
    IN p_permiso_id INT
)
BEGIN
    SELECT JSON_OBJECT(
             'message', 'Relación rol-permiso encontrada',
             'data', (SELECT JSON_OBJECT(
                         'rol_id', rol_id,
                         'permiso_id', permiso_id
                      ) FROM rol_permiso
                      WHERE rol_id = p_rol_id AND permiso_id = p_permiso_id)
           ) AS response;
END$$

-- sp_eliminar_rol_permiso: Elimina una relación de rol_permiso y retorna confirmación en JSON
DROP PROCEDURE IF EXISTS sp_eliminar_rol_permiso$$
CREATE PROCEDURE sp_eliminar_rol_permiso (
    IN p_rol_id INT,
    IN p_permiso_id INT
)
BEGIN
    DELETE FROM rol_permiso
    WHERE rol_id = p_rol_id AND permiso_id = p_permiso_id;

    SELECT JSON_OBJECT(
             'message', 'Relación rol-permiso eliminada exitosamente',
             'data', JSON_OBJECT('rol_id', p_rol_id, 'permiso_id', p_permiso_id)
           ) AS response;
END$$

-- ---------------------------------------
-- Procedimientos para la tabla usuario
-- ---------------------------------------
-- sp_crear_usuario: Inserta un nuevo registro en usuario y retorna el registro insertado en JSON
DROP PROCEDURE IF EXISTS sp_crear_usuario$$
CREATE PROCEDURE sp_crear_usuario (
    IN p_nombre VARCHAR(100),
    IN p_telefono VARCHAR(20),
    IN p_email VARCHAR(100),
    IN p_fecha_logeo DATETIME,
    IN p_contrasena VARCHAR(255),
    IN p_rol_id INT
)
BEGIN
    INSERT INTO usuario (nombre, telefono, email, fecha_logeo, contrasena, rol_id, activo)
    VALUES (p_nombre, p_telefono, p_email, p_fecha_logeo, p_contrasena, p_rol_id, 1);

    SET @last_id = LAST_INSERT_ID();

    SELECT JSON_OBJECT(
             'message', 'Usuario creado exitosamente',
             'data', (SELECT JSON_OBJECT(
                        'id', id,
                        'nombre', nombre,
                        'telefono', telefono,
                        'email', email,
                        'rol_id', rol_id,
                        'activo', activo
                      ) FROM usuario WHERE id = @last_id)
           ) AS response;
END$$

-- sp_editar_usuario: Actualiza un registro en usuario y retorna el registro actualizado en JSON
DROP PROCEDURE IF EXISTS sp_editar_usuario$$
CREATE PROCEDURE sp_editar_usuario (
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
    UPDATE usuario
    SET nombre = p_nombre,
        telefono = p_telefono,
        email = p_email,
        fecha_logeo = p_fecha_logeo,
        contrasena = p_contrasena,
        rol_id = p_rol_id,
        activo = p_activo,
        fecha_actualizacion = CURRENT_TIMESTAMP
    WHERE id = p_id;

    SELECT JSON_OBJECT(
             'message', 'Usuario actualizado exitosamente',
             'data', (SELECT JSON_OBJECT(
                        'id', id,
                        'nombre', nombre,
                        'telefono', telefono,
                        'email', email,
                        'rol_id', rol_id,
                        'activo', activo,
                        'fecha_actualizacion', fecha_actualizacion
                      ) FROM usuario WHERE id = p_id)
           ) AS response;
END$$

-- sp_visualizar_usuario: Muestra todos los usuarios activos en formato JSON
DROP PROCEDURE IF EXISTS sp_visualizar_usuario$$
CREATE PROCEDURE sp_visualizar_usuario ()
BEGIN
    SELECT JSON_OBJECT(
             'message', 'Usuarios activos',
             'data', (SELECT JSON_ARRAYAGG(JSON_OBJECT(
                        'id', id,
                        'nombre', nombre,
                        'telefono', telefono,
                        'email', email,
                        'rol_id', rol_id,
                        'activo', activo
                      )) FROM usuario WHERE activo = 1)
           ) AS response;
END$$

-- sp_visualizar_por_id_usuario: Muestra un usuario por su id en formato JSON
DROP PROCEDURE IF EXISTS sp_visualizar_por_id_usuario$$
CREATE PROCEDURE sp_visualizar_por_id_usuario (
    IN p_id INT
)
BEGIN
    SELECT JSON_OBJECT(
             'message', 'Usuario encontrado',
             'data', (SELECT JSON_OBJECT(
                        'id', id,
                        'nombre', nombre,
                        'telefono', telefono,
                        'email', email,
                        'rol_id', rol_id,
                        'activo', activo
                      ) FROM usuario WHERE id = p_id)
           ) AS response;
END$$

-- sp_eliminar_usuario: Soft delete, marca un usuario como inactivo y retorna el registro actualizado en JSON
DROP PROCEDURE IF EXISTS sp_eliminar_usuario$$
CREATE PROCEDURE sp_eliminar_usuario (
    IN p_id INT
)
BEGIN
    UPDATE usuario
    SET activo = 0,
        fecha_actualizacion = CURRENT_TIMESTAMP
    WHERE id = p_id;

    SELECT JSON_OBJECT(
             'message', 'Usuario eliminado (soft delete) exitosamente',
             'data', (SELECT JSON_OBJECT(
                        'id', id,
                        'nombre', nombre,
                        'telefono', telefono,
                        'email', email,
                        'rol_id', rol_id,
                        'activo', activo,
                        'fecha_actualizacion', fecha_actualizacion
                      ) FROM usuario WHERE id = p_id)
           ) AS response;
END$$

-- sp_autenticar_usuario: Busca un usuario por correo (para autenticación) y retorna los campos requeridos en JSON
DROP PROCEDURE IF EXISTS sp_autenticar_usuario$$
CREATE PROCEDURE sp_autenticar_usuario (
    IN p_email VARCHAR(100)
)
BEGIN
    SELECT 
      id,
      nombre,
      telefono,
      email,
      contrasena,
      rol_id
    FROM usuario
    WHERE email = p_email
    LIMIT 1;
END$$

-- ---------------------------------------
-- Procedimientos para la tabla usuario_rol
-- ---------------------------------------
-- Nota: Tabla de relación entre usuario y roles

-- sp_crear_usuario_rol: Inserta una relación entre usuario y rol y retorna la relación en JSON
DROP PROCEDURE IF EXISTS sp_crear_usuario_rol$$
CREATE PROCEDURE sp_crear_usuario_rol (
    IN p_usuario_id INT,
    IN p_rol_id INT
)
BEGIN
    INSERT INTO usuario_rol (usuario_id, rol_id)
    VALUES (p_usuario_id, p_rol_id);

    SELECT JSON_OBJECT(
             'message', 'Relación usuario-rol creada exitosamente',
             'data', JSON_OBJECT('usuario_id', p_usuario_id, 'rol_id', p_rol_id)
           ) AS response;
END$$

-- sp_editar_usuario_rol: Actualiza la relación en usuario_rol y retorna la nueva relación en JSON
DROP PROCEDURE IF EXISTS sp_editar_usuario_rol$$
CREATE PROCEDURE sp_editar_usuario_rol (
    IN p_old_usuario_id INT,
    IN p_old_rol_id INT,
    IN p_new_usuario_id INT,
    IN p_new_rol_id INT
)
BEGIN
    UPDATE usuario_rol
    SET usuario_id = p_new_usuario_id,
        rol_id = p_new_rol_id
    WHERE usuario_id = p_old_usuario_id AND rol_id = p_old_rol_id;

    SELECT JSON_OBJECT(
             'message', 'Relación usuario-rol actualizada exitosamente',
             'data', JSON_OBJECT('usuario_id', p_new_usuario_id, 'rol_id', p_new_rol_id)
           ) AS response;
END$$

-- sp_visualizar_usuario_rol: Muestra todas las relaciones en usuario_rol en formato JSON
DROP PROCEDURE IF EXISTS sp_visualizar_usuario_rol$$
CREATE PROCEDURE sp_visualizar_usuario_rol ()
BEGIN
    SELECT JSON_OBJECT(
             'message', 'Relaciones usuario-rol',
             'data', (SELECT JSON_ARRAYAGG(JSON_OBJECT(
                        'usuario_id', usuario_id,
                        'rol_id', rol_id
                      )) FROM usuario_rol)
           ) AS response;
END$$

-- sp_visualizar_por_id_usuario_rol: Muestra la relación específica en usuario_rol en formato JSON
DROP PROCEDURE IF EXISTS sp_visualizar_por_id_usuario_rol$$
CREATE PROCEDURE sp_visualizar_por_id_usuario_rol (
    IN p_usuario_id INT,
    IN p_rol_id INT
)
BEGIN
    SELECT JSON_OBJECT(
             'message', 'Relación usuario-rol encontrada',
             'data', (SELECT JSON_OBJECT(
                        'usuario_id', usuario_id,
                        'rol_id', rol_id
                      ) FROM usuario_rol
                      WHERE usuario_id = p_usuario_id AND rol_id = p_rol_id)
           ) AS response;
END$$

-- sp_eliminar_usuario_rol: Elimina una relación de usuario_rol y retorna confirmación en JSON
DROP PROCEDURE IF EXISTS sp_eliminar_usuario_rol$$
CREATE PROCEDURE sp_eliminar_usuario_rol (
    IN p_usuario_id INT,
    IN p_rol_id INT
)
BEGIN
    DELETE FROM usuario_rol
    WHERE usuario_id = p_usuario_id AND rol_id = p_rol_id;

    SELECT JSON_OBJECT(
             'message', 'Relación usuario-rol eliminada exitosamente',
             'data', JSON_OBJECT('usuario_id', p_usuario_id, 'rol_id', p_rol_id)
           ) AS response;
END$$

-- ---------------------------------------
-- Procedimientos para la tabla compra
-- ---------------------------------------

-- sp_crear_compra: Inserta una nueva compra y retorna el registro insertado en JSON
DROP PROCEDURE IF EXISTS sp_crear_compra$$
CREATE PROCEDURE sp_crear_compra (
    IN p_tecnico_id INT,
    IN p_total DECIMAL(10,2)
)
BEGIN
    INSERT INTO compra (tecnico_id, total, activo)
    VALUES (p_tecnico_id, p_total, 1);

    SET @last_id = LAST_INSERT_ID();

    SELECT JSON_OBJECT(
             'message', 'Compra creada exitosamente',
             'data', (SELECT JSON_OBJECT(
                        'id', id,
                        'tecnico_id', tecnico_id,
                        'total', total,
                        'activo', activo
                      ) FROM compra WHERE id = @last_id)
           ) AS response;
END$$

-- sp_editar_compra: Actualiza una compra existente y retorna el registro actualizado en JSON
DROP PROCEDURE IF EXISTS sp_editar_compra$$
CREATE PROCEDURE sp_editar_compra (
    IN p_id INT,
    IN p_tecnico_id INT,
    IN p_total DECIMAL(10,2),
    IN p_activo TINYINT
)
BEGIN
    UPDATE compra
    SET tecnico_id = p_tecnico_id,
        total = p_total,
        activo = p_activo,
        fecha_actualizacion = CURRENT_TIMESTAMP
    WHERE id = p_id;

    SELECT JSON_OBJECT(
             'message', 'Compra actualizada exitosamente',
             'data', (SELECT JSON_OBJECT(
                        'id', id,
                        'tecnico_id', tecnico_id,
                        'total', total,
                        'activo', activo,
                        'fecha_actualizacion', fecha_actualizacion
                      ) FROM compra WHERE id = p_id)
           ) AS response;
END$$

-- sp_visualizar_compra: Muestra todas las compras activas en formato JSON
DROP PROCEDURE IF EXISTS sp_visualizar_compra$$
CREATE PROCEDURE sp_visualizar_compra ()
BEGIN
    SELECT JSON_OBJECT(
             'message', 'Compras activas',
             'data', (SELECT JSON_ARRAYAGG(JSON_OBJECT(
                        'id', id,
                        'tecnico_id', tecnico_id,
                        'total', total,
                        'activo', activo
                      )) FROM compra WHERE activo = 1)
           ) AS response;
END$$

-- sp_visualizar_por_id_compra: Muestra una compra por id en formato JSON
DROP PROCEDURE IF EXISTS sp_visualizar_por_id_compra$$
CREATE PROCEDURE sp_visualizar_por_id_compra (
    IN p_id INT
)
BEGIN
    SELECT JSON_OBJECT(
             'message', 'Compra encontrada',
             'data', (SELECT JSON_OBJECT(
                        'id', id,
                        'tecnico_id', tecnico_id,
                        'total', total,
                        'activo', activo
                      ) FROM compra WHERE id = p_id)
           ) AS response;
END$$

-- sp_eliminar_compra: Soft delete para compra y retorna el registro actualizado en JSON
DROP PROCEDURE IF EXISTS sp_eliminar_compra$$
CREATE PROCEDURE sp_eliminar_compra (
    IN p_id INT
)
BEGIN
    UPDATE compra
    SET activo = 0,
        fecha_actualizacion = CURRENT_TIMESTAMP
    WHERE id = p_id;

    SELECT JSON_OBJECT(
             'message', 'Compra eliminada (soft delete) exitosamente',
             'data', (SELECT JSON_OBJECT(
                        'id', id,
                        'tecnico_id', tecnico_id,
                        'total', total,
                        'activo', activo,
                        'fecha_actualizacion', fecha_actualizacion
                      ) FROM compra WHERE id = p_id)
           ) AS response;
END$$

-- ---------------------------------------
-- Procedimientos para la tabla compradetalle
-- ---------------------------------------

-- sp_crear_compradetalle: Inserta un detalle de compra y retorna el registro insertado en JSON
DROP PROCEDURE IF EXISTS sp_crear_compradetalle$$
CREATE PROCEDURE sp_crear_compradetalle (
    IN p_compra_id INT,
    IN p_componente VARCHAR(100),
    IN p_cantidad INT,
    IN p_precio DECIMAL(10,2)
)
BEGIN
    INSERT INTO compradetalle (compra_id, componente, cantidad, precio, activo)
    VALUES (p_compra_id, p_componente, p_cantidad, p_precio, 1);

    SET @last_id = LAST_INSERT_ID();

    SELECT JSON_OBJECT(
             'message', 'Detalle de compra creado exitosamente',
             'data', (SELECT JSON_OBJECT(
                        'id', id,
                        'compra_id', compra_id,
                        'componente', componente,
                        'cantidad', cantidad,
                        'precio', precio,
                        'activo', activo
                      ) FROM compradetalle WHERE id = @last_id)
           ) AS response;
END$$

-- sp_editar_compradetalle: Actualiza un registro en compradetalle y retorna el registro actualizado en JSON
DROP PROCEDURE IF EXISTS sp_editar_compradetalle$$
CREATE PROCEDURE sp_editar_compradetalle (
    IN p_id INT,
    IN p_compra_id INT,
    IN p_componente VARCHAR(100),
    IN p_cantidad INT,
    IN p_precio DECIMAL(10,2),
    IN p_activo TINYINT
)
BEGIN
    UPDATE compradetalle
    SET compra_id = p_compra_id,
        componente = p_componente,
        cantidad = p_cantidad,
        precio = p_precio,
        activo = p_activo,
        fecha_actualizacion = CURRENT_TIMESTAMP
    WHERE id = p_id;

    SELECT JSON_OBJECT(
             'message', 'Detalle de compra actualizado exitosamente',
             'data', (SELECT JSON_OBJECT(
                        'id', id,
                        'compra_id', compra_id,
                        'componente', componente,
                        'cantidad', cantidad,
                        'precio', precio,
                        'activo', activo,
                        'fecha_actualizacion', fecha_actualizacion
                      ) FROM compradetalle WHERE id = p_id)
           ) AS response;
END$$

-- sp_visualizar_compradetalle: Muestra todos los detalles de compra activos en formato JSON
DROP PROCEDURE IF EXISTS sp_visualizar_compradetalle$$
CREATE PROCEDURE sp_visualizar_compradetalle ()
BEGIN
    SELECT JSON_OBJECT(
             'message', 'Detalles de compra activos',
             'data', (SELECT JSON_ARRAYAGG(JSON_OBJECT(
                        'id', id,
                        'compra_id', compra_id,
                        'componente', componente,
                        'cantidad', cantidad,
                        'precio', precio,
                        'activo', activo
                      )) FROM compradetalle WHERE activo = 1)
           ) AS response;
END$$

-- sp_visualizar_por_id_compradetalle: Muestra un detalle de compra por id en formato JSON
DROP PROCEDURE IF EXISTS sp_visualizar_por_id_compradetalle$$
CREATE PROCEDURE sp_visualizar_por_id_compradetalle (
    IN p_id INT
)
BEGIN
    SELECT JSON_OBJECT(
             'message', 'Detalle de compra encontrado',
             'data', (SELECT JSON_OBJECT(
                        'id', id,
                        'compra_id', compra_id,
                        'componente', componente,
                        'cantidad', cantidad,
                        'precio', precio,
                        'activo', activo
                      ) FROM compradetalle WHERE id = p_id)
           ) AS response;
END$$

-- sp_eliminar_compradetalle: Soft delete en compradetalle y retorna el registro actualizado en JSON
DROP PROCEDURE IF EXISTS sp_eliminar_compradetalle$$
CREATE PROCEDURE sp_eliminar_compradetalle (
    IN p_id INT
)
BEGIN
    UPDATE compradetalle
    SET activo = 0,
        fecha_actualizacion = CURRENT_TIMESTAMP
    WHERE id = p_id;

    SELECT JSON_OBJECT(
             'message', 'Detalle de compra eliminado (soft delete) exitosamente',
             'data', (SELECT JSON_OBJECT(
                        'id', id,
                        'compra_id', compra_id,
                        'componente', componente,
                        'cantidad', cantidad,
                        'precio', precio,
                        'activo', activo,
                        'fecha_actualizacion', fecha_actualizacion
                      ) FROM compradetalle WHERE id = p_id)
           ) AS response;
END$$

-- ---------------------------------------
-- Procedimientos para la tabla ticket
-- ---------------------------------------

-- sp_crear_ticket: Inserta un nuevo ticket y retorna el registro insertado en JSON
DROP PROCEDURE IF EXISTS sp_crear_ticket$$
CREATE PROCEDURE sp_crear_ticket (
    IN p_titulo VARCHAR(100),
    IN p_descripcion TEXT,
    IN p_estado ENUM('Nuevo','Asignado','Pre Atencion','En Proceso','Culminado'),
    IN p_prioridad ENUM('Alta','Media','Baja'),
    IN p_creador_id INT,
    IN p_compra_id INT,
    IN p_foto_ticket LONGBLOB,
    IN p_pdf_ticket LONGBLOB
)
BEGIN
    INSERT INTO ticket (titulo, descripcion, estado, prioridad, creador_id, compra_id, foto_ticket, pdf_ticket, activo)
    VALUES (p_titulo, p_descripcion, p_estado, p_prioridad, p_creador_id, p_compra_id, p_foto_ticket, p_pdf_ticket, 1);

    SET @last_id = LAST_INSERT_ID();

    SELECT JSON_OBJECT(
             'message', 'Ticket creado exitosamente',
             'data', (SELECT JSON_OBJECT(
                        'id', id,
                        'titulo', titulo,
                        'descripcion', descripcion,
                        'estado', estado,
                        'prioridad', prioridad,
                        'creador_id', creador_id,
                        'compra_id', compra_id,
                        'activo', activo
                      ) FROM ticket WHERE id = @last_id)
           ) AS response;
END$$

-- sp_editar_ticket: Actualiza un ticket existente y retorna el registro actualizado en JSON
DROP PROCEDURE IF EXISTS sp_editar_ticket$$
CREATE PROCEDURE sp_editar_ticket (
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
    UPDATE ticket
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

    SELECT JSON_OBJECT(
             'message', 'Ticket actualizado exitosamente',
             'data', (SELECT JSON_OBJECT(
                        'id', id,
                        'titulo', titulo,
                        'descripcion', descripcion,
                        'estado', estado,
                        'prioridad', prioridad,
                        'creador_id', creador_id,
                        'compra_id', compra_id,
                        'activo', activo,
                        'fecha_actualizacion', fecha_actualizacion
                      ) FROM ticket WHERE id = p_id)
           ) AS response;
END$$

-- sp_visualizar_ticket: Muestra todos los tickets activos en formato JSON
DROP PROCEDURE IF EXISTS sp_visualizar_ticket$$
CREATE PROCEDURE sp_visualizar_ticket ()
BEGIN
    SELECT JSON_OBJECT(
             'message', 'Tickets activos',
             'data', (SELECT JSON_ARRAYAGG(JSON_OBJECT(
                        'id', id,
                        'titulo', titulo,
                        'descripcion', descripcion,
                        'estado', estado,
                        'prioridad', prioridad,
                        'creador_id', creador_id,
                        'compra_id', compra_id,
                        'activo', activo
                      )) FROM ticket WHERE activo = 1)
           ) AS response;
END$$

-- sp_visualizar_por_id_ticket: Muestra un ticket por id en formato JSON
DROP PROCEDURE IF EXISTS sp_visualizar_por_id_ticket$$
CREATE PROCEDURE sp_visualizar_por_id_ticket (
    IN p_id INT
)
BEGIN
    SELECT JSON_OBJECT(
             'message', 'Ticket encontrado',
             'data', (SELECT JSON_OBJECT(
                        'id', id,
                        'titulo', titulo,
                        'descripcion', descripcion,
                        'estado', estado,
                        'prioridad', prioridad,
                        'creador_id', creador_id,
                        'compra_id', compra_id,
                        'activo', activo
                      ) FROM ticket WHERE id = p_id)
           ) AS response;
END$$

-- sp_eliminar_ticket: Soft delete, marca un ticket como inactivo y retorna el registro actualizado en JSON
DROP PROCEDURE IF EXISTS sp_eliminar_ticket$$
CREATE PROCEDURE sp_eliminar_ticket (
    IN p_id INT
)
BEGIN
    UPDATE ticket
    SET activo = 0,
        fecha_actualizacion = CURRENT_TIMESTAMP
    WHERE id = p_id;

    SELECT JSON_OBJECT(
             'message', 'Ticket eliminado (soft delete) exitosamente',
             'data', (SELECT JSON_OBJECT(
                        'id', id,
                        'titulo', titulo,
                        'descripcion', descripcion,
                        'estado', estado,
                        'prioridad', prioridad,
                        'creador_id', creador_id,
                        'compra_id', compra_id,
                        'activo', activo,
                        'fecha_actualizacion', fecha_actualizacion
                      ) FROM ticket WHERE id = p_id)
           ) AS response;
END$$

-- ---------------------------------------
-- Procedimientos para la tabla workspace
-- ---------------------------------------

-- sp_crear_workspace: Inserta un nuevo workspace y retorna el registro insertado en JSON
DROP PROCEDURE IF EXISTS sp_crear_workspace$$
CREATE PROCEDURE sp_crear_workspace (
    IN p_nombre VARCHAR(100),
    IN p_descripcion TEXT,
    IN p_created_by INT
)
BEGIN
    INSERT INTO workspace (nombre, descripcion, activo, created_by)
    VALUES (p_nombre, p_descripcion, 1, p_created_by);

    SET @last_id = LAST_INSERT_ID();

    SELECT JSON_OBJECT(
             'message', 'Workspace creado exitosamente',
             'data', (SELECT JSON_OBJECT(
                        'id_workspace', id_workspace,
                        'nombre', nombre,
                        'descripcion', descripcion,
                        'activo', activo
                      ) FROM workspace WHERE id_workspace = @last_id)
           ) AS response;
END$$


-- sp_editar_workspace: Editar un workspace y retorna el registro insertado en JSON
DROP PROCEDURE IF EXISTS sp_editar_workspace$$
CREATE PROCEDURE sp_editar_workspace(
    IN p_id_workspace INT,
    IN p_nombre VARCHAR(150),
    IN p_descripcion TEXT,
    IN p_icono LONGBLOB,
    IN p_invite_code TEXT,
    IN p_updated_by INT
)
BEGIN
    UPDATE Workspace
    SET 
        nombre       = p_nombre,
        descripcion  = p_descripcion,
        icono        = p_icono,
        invite_code  = p_invite_code,
        updated_by   = p_updated_by
    WHERE id_workspace = p_id_workspace;

    SELECT JSON_OBJECT(
      'message', 'Workspace actualizado exitosamente',
      'data', JSON_OBJECT(
          'id_workspace' , id_workspace,
          'nombre'       , nombre,
          'descripcion'  , descripcion,
          'icono'        , TO_BASE64(icono),
          'invite_code'  , invite_code,
          'activo'       , activo,
          'created_at'   , DATE_FORMAT(created_at, '%Y-%m-%d %H:%i:%s'),
          'created_by'   , created_by,
          'updated_at'   , DATE_FORMAT(updated_at, '%Y-%m-%d %H:%i:%s'),
          'updated_by'   , updated_by
      )
    ) AS response
    FROM Workspace
    WHERE id_workspace = p_id_workspace;
END$$


-- sp_eliminar_workspace: Eliminar un workspace de forma sencilla y reutilizable
CREATE PROCEDURE sp_eliminar_workspace(
    IN p_id_workspace INT,
    IN p_updated_by     INT
)
BEGIN
    UPDATE Workspace
    SET 
        activo     = 0,
        updated_by = p_updated_by
    WHERE id_workspace = p_id_workspace;

    SELECT JSON_OBJECT(
      'message', 'Workspace desactivado correctamente',
      'id_workspace', p_id_workspace
    ) AS response;
END$$


-- sp_visualizar_workspace: Visualizar todos los workspaces y subirlo como arreglo en JSON
DROP PROCEDURE IF EXISTS sp_visualizar_workspace$$
CREATE PROCEDURE sp_visualizar_workspace()
BEGIN
    SELECT JSON_OBJECT(
      'message', 'Listado de workspaces',
      'data', JSON_ARRAYAGG(
          JSON_OBJECT(
              'id_workspace' , id_workspace,
              'nombre'       , nombre,
              'descripcion'  , descripcion,
              'icono'        , TO_BASE64(icono),
              'invite_code'  , invite_code,
              'activo'       , activo,
              'created_at'   , DATE_FORMAT(created_at, '%Y-%m-%d %H:%i:%s'),
              'updated_at'   , DATE_FORMAT(updated_at, '%Y-%m-%d %H:%i:%s')
          )
      )
    ) AS response
    FROM Workspace;
END$$


-- sp_visualizar_por_id_workspace: Visualizar un workspace por id y subirlo como JSON
DROP PROCEDURE IF EXISTS sp_visualizar_por_id_workspace$$
CREATE PROCEDURE sp_visualizar_por_id_workspace(
    IN p_id_workspace INT
)
BEGIN
    SELECT JSON_OBJECT(
      'message', 'Workspace encontrado',
      'data', JSON_OBJECT(
          'id_workspace' , id_workspace,
          'nombre'       , nombre,
          'descripcion'  , descripcion,
          'icono'        , TO_BASE64(icono),
          'invite_code'  , invite_code,
          'activo'       , activo,
          'created_at'   , DATE_FORMAT(created_at, '%Y-%m-%d %H:%i:%s'),
          'created_by'   , created_by,
          'updated_at'   , DATE_FORMAT(updated_at, '%Y-%m-%d %H:%i:%s'),
          'updated_by'   , updated_by
      )
    ) AS response
    FROM Workspace
    WHERE id_workspace = p_id_workspace;
END$$


DELIMITER ;
