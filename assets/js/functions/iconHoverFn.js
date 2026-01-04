import { toggleSidemenu } from "./toggleSidemenu.js";
import { clearNavDropdown } from "./clearNavDropdown.js";

export function iconHoverFn() {
    const HTML = document.querySelector("html");
    HTML.setAttribute("data-nav-style", "icon-hover");
    toggleSidemenu();
    clearNavDropdown();
}
