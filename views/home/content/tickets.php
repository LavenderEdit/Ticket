<div class="card-header bg-light">
    <h5 class="mb-0">Descripcion General:</h5>
</div>
<div class="card-body p-0">
    <div class="accordion accordion-flush" id="ticketAccordion">
        <!-- ITEM 1: Abierto -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Test del cel editado
                    <span class="text-muted ms-2">− FALABELLA</span>
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                data-bs-parent="#ticketAccordion">
                <div class="accordion-body">
                    <form class="row gy-3">
                        <div class="col-md-4">
                            <label for="nombre-a" class="form-label">Asignado</label>
                            <select id="nombre-a" class="form-select">
                                <option selected>Noemi</option>
                                <!-- …más opciones… -->
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fecha</label>
                            <p class="form-control-plaintext text-danger mb-0">December 20th, 2024</p>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Status</label>
                            <span class="badge bg-danger">Reservado</span>
                        </div>
                        <div class="col-12">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea id="descripcion" class="form-control" rows="5"
                                placeholder="Escribe aquí la descripción…"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ITEM 2: Cerrado -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    test production
                    <span class="text-muted ms-2">− FALABELLA</span>
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#ticketAccordion">
                <div class="accordion-body">
                    <!-- Aquí podrías repetir formulario o un resumen ligero -->
                    <p class="mb-0 text-muted">No hay más información.</p>
                </div>
            </div>
        </div>

        <!-- ITEM 3: Cerrado -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    INC_0000000017239edit
                    <span class="text-muted ms-2">− FALABELLA</span>
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                data-bs-parent="#ticketAccordion">
                <div class="accordion-body">
                    <p class="mb-0 text-muted">No hay más información.</p>
                </div>
            </div>
        </div>
    </div>
</div>