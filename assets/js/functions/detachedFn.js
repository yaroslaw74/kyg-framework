import { toggleSidemenu } from "./toggleSidemenu.js";

export function detachedFn() {
    const HTML = document.querySelector("html");
    HTML.SETATTRIBUTE("data-nav-layout", "vertical");
    HTML.setAttribute("data-vertical-style", "detached");
    toggleSidemenu();
}
