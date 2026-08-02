export function checkHoriMenu() {
    const HTML = document.querySelector("html");
    const MENU_NAV = document.querySelector(".main-menu");
    const MAIN_CONTAINER_1 = document.querySelector(".main-sidebar");
    const SLIDE_LEFT = document.querySelector(".slide-left");
    const SLIDE_RIGHT = document.querySelector(".slide-right");
    const MARGIN_LEFT_VALUE = Math.ceil(Number(window.getComputedStyle(MENU_NAV).marginLeft.split("px")[0]));
    const MARGIN_RIGHT_VALUE = Math.ceil(Number(window.getComputedStyle(MENU_NAV).marginRight.split("px")[0]));
    const CHECK = MENU_NAV.scrollWidth - MAIN_CONTAINER_1.offsetWidth;
    // Show/Hide the arrows
    if (MENU_NAV.scrollWidth > MAIN_CONTAINER_1.offsetWidth) {
        SLIDE_RIGHT.classList.remove("d-none");
        SLIDE_LEFT.classList.add("d-none");
    } else {
        SLIDE_RIGHT.classList.add("d-none");
        SLIDE_LEFT.classList.add("d-none");
        MENU_NAV.style.marginLeft = "0px";
        MENU_NAV.style.marginRight = "0px";
    }
    if (!(HTML.getAttribute("dir") === "rtl")) {
        // LTR check the width and adjust the menu in screen
        if (MENU_NAV.scrollWidth > MAIN_CONTAINER_1.offsetWidth) {
            if (Math.abs(CHECK) < Math.abs(MARGIN_LEFT_VALUE)) {
                MENU_NAV.style.marginLeft = `${-CHECK}px`;
                SLIDE_LEFT.classList.remove("d-none");
                SLIDE_RIGHT.classList.add("d-none");
            }
        }
        if (MARGIN_LEFT_VALUE === 0) {
            SLIDE_LEFT.classList.add("d-none");
        } else {
            SLIDE_LEFT.classList.remove("d-none");
        }
    } else {
        // RTL check the width and adjust the menu in screen
        if (MENU_NAV.scrollWidth > MAIN_CONTAINER_1.offsetWidth) {
            if (Math.abs(CHECK) < Math.abs(MARGIN_RIGHT_VALUE)) {
                MENU_NAV.style.marginRight = `${-CHECK}px`;
                SLIDE_LEFT.classList.remove("d-none");
                SLIDE_RIGHT.classList.add("d-none");
            }
        }
        if (MARGIN_RIGHT_VALUE === 0) {
            SLIDE_LEFT.classList.add("d-none");
        } else {
            SLIDE_LEFT.classList.remove("d-none");
        }
    }
    if (MARGIN_LEFT_VALUE !== 0 || MARGIN_RIGHT_VALUE !== 0) {
        SLIDE_LEFT.classList.remove("d-none");
    }
}
