<!-- Sidebar -->
<div id="app-sidebar" class="collapse show vh-100 position-fixed d-flex flex-column sidebar-custom">

    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between px-4 py-3 border-bottom border-primary position-relative">
        <a href="./index.php" class="text-white text-decoration-none d-flex align-items-center">
            <i class="fas fa-store fa-lg me-2"></i>
            <span class="h5 mb-0 fw-bold">JhardSystex</span>
        </a>

        <!-- Hamburguesa flotante al costado del logo -->
        <button id="sidebarToggle" class="btn btn-light position-absolute top-0 end-0 translate-middle-y mt-3 me-n4">
            <i class="fas fa-bars text-dark"></i>
        </button>
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