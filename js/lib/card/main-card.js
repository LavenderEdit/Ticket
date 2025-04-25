import { cardConfig } from "./card-config.js";
import { loadCardContent } from "../utils/card-loader.js?v=1";

export function initCard() {
    const { selectorId } = cardConfig;
    const selector = document.getElementById(selectorId);

    if (!selector) {
        console.error("Elementos del card no encontrados");
        return;
    }

    const cardLinks = selector.querySelectorAll("[data-content]");
    cardLinks.forEach((link) => {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            const content = this.getAttribute("data-content");

            loadCardContent(content);

            cardLinks.forEach((l) => l.classList.remove("active", "bg-primary"));
            this.classList.add("active", "bg-primary");
        });
    });

    loadCardContent("tickets");
}