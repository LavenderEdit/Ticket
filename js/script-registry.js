import { togglePasswordVisibility } from "./lib/utils/script-functions.js";
import { initSidebar } from "./lib/sidebar/main-sidebar.js";
import { initSidebarFeatures } from "./lib/sidebar/sidebar-features.js";

export function runComponentRegistry() {
  const path = window.location.pathname;
  const pageName = path.substring(path.lastIndexOf("/") + 1);

  switch (pageName) {
    case "login.php":
    case "register.php":
      togglePasswordVisibility();
      break;
    case "dashboard.php":
      initSidebar();
      initSidebarFeatures();
      break;
    default:
      break;
  }
}
