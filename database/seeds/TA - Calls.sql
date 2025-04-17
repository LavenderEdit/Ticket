CALL sp_visualizar_roles();
CALL sp_visualizar_permisos();
CALL sp_visualizar_rol_Permiso();

CALL sp_autenticar_usuario("juan.perez@example.com");

CALL sp_visualizar_usuario();
CALL sp_eliminar_usuario(4);

CALL sp_crear_usuario('Joan Lavender', null, 'joan.lavender@gmail.com', null, 'hashed_password', 2);

USE TICKETINGSYSTEMDB;