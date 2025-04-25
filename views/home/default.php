<div id="selector-content" class="container-fluid py-4">
    <div class="row gx-3 gy-3 mb-4 text-center">
        <div class="col-sm">
            <small class="text-muted">
                total de tickets <i class="fas fa-chevron-down text-danger"></i>
            </small>
            <h4 class="mt-1 mb-0">0</h4>
        </div>
        <div class="col-sm">
            <small class="text-muted">
                total de Asignados <i class="fas fa-chevron-up text-success"></i>
            </small>
            <h4 class="mt-1 mb-0">10</h4>
        </div>
        <div class="col-sm">
            <small class="text-muted">
                tickets Completados <i class="fas fa-chevron-down text-danger"></i>
            </small>
            <h4 class="mt-1 mb-0">0</h4>
        </div>
        <div class="col-sm">
            <small class="text-muted">
                tickets atrasados <i class="fas fa-chevron-down text-danger"></i>
            </small>
            <h4 class="mt-1 mb-0">0</h4>
        </div>
        <div class="col-sm">
            <small class="text-muted">
                tickets incompletos <i class="fas fa-chevron-down text-danger"></i>
            </small>
            <h4 class="mt-1 mb-0">0</h4>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg-3 mb-4">
            <div class="list-group">
                <button type="button"
                    class="list-group-item list-group-item-action active d-flex justify-content-between align-items-center"
                    data-content="tickets">
                    Tickets <i class="fas fa-chevron-left"></i>
                </button>
                <button type="button"
                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                    data-content="proyectos">
                    Proyectos <i class="fas fa-chevron-right"></i>
                </button>
                <button type="button"
                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                    data-content="miembros">
                    Miembros <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <div class="col-lg-9 card-content">
            <div id="main-card" class="card">
                <!-- Carga de las tarjetas con contenido dinamico inyectado dentro del contenido dinamico -->
            </div>
        </div>
    </div>
</div>