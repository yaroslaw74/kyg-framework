import { clearNavDropdown } from "./clearNavDropdown.js";
import { toggleSidemenu } from "./toggleSidemenu.js";

export function iconHoverFn() {
    const HTML = document.querySelector("html");
    HTML.setAttribute("data-nav-style", "icon-hover");
    toggleSidemenu();
    clearNavDropdown();
}
