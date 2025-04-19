<!-- Sidebar -->
<div id="app-sidebar" class="collapse show vh-100 position-fixed d-flex flex-column sidebar-custom">

    <!-- Header con hamburguesa al lado del nombre -->
    <div class="d-flex align-items-center justify-content-between px-4 py-3 border-bottom border-primary">
        <div class="d-flex align-items-center">
            <i class="fas fa-store fa-lg me-2 text-white"></i>
            <span class="h5 mb-0 fw-bold text-white me-2">JhardSystex</span>

            <!-- Hamburguesa al lado del nombre -->
            <button id="sidebarToggle" class="btn p-0 m-0 ms-2 d-flex align-items-center">
                <i class="fas fa-bars text-white fs-5"></i>
            </button>
        </div>
    </div>

    <!-- Nav -->
    <nav class="nav flex-column mt-4 px-3">
        <a href="#" class="nav-link d-flex align-items-center mb-2 active" data-page="dashboard">
            <i class="fas fa-home me-3"></i>
            <span>Dashboard</span>
        </a>
        <a href="#" class="nav-link d-flex align-items-center mb-2" data-page="tickets">
            <i class="fas fa-check me-3"></i>
            <span>Mis Tickets</span>
        </a>
        <a href="#" class="nav-link d-flex align-items-center mb-2" data-page="configuracion">
            <i class="fas fa-cog me-3"></i>
            <span>Configuración</span>
        </a>
    </nav>
</div>