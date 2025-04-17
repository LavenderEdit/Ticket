import { openModal } from "./modal-manager.js";

/**
 * Abre un modal de confirmación con título, mensaje y callbacks.
 * @param {object} options
 * @param {string} [options.title="Confirmación"]
 * @param {string} [options.message="¿Estás seguro de realizar esta acción?"]
 * @param {Function} [options.onConfirm=() => {}]
 * @param {Function} [options.onCancel=() => {}]
 */
export function openConfirmModal(options = {}) {
    const {
        title = "Confirmación",
        message = "¿Estás seguro de realizar esta acción?",
        onConfirm = () => { },
        onCancel = () => { }
    } = options;

    const modalHtml = `
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">${title}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body">
            <p>${message}</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="confirmBtn">Confirmar</button>
          </div>
        </div>
      </div>
    </div>`;

    const modalInstance = openModal(modalHtml);

    const modalElement = document.getElementById("confirmModal");

    modalElement.querySelector("#confirmBtn").addEventListener("click", () => {
        onConfirm();
        modalInstance.hide();
    });

    modalElement.addEventListener("hidden.bs.modal", () => {
        onCancel();
    });

    return modalInstance;
}
