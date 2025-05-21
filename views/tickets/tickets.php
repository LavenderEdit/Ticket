<div class="container-fluid py-4">
    <!-- Navegación principal -->
    <div class="d-flex flex-wrap gap-2 mb-3">
        <button type="button" class="btn btn-light border border-secondary rounded-pill" onclick="openCreateTicketModal();">
            Crear Ticket
        </button>
    </div>

    <hr class="border-secondary my-4">

    <!-- Filtros secundarios -->
    <div class="d-flex flex-wrap gap-2 mb-4">
        <button type="button" class="btn btn-light border border-secondary rounded-pill d-flex align-items-center" onclick="loadTickets('tareas')">
            <i class="fas fa-list me-2"></i> Tareas
        </button>
        <button type="button" class="btn btn-light border border-secondary rounded-pill d-flex align-items-center" onclick="loadTickets('asignados')">
            <i class="fas fa-user me-2"></i> Asignados
        </button>
        <button type="button" class="btn btn-light border border-secondary rounded-pill d-flex align-items-center" onclick="loadTickets('proyectos')">
            <i class="fas fa-folder me-2"></i> Proyectos
        </button>
        <button type="button" class="btn btn-light border border-secondary rounded-pill d-flex align-items-center" onclick="loadTickets('fechas')">
            <i class="fas fa-calendar-alt me-2"></i> Fechas
        </button>
    </div>

    <!-- Tabla de tickets -->
    <div class="bg-light p-3 rounded">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Nombre del Ticket <i class="fas fa-sort ms-1"></i></th>
                        <th scope="col">Cliente <i class="fas fa-sort ms-1"></i></th>
                        <th scope="col">Detalle del Servicio <i class="fas fa-sort ms-1"></i></th>
                    </tr>
                </thead>
                <tbody id="ticket-table-body">
                    <!-- Los datos se cargarán aquí dinámicamente -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal para crear ticket -->
    <div class="modal fade" id="createTicketModal" tabindex="-1" aria-labelledby="createTicketModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTicketModalLabel">Crear Ticket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createTicketForm">
                        <div class="mb-3">
                            <label for="title" class="form-label">Nombre del Ticket</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="province" class="form-label">Provincia</label>
                            <input type="text" class="form-control" id="province" name="province" required>
                        </div>
                        <div class="mb-3">
                            <label for="department" class="form-label">Departamento</label>
                            <input type="text" class="form-control" id="department" name="department" required>
                        </div>
                        <div class="mb-3">
                            <label for="client" class="form-label">Cliente</label>
                            <input type="text" class="form-control" id="client" name="client" required>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Ubicación</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                        <div class="mb-3">
                            <label for="service_detail" class="form-label">Detalle del Servicio</label>
                            <textarea class="form-control" id="service_detail" name="service_detail" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>