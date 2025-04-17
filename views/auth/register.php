<?php include_once __DIR__ . '/../../includes/header.php'; ?>
<!-- REGISTER -->
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="row w-100" style="max-width: 1200px; height: 90vh;">
        <!-- Sección izquierda: Formulario de Registro centrado -->
        <div class="col-lg-6 d-flex justify-content-center align-items-center">
            <div class="text-center">
                <img src="./images/logos/icon-logo.webp" alt="logo" class="mb-4" style="max-width: 180px;">
                <h2 class="mb-4">Registro de Usuario</h2>
                <form id="formRegister" style="width: 300px;">
                    <!-- Nombre -->
                    <div class="mb-3 text-start">
                        <label for="nombre" class="form-label">
                            <i class="me-2 fa-solid fa-user"></i>Nombre
                        </label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo"
                            required>
                    </div>
                    <!-- Teléfono -->
                    <div class="mb-3 text-start">
                        <label for="telefono" class="form-label">
                            <i class="me-2 fa-solid fa-phone"></i>Teléfono
                        </label>
                        <input type="text" class="form-control" id="telefono" name="telefono"
                            placeholder="Teléfono (opcional)">
                    </div>
                    <!-- Email -->
                    <div class="mb-3 text-start">
                        <label for="email" class="form-label">
                            <i class="me-2 fa-solid fa-envelope"></i>Email
                        </label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Correo electrónico" autocomplete="email" required>
                    </div>
                    <!-- Contraseña -->
                    <div class="mb-3 text-start">
                        <label for="contrasena" class="form-label">
                            <i class="me-2 fa-solid fa-lock"></i>Contraseña
                        </label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="contrasena" name="contrasena"
                                placeholder="Contraseña" minlength="8" maxlength="16" required>
                            <button type="button" class="btn btn-outline-secondary toggle-password">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Confirmar Contraseña (Opcional para validación en cliente) -->
                    <div class="mb-3 text-start">
                        <label for="contrasena_confirm" class="form-label">
                            <i class="me-2 fa-solid fa-lock"></i>Confirmar Contraseña
                        </label>
                        <input type="password" class="form-control" id="contrasena_confirm" name="contrasena_confirm"
                            placeholder="Repetir contraseña" minlength="8" maxlength="16" required>
                    </div>
                    <!-- Campo oculto para id_rol -->
                    <input type="hidden" id="id_rol" name="id_rol" value="2">
                    <!-- Botón para enviar el formulario -->
                    <div class="d-grid mb-3">
                        <button type="submit" class="rounded-pill text-white btn btn-primary">
                            Registrarse
                        </button>
                    </div>
                    <div class="text-center">
                        <a href="login.php" class="text-decoration-none">¿Ya tienes cuenta? Inicia Sesión</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- Sección derecha: Opcional para imagen o diseño complementario -->
        <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center" id="opacidad-azul">
            <div id="robot-container">
                <img src="./images/iconos/icon-robot.webp" alt="Robot Icon" id="robot-image" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../../includes/scripts.php'; ?>