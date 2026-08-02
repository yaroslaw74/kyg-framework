import { toggleSidemenu } from "./toggleSidemenu.js";

export function iconTextFn() {
    const HTML = document.querySelector("html");
    HTML.setAttribute("data-nav-layout", "vertical");
    HTML.setAttribute("data-vertical-style", "icontext");
    toggleSidemenu();
}
