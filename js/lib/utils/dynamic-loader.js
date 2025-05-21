import { initCard } from "../card/main-card.js";
import { openCreateTicketModal } from "../../components/create-ticket-modal.js";
import { Ticket } from "../../views/dashboard.js?v=1";

const pageCallbacks = {
  dashboard: () => {
    initCard();
  },
  tickets: () => {
    window.openCreateTicketModal = openCreateTicketModal;
    Ticket.getAll();
  },
};

export function loadPageContent(page) {
  let file = "";

  switch (page) {
    case "dashboard":
      file = "views/home/default.php";
      break;
    case "tickets":
      file = "views/tickets/tickets.php";
      break;
    case "configuracion":
      file = "views/config/config.php";
      break;
    default:
      file = "views/error/404.php";
      break;
  }

  fetch(file)
    .then((response) => {
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }
      return response.text();
    })
    .then((html) => {
      document.querySelectorAll(".modal").forEach((modal) => modal.remove());

      const content = document.getElementById("main-content");
      if (content) {
        content.innerHTML = html;
        if (pageCallbacks[page]) {
          pageCallbacks[page]();
        }
      }
    })
    .catch((err) => {
      console.error("Error al cargar contenido:", err);
      const content = document.getElementById("main-content");
      if (content) {
        content.innerHTML = `<div class="alert alert-danger">No se pudo cargar la página <strong>${page}</strong>.</div>`;
      }
    });
}
