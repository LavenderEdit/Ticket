import { apiRequest } from './apiRequest.js?v=2';

export function logearUsuario(data) {
    return apiRequest('auth', 'login', 'POST', data);
}

export function deslogearUsuario() {
    return apiRequest('auth', 'logout', 'POST', null);
}
