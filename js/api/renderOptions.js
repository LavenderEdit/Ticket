export function renderOptions(selectId, data, optionTemplateFn) {
  const select = document.getElementById(selectId);
  if (!select) {
    console.error(`No se encontró el select con id "${selectId}"`);
    return;
  }
  select.innerHTML = '<option value="" selected>Seleccione...</option>';

  data.forEach((item) => {
    select.insertAdjacentHTML("beforeend", optionTemplateFn(item));
  });
}
