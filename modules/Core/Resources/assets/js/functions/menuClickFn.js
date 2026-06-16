import { setNavActive } from "./setNavActive.js";
import { toggleSidemenu } from "./toggleSidemenu.js";

export function menuClickFn() {
    const HTML = document.querySelector("html");
    HTML.setAttribute("data-nav-style", "menu-click");
    HTML.removeAttribute("data-hor-style");
    HTML.removeAttribute("data-vertical-style");

    toggleSidemenu();
    if (HTML.getAttribute("data-nav-layout") === "vertical") {
        setNavActive();
    }
}
