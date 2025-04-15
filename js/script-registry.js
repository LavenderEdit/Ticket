import { togglePasswordVisibility } from "./script-functions.js";
import { initSidebar } from "./sidebar/main-sidebar.js";
import { initSidebarFeatures } from "./sidebar/sidebar-features.js";

export function runComponentRegistry() {
  const path = window.location.pathname;
  const pageName = path.substring(path.lastIndexOf("/") + 1);

  switch (pageName) {
    case "login.php":
    case "register.php":
      togglePasswordVisibility();
      break;
    default:
      break;
  }
}
