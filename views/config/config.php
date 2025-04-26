<div class="container-fluid py-4">

    <!-- Invitación -->
    <div class="row align-items-center mb-4">
        <div class="col-md-3">
            <h5 class="mb-0">Noemi Ramos</h5>
        </div>
        <div class="col-md-9">
            <div class="d-flex align-items-center">
                <label for="inviteCode" class="form-label mb-0 me-2">Código de Invitación:</label>
                <div class="input-group">
                    <input id="inviteCode" type="text" class="form-control" readonly
                        value="https://dashboard-syr.vercel.app/workspaces/675b1b7f0001" />
                    <button class="btn btn-outline-secondary" type="button" aria-label="Copiar enlace">
                        <i class="fas fa-copy"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <!-- Sección WorkSpace -->
    <section class="mb-5">
        <h5 class="mb-3">WorkSpace:</h5>
        <form class="row g-4 align-items-center">
            <div class="col-md-4">
                <label for="wsName" class="form-label">Nombre del workspace</label>
                <input id="wsName" type="text" class="form-control" placeholder="Soporte y Mantenimiento" />
            </div>

            <div class="col-md-4 text-center">
                <label class="form-label d-block mb-2">Icono del workspace</label>
                <div class="d-inline-block border rounded p-3 mb-2">
                    <i class="fas fa-image fa-2x text-secondary"></i>
                </div>
                <div>
                    <button type="button" class="btn btn-primary">Editar</button>
                </div>
                <small class="text-muted d-block mt-1">
                    JPG, PNG, SVG or JPEG, max 1 MB
                </small>
            </div>

            <div class="col-md-4 text-center">
                <label class="form-label text-danger d-block mb-2">Eliminar workspace</label>
                <button type="button" class="btn btn-danger">Eliminar</button>
                <small class="text-muted d-block mt-1">
                    Eliminar este workspace es irreversible y eliminará todos los
                    proyectos y tareas asociados.
                </small>
            </div>
        </form>
    </section>

    <hr>

    <section>
        <h5 class="mb-3">Lista de usuario WorkSpace:</h5>
        <div class="bg-light p-3 rounded">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Usuarios</th>
                            <th scope="col">Correo</th>
                            <th scope="col" class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="d-flex align-items-center">
                                <div class="rounded-circle bg-secondary text-white d-flex
                         justify-content-center align-items-center me-3" style="width:40px; height:40px;">
                                    A
                                </div>
                                Alexander :V
                            </td>
                            <td class="text-truncate" style="max-width:200px;">
                                alexpp223@gmail.com
                            </td>
                            <td class="text-end">
                                <button class="btn btn-primary me-2">Actualizar</button>
                                <button class="btn btn-danger">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="d-flex align-items-center">
                                <div class="rounded-circle bg-secondary text-white d-flex
                         justify-content-center align-items-center me-3" style="width:40px; height:40px;">
                                    UN
                                </div>
                                UserName :v
                            </td>
                            <td class="text-truncate" style="max-width:200px;">
                                Example02@gmail.com
                            </td>
                            <td class="text-end">
                                <button class="btn btn-primary me-2">Actualizar</button>
                                <button class="btn btn-danger">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>