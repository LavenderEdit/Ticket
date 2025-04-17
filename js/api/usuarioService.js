import { apiRequest } from './apiRequest.js?v=2';

export function registrarUsuario(data) {
    // Por ejemplo: data = { nombre, telefono, email, fecha_logeo, contrasena, id_rol }
    return apiRequest('usuario', 'post', 'POST', data);
}
