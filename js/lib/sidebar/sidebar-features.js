export function initSidebarFeatures() {
  const sidebar = document.getElementById("app-sidebar");
  const sidebarExpander = document.getElementById("sidebar-expander");
  const mainContent = document.getElementById("main-content");

  if (!sidebar || !sidebarExpander || !mainContent) {
    console.error(
      "Elementos necesarios para las funcionalidades del sidebar no fueron encontrados."
    );
    return;
  }

  sidebar.addEventListener("hidden.bs.collapse", function () {
    sidebarExpander.style.display = "block";
    mainContent.style.marginLeft = "0";
  });

  sidebar.addEventListener("shown.bs.collapse", function () {
    sidebarExpander.style.display = "none";
    mainContent.style.marginLeft = "300px";
  });
}
