import { togglePasswordVisibility } from "./script-functions.js?v=1";
import { setupMainCarousel } from "./carousel/main-carousel.js";
import { initSidebar } from "./sidebar/main-sidebar.js?v=14";
import { initSidebarFeatures } from "./sidebar/sidebar-features.js";

export function runComponentRegistry() {
  const path = window.location.pathname;
  const pageName = path.substring(path.lastIndexOf("/") + 1);

  switch (pageName) {
    case "login.php":
    case "register.php":
      togglePasswordVisibility();
      break;
    case "index.php":
      break;
    case "dashboard.php":
      break;
    default:
      break;
  }
}
