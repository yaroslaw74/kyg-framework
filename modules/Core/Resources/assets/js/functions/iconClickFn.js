import { setNavActive } from "./setNavActive.js";
import { toggleSidemenu } from "./toggleSidemenu.js";

export function iconClickFn() {
    const HTML = document.querySelector("html");
    HTML.setAttribute("data-nav-style", "icon-click");
    toggleSidemenu();
    if (HTML.getAttribute("data-nav-layout") === "vertical") {
        setNavActive();
    }
}
