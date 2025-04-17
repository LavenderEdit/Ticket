<!-- Top bar con redes y contacto -->
<div class="top-bar py-2 px-4 bg-white text-primary d-flex justify-content-between align-items-center small">
    <div>
        <a href="#" class="text-primary me-3"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="text-primary me-3"><i class="fab fa-twitter"></i></a>
        <a href="#" class="text-primary me-3"><i class="fab fa-google"></i></a>
        <a href="#" class="text-primary"><i class="fab fa-instagram"></i></a>
    </div>
    <div>
        <i class="fas fa-phone-alt me-1"></i> 994 601 170 /
        <a href="mailto:info@jhardsystex.com" class="text-primary text-decoration-none ms-2">
            <i class="fas fa-envelope me-1"></i>info@jhardsystex.com
        </a>
    </div>
</div>

<!-- Navbar principal -->
<nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center text-white" href="#">
            <div>
                <strong>JHARDSYSTEX</strong><br>
                <small class="text-light">SOLUCIONES ESPECIALIZADAS TI</small>
            </div>
        </a>

        <!-- Botón hamburguesa -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menú -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active fw-bold text-white" href="#">INICIO</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">SERVICIO HOGAR</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Instalaciones</a></li>
                        <li><a class="dropdown-item" href="#">Soporte</a></li>
                    </ul>
                </li>
                <?php if (isset($_SESSION['usuario'])): ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="./views/dashboard.php">
                            <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <button id="btnLogout" class="nav-link btn btn-link text-white">
                            <i class="fas fa-sign-out-alt me-1"></i>Cerrar Sesión
                        </button>
                    </li>
                <?php else: ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">PORTAL CLIENTE</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="./views/auth/login.php">
                                    <i class="fas fa-headset me-1"></i>Soporte Técnico - Técnico
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a class="nav-link text-white" href="#">CONTÁCTENOS</a>
                </li>
            </ul>
        </div>
    </div>
</nav>