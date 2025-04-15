<?php include_once __DIR__ . '/../../includes/header.php'; ?>

<!-- LOGIN -->
<div class="d-flex align-items-center justify-content-center bg-light container-fluid min-vh-100">
    <div class="w-100 row">
        <!-- Sección izquierda: Formulario -->
        <div class="d-flex flex-column align-items-center justify-content-center p-5 col-lg-6">
            <div class="mb-4 text-center">
                <img src="./images/logos/icon-logo.webp" alt="logo_keyfacil" class="img-fluid"
                    style="max-width: 180px;">
            </div>

            <form id="formLogin" class="w-75">
                <div class="mb-3">
                    <label for="correo" class="form-label">
                        <i class="me-2 fa-solid fa-user"></i>Usuario
                    </label>
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Usuario" required>
                </div>

                <div class="mb-3">
                    <label for="contra" class="form-label">
                        <i class="me-2 fa-solid fa-lock"></i>Contraseña
                    </label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="contra" name="contra" placeholder="Contraseña"
                            minlength="8" maxlength="16" pattern=".{8,16}" required>
                        <button type="button" class="btn-outline-secondary btn toggle-password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" style="background-color: rgba(39, 100, 184, 1);"
                        class="rounded-pill text-white btn">Iniciar Sesión</button>
                </div>

                <div class="text-center">
                    <a href="#" class="text-decoration-none">¿Olvidó su contraseña?</a>
                </div>
            </form>
        </div>

        <!-- Sección derecha: Fondo azul con forma curva y robot -->
        <div class="d-lg-flex align-items-center justify-content-center col-lg-6 d-none" id="opacidad-azul">
            <div id="robot-container">
                <img src="./images/iconos/icon-robot.webp" alt="Robot Icon" id="robot-image" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../../includes/scripts.php'; ?>