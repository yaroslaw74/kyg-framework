import { toggleSidemenu } from "./toggleSidemenu.js";
import { setNavActive } from "./setNavActive.js";

export function iconOverayFn() {
    const HTML = document.querySelector("html");
    HTML.setAttribute("data-nav-layout", "vertical");
    HTML.setAttribute("data-vertical-style", "overlay");
    toggleSidemenu();
    setNavActive();
}
