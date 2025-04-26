import { initSidebar } from "./lib/sidebar/main-sidebar.js?v=3";
import { initSidebarFeatures } from "./lib/sidebar/sidebar-features.js";
import { initRegisterForm } from "./views/register.js?v=3";
import { initLoginForm } from "./views/login.js?v=4";
import { initLogoutButton } from "./views/index.js?v=2";

export function runComponentRegistry() {
  const path = window.location.pathname;
  const pageName = path.substring(path.lastIndexOf("/") + 1);

  switch (pageName) {
    case "index.php":
      initLogoutButton();
      break;
    case "login.php":
      initLoginForm();
      break;
    case "register.php":
      initRegisterForm();
      break;
    case "dashboard.php":
      initSidebar();
      initSidebarFeatures();
      break;
    default:
      initLogoutButton();
      break;
  }
}
