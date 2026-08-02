import { toggleSidemenu } from "./toggleSidemenu.js";

export function closedSidemenuFn() {
    const HTML = document.querySelector("html");
    HTML.setAttribute("data-nav-layout", "vertical");
    HTML.setAttribute("data-vertical-style", "closed");
    toggleSidemenu();
}
