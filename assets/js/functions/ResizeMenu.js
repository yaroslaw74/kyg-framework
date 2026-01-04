import { menuClose } from "./menuClose.js";
import { clearNavDropdown } from "./clearNavDropdown.js";
import { setNavActive } from "./setNavActive.js";
import { toggleSidemenu } from "./toggleSidemenu.js";
import { checkHoriMenu } from "./checkHoriMenu.js";

export function ResizeMenu() {
    const HTML = document.querySelector("html");
    const MAIN_CONTENT = document.querySelector(".main-content");
    const WINDOW_PRESIZE = [window.innerWidth];

    WINDOW_PRESIZE.push(window.innerWidth);
    if (WINDOW_PRESIZE.length > 2) {
        WINDOW_PRESIZE.shift();
    }
    if (WINDOW_PRESIZE.length > 1) {
        if (WINDOW_PRESIZE[WINDOW_PRESIZE.length - 1] < 992 && WINDOW_PRESIZE[WINDOW_PRESIZE.length - 2] >= 992) {
            // less than 992;
            MAIN_CONTENT.addEventListener("click", menuClose);
            setNavActive();
            toggleSidemenu();
            MAIN_CONTENT.removeEventListener("click", clearNavDropdown);
        }

        if (WINDOW_PRESIZE[WINDOW_PRESIZE.length - 1] >= 992 && WINDOW_PRESIZE[WINDOW_PRESIZE.length - 2] < 992) {
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
