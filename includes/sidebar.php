<div id="app-sidebar" class="collapse collapse-horizontal show vh-100 position-fixed d-flex flex-column sidebar-custom">

    <div class="d-flex align-items-center justify-content-between  px-4 pt-4 w-100">
        <a href="./index.php" class="text-white d-flex align-items-center flex-grow-1 text-decoration-none">
            <i class="fas fa-ticket-alt fa-lg me-2 text-white"></i>
            <span class="fw-bold">JhardSystex</span>
        </a>

        <button class="btn p-0 ms-2 d-flex align-items-center" aria-label="Toggle sidebar" type="button"
            data-bs-toggle="collapse" data-bs-target="#app-sidebar" aria-controls="app-sidebar" aria-expanded="true">
            <i class="fas fa-bars text-white fs-5"></i>
        </button>
    </div>


    <nav class="nav flex-column mt-4 px-3">
        <a href="#" class="nav-link d-flex align-items-center mb-2 active" data-page="dashboard">
            <i class="fas fa-home me-3"></i><span>Dashboard</span>
        </a>
        <a href="#" class="nav-link d-flex align-items-center mb-2" data-page="tickets">
            <i class="fas fa-check me-3"></i><span>Mis Tickets</span>
        </a>
        <a href="#" class="nav-link d-flex align-items-center mb-2" data-page="configuracion">
            <i class="fas fa-cog me-3"></i><span>Configuración</span>
        </a>
    </nav>
</div>

<button id="sidebar-expander" class="btn position-fixed top-0 start-0 m-3" aria-label="Expandir sidebar" type="button"
    data-bs-toggle="collapse" data-bs-target="#app-sidebar" aria-controls="app-sidebar" aria-expanded="false">
    <i class="fas fa-bars text-white"></i>
</button>