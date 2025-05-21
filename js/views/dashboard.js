import { getAllTickets } from '../api/ticketService.js';

export const Ticket = {
    async getAll() {
        try {
            const tickets = await getAllTickets(); // Aquí ya tienes los datos

            const tableBody = document.getElementById('ticket-table-body');
            tableBody.innerHTML = '';

            tickets.forEach(ticket => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${ticket.titulo}</td>
                    <td>${ticket.creador_id}</td>
                    <td>${ticket.descripcion}</td>
                `;
                tableBody.appendChild(row);
            });
        } catch (error) {
            console.error('Error:', error);
            const tableBody = document.getElementById('ticket-table-body');
            tableBody.innerHTML = '<tr><td colspan="3">Error al cargar los tickets</td></tr>';
        }
    }
};
