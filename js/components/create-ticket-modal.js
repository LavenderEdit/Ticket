import { openModal } from "./modal-manager.js";

/**
 * Abre un modal para crear un nuevo ticket.
 *
 * @param {object} options
 * @param {Function} [options.onSubmit]
 */
export function openCreateTicketModal(options = {}) {
    const { onSubmit = () => { } } = options;

    const modalHtml = `
    <div class="modal fade" id="createTicketModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div 
            class="modal-header border-bottom border-3" 
            style="border-color: #1D5AB3;"
          >
            <h5 class="modal-title">Crear un nuevo ticket</h5>
            <button 
              type="button" 
              class="btn-close" 
              data-bs-dismiss="modal" 
              aria-label="Cerrar"
            ></button>
          </div>
          <form id="createTicketForm">
            <div class="modal-body">
              <div class="row g-3">
                <!-- Importancia (select) -->
                <div class="col-12 col-md-6">
                  <label for="ticketImportance" class="form-label">Importancia</label>
                  <select id="ticketImportance" class="form-select" required>
                    <option value="" disabled selected>Seleccione importancia</option>
                    <option value="importante">Importante</option>
                    <option value="primario">Primario</option>
                    <option value="secundario">Secundario</option>
                  </select>
                </div>

                <!-- Técnico (select) -->
                <div class="col-12 col-md-6">
                  <label for="ticketTechnician" class="form-label">Técnico</label>
                  <select id="ticketTechnician" class="form-select" required>
                    <option value="" disabled selected>Seleccione técnico</option>
                    <!-- <option value="id1">Nombre Técnico 1</option> -->
                  </select>
                </div>

                <!-- Fecha de Atención (date) -->
                <div class="col-12 col-md-4">
                  <label for="ticketDate" class="form-label">Fecha de Atención</label>
                  <input 
                    type="date" 
                    id="ticketDate" 
                    class="form-control" 
                    required
                  >
                </div>

                <!-- Tiempo (select) -->
                <div class="col-12 col-md-4">
                  <label for="ticketTime" class="form-label">Tiempo</label>
                  <select id="ticketTime" class="form-select" required>
                    <option value="" disabled selected>Seleccione tiempo</option>
                    <option value="mañana">Mañana</option>
                    <option value="tarde">Tarde</option>
                    <option value="noche">Noche</option>
                  </select>
                </div>

                <!-- Estados (select) -->
                <div class="col-12 col-md-4">
                  <label for="ticketStatus" class="form-label">Estados</label>
                  <select id="ticketStatus" class="form-select" required>
                    <option value="" disabled selected>Seleccione estado</option>
                    <option value="null">Null</option>
                    <option value="asignado">Asignado</option>
                    <option value="pre-atencion">Pre Atención</option>
                    <option value="pre-proceso">Pre Proceso</option>
                    <option value="completado">Completado</option>
                  </select>
                </div>

                <!-- Comentario (textarea) -->
                <div class="col-12">
                  <label for="ticketComment" class="form-label">Comentario</label>
                  <textarea 
                    id="ticketComment" 
                    class="form-control" 
                    rows="4" 
                    placeholder="Escribe tu comentario..."
                  ></textarea>
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button 
                type="button" 
                class="btn btn-secondary" 
                data-bs-dismiss="modal"
              >
                Cancelar
              </button>
              <button 
                type="submit" 
                class="btn btn-primary"
                style="background-color: #1D5AB3; border-color: #1D5AB3;"
              >
                Crear
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  `;

    const modalInstance = openModal(modalHtml, { backdrop: 'static' });

    const form = document.getElementById("createTicketForm");
    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const data = {
            importancia: document.getElementById("ticketImportance").value,
            tecnico: document.getElementById("ticketTechnician").value,
            fecha: document.getElementById("ticketDate").value,
            tiempo: document.getElementById("ticketTime").value,
            estado: document.getElementById("ticketStatus").value,
            comentario: document.getElementById("ticketComment").value.trim(),
        };

        onSubmit(data);

        modalInstance.hide();
    });

    return modalInstance;
}
