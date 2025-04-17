import { apiRequest } from './apiRequest.js?v=1';

export function logearUsuario(data) {
    return apiRequest('auth', 'login', 'POST', data);
}
