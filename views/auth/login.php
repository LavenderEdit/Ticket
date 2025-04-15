<?php include_once __DIR__ . '/../../includes/header.php'; ?>

<!-- LOGIN -->
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="row w-100">
        <!-- Sección izquierda: Formulario -->
        <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center p-5">
            <div class="text-center mb-4">
                <img src="./images/logos/icon-logo.webp" alt="logo_keyfacil" class="img-fluid"
                    style="max-width: 180px;">
            </div>

            <form id="formLogin" class="w-75">
                <div class="mb-3">
                    <label for="correo" class="form-label">
                        <i class="fa-solid fa-user me-2"></i>Usuario
                    </label>
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Usuario" required>
                </div>

                <div class="mb-3">
                    <label for="contra" class="form-label">
                        <i class="fa-solid fa-lock me-2"></i>Contraseña
                    </label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="contra" name="contra" placeholder="Contraseña"
                            minlength="8" maxlength="16" pattern=".{8,16}" required>
                        <button class="btn btn-outline-secondary" type="button" id="btnMostrarContra">
                            <i class="fa-regular fa-eye" id="iconoOjoAbierto"></i>
                            <i class="fa-regular fa-eye-slash d-none" id="iconoOjoCerrado"></i>
                        </button>
                    </div>
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" style="background-color: rgba(39, 100, 184, 1);" class="btn rounded-pill text-w">Iniciar Sesión</button>
                </div>

                <div class="text-center">
                    <a href="#" class="text-decoration-none">¿Olvidó su contraseña?</a>
                </div>
            </form>
        </div>

        <!-- Sección derecha: Fondo azul con forma curva y robot -->
        <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center" id="opacidad-azul">
            <div id="robot-container">
                <img src="./images/iconos/icon-robot.webp" alt="Robot Icon" id="robot-image" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../../includes/scripts.php'; ?>