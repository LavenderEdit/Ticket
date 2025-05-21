import { apiRequest } from './apiRequest.js?v=2';

export async function getAllTickets() {
    const response = await apiRequest('ticket', 'getAll', 'GET', null);
    
    const rawResponse = response[0]?.response;
    if (!rawResponse) throw new Error('Respuesta vacía');

    const parsedResponse = JSON.parse(rawResponse);
    return parsedResponse.data;
}
