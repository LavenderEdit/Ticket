<?php include_once __DIR__ . '/../../includes/header.php'; ?>
<!-- LOGIN -->
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="row w-100" style="max-width: 1200px; height: 90vh;">
        <!-- Sección izquierda: Formulario centrado -->
        <div style="height: 100vh;" class="d-flex justify-content-center align-items-center">
    <div class="text-center">
        <img src="./images/logos/icon-logo.webp" alt="logo" class="mb-4" style="max-width: 180px;">

        <form id="formLogin" style="width: 300px;">
            <div class="mb-3 text-start">
                <label for="correo" class="form-label">
                    <i class="me-2 fa-solid fa-user"></i>Usuario
                </label>
                <input type="email" class="form-control" id="correo" name="correo" placeholder="Usuario" required>
            </div>

            <div class="mb-3 text-start">
                <label for="contra" class="form-label">
                    <i class="me-2 fa-solid fa-lock"></i>Contraseña
                </label>
                <div class="input-group">
                    <input type="password" class="form-control" id="contra" name="contra" placeholder="Contraseña"
                        minlength="8" maxlength="16" required>
                    <button type="button" class="btn btn-outline-secondary toggle-password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="rounded-pill text-white btn btn-primary">
                    Iniciar Sesión
                </button>
            </div>

            <div>
                <a href="#" class="text-decoration-none">¿Olvidó su contraseña?</a>
            </div>
        </form>
    </div>
</div>


        <!-- Sección derecha -->
        <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center" id="opacidad-azul">
            <div id="robot-container">
                <img src="./images/iconos/icon-robot.webp" alt="Robot Icon" id="robot-image" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../../includes/scripts.php'; ?>