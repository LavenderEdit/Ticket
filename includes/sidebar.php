<!-- Sidebar -->
<div class="bg-dark text-white vh-100 position-fixed collapse collapse-horizontal show sidebar-custom" id="app-sidebar">
    <div class="p-3 border-bottom border-secondary d-flex align-items-center justify-content-between">
        <h5 class="mb-0 d-flex align-items-center">
            <a class="text-white" href="./index.php" style="text-decoration: none;">
                <i class="fas fa-store me-2"></i>
                <span class="fw-bold">JhardSystex</span>
            </a>
        </h5>
        <button class="btn btn-dark border-0" type="button" data-bs-toggle="collapse" data-bs-target="#app-sidebar"
            aria-controls="app-sidebar" aria-expanded="true">
            <i class="fas fa-angle-double-left"></i>
        </button>
    </div>

    <ul class="nav flex-column p-3 w-100">
        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white active bg-primary rounded" data-page="dashboard">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white" data-page="tickets">
                <i class="fas fa-shopping-cart me-2"></i> Tickets
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white" data-page="configuracion">
                <i class="fas fa-users me-2"></i> Configuración
            </a>
        </li>
    </ul>
</div>

<button id="sidebar-expander" class="btn btn-primary" type="button" data-bs-toggle="collapse"
    data-bs-target="#app-sidebar" aria-controls="app-sidebar" aria-expanded="false">
    <i class="fas fa-angle-double-right"></i>
</button>