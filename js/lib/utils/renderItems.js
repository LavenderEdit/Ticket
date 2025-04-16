export function renderItems(options) {
  const {
    containerId,
    data,
    emptyMessage = "No se encontraron elementos.",
    templateFn,
  } = options;

  const container = document.getElementById(containerId);
  if (!container) {
    console.error(`No se encontró el contenedor con id "${containerId}"`);
    return;
  }

  container.innerHTML = "";

  if (!Array.isArray(data) || data.length === 0) {
    container.innerHTML = `<li class="list-group-item bg-dark text-white">${emptyMessage}</li>`;
    return;
  }

  data.forEach((item) => {
    container.insertAdjacentHTML("beforeend", templateFn(item));
  });
}
