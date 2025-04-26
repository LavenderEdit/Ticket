<div class="container-fluid py-4">
    <!-- 1) Navegación principal: Tabla / Blog / Calendario -->
    <div class="d-flex flex-wrap gap-2 mb-3">
        <button type="button" class="btn btn-light border border-secondary rounded-pill">
            Tabla
        </button>
        <button type="button" class="btn btn-light border border-secondary rounded-pill">
            Blog
        </button>
        <button type="button" class="btn btn-light border border-secondary rounded-pill">
            Calendario
        </button>
    </div>

    <hr class="border-secondary my-4">

    <!-- 2) Filtros secundarios: Tareas, Asignados, Proyectos, Fechas -->
    <div class="d-flex flex-wrap gap-2 mb-4">
        <button type="button" class="btn btn-light border border-secondary rounded-pill d-flex align-items-center">
            <i class="fas fa-list me-2"></i> Tareas
        </button>
        <button type="button" class="btn btn-light border border-secondary rounded-pill d-flex align-items-center">
            <i class="fas fa-user me-2"></i> Asignados
        </button>
        <button type="button" class="btn btn-light border border-secondary rounded-pill d-flex align-items-center">
            <i class="fas fa-folder me-2"></i> Proyectos
        </button>
        <button type="button" class="btn btn-light border border-secondary rounded-pill d-flex align-items-center">
            <i class="fas fa-calendar-alt me-2"></i> Fechas
        </button>
    </div>

    <!-- 3) Tabla de tickets dentro de un contenedor gris -->
    <div class="bg-light p-3 rounded">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col">
                            Nombre del Ticket <i class="fas fa-sort ms-1"></i>
                        </th>
                        <th scope="col">
                            Provincia <i class="fas fa-sort ms-1"></i>
                        </th>
                        <th scope="col">
                            Departamento <i class="fas fa-sort ms-1"></i>
                        </th>
                        <th scope="col">
                            Cliente <i class="fas fa-sort ms-1"></i>
                        </th>
                        <th scope="col">
                            Ubicación <i class="fas fa-sort ms-1"></i>
                        </th>
                        <th scope="col">
                            Detalle del Servicio <i class="fas fa-sort ms-1"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Test del cel editado</td>
                        <td>AREQUIPA</td>
                        <td>AREQUIPA</td>
                        <td>BANCO_FALABELLA</td>
                        <td>Jr dos decmato edit</td>
                        <td>Micro edit</td>
                    </tr>
                    <tr>
                        <td>test production</td>
                        <td>HUANCAYO</td>
                        <td>AREQUIPA</td>
                        <td>SAGA_FALABELLA</td>
                        <td>jr dos de mayo 12…</td>
                        <td>formateo</td>
                    </tr>
                    <tr>
                        <td>INC_0000000017239edit</td>
                        <td>HUANUCO</td>
                        <td>HUANUCO</td>
                        <td>HIPERBODEGA</td>
                        <td>jr dos de mayo 12…</td>
                        <td>formateo</td>
                    </tr>
                    <tr>
                        <td>INC_0000000017239test2</td>
                        <td>AREQUIPA</td>
                        <td>AREQUIPA</td>
                        <td>HIPERBODEGA</td>
                        <td>jr dos de mayo 12…</td>
                        <td>formateo</td>
                    </tr>
                    <tr>
                        <td>INC_0000000017239test</td>
                        <td>CAJAMARCA</td>
                        <td>AREQUIPA</td>
                        <td>HIPERBODEGA</td>
                        <td>jr dos de mayo 12…</td>
                        <td>formateo</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>