import { checkHoriMenu } from "./checkHoriMenu.js";
import { clearNavDropdown } from "./clearNavDropdown.js";
import { menuClose } from "./menuClose.js";
import { setNavActive } from "./setNavActive.js";
import { toggleSidemenu } from "./toggleSidemenu.js";

export function ResizeMenu() {
    const HTML = document.querySelector("html");
    const MAIN_CONTENT = document.querySelector(".main-content");

    const WINDOW_PRE_SIZE = [window.innerWidth];
    WINDOW_PRE_SIZE.push(window.innerWidth);
    if (WINDOW_PRE_SIZE.length > 2) {
        WINDOW_PRE_SIZE.shift();
    }
    if (WINDOW_PRE_SIZE.length > 1) {
        if (WINDOW_PRE_SIZE[WINDOW_PRE_SIZE.length - 1] < 992 && WINDOW_PRE_SIZE[WINDOW_PRE_SIZE.length - 2] >= 992) {
            // less than 992;
            MAIN_CONTENT.addEventListener("click", menuClose);
            setNavActive();
            toggleSidemenu();
            MAIN_CONTENT.removeEventListener("click", clearNavDropdown);
        }

        if (WINDOW_PRE_SIZE[WINDOW_PRE_SIZE.length - 1] >= 992 && WINDOW_PRE_SIZE[WINDOW_PRE_SIZE.length - 2] < 992) {
            // greater than 992
            MAIN_CONTENT.removeEventListener("click", menuClose);
            toggleSidemenu();
            if (HTML.getAttribute("data-nav-layout") === "horizontal") {
                clearNavDropdown();
                MAIN_CONTENT.addEventListener("click", clearNavDropdown);
            } else {
                MAIN_CONTENT.removeEventListener("click", clearNavDropdown);
            }
            HTML.removeAttribute("data-toggled");
        }
    }
    checkHoriMenu();
}
