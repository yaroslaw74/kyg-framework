import { toggleSidemenu } from "./toggleSidemenu.js";
import { clearNavDropdown } from "./clearNavDropdown.js";

export function menuhoverFn() {
    const HTML = document.querySelector("html");
    HTML.setAttribute("data-nav-style", "menu-hover");
    HTML.removeAttribute("data-hor-style");
    HTML.removeAttribute("data-vertical-style");
    toggleSidemenu();
    if (HTML.getAttribute("data-toggled") === "menu-hover-closed") {
        clearNavDropdown();
    }
}
