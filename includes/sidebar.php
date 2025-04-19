<!-- Sidebar -->
<div id="app-sidebar"
    class="collapse show bg-primary text-white vh-100 position-fixed d-flex flex-column sidebar-custom">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between px-4 py-3 border-bottom border-primary">
        <a href="./index.php" class="text-white text-decoration-none d-flex align-items-center">
            <i class="fas fa-store fa-lg me-2"></i>
            <span class="h5 mb-0 fw-bold">JhardSystex</span>
        </a>
        <button class="btn btn-primary p-0" type="button" data-bs-toggle="collapse" data-bs-target="#app-sidebar"
            aria-controls="app-sidebar" aria-expanded="true">
            <i class="fas fa-angle-double-left"></i>
        </button>
    </div>

    <!-- Nav -->
    <nav class="nav nav-pills flex-column mt-4">
        <a href="#" class="nav-link active" data-page="dashboard">
            <i class="fas fa-home me-2"></i>
            Dashboard
        </a>
        <a href="#" class="nav-link" data-page="tickets">
            <i class="fas fa-check me-2"></i>
            Mis Tickets
        </a>
        <a href="#" class="nav-link" data-page="configuracion">
            <i class="fas fa-cog me-2"></i>
            Configuración
        </a>
    </nav>
</div>

<!-- Expander -->
<button id="sidebar-expander" class="btn btn-primary position-fixed" style="top: 1rem; left: 250px;" type="button"
    data-bs-toggle="collapse" data-bs-target="#app-sidebar" aria-controls="app-sidebar" aria-expanded="false">
    <i class="fas fa-angle-double-right"></i>
</button>