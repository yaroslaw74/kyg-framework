import { checkOptions } from "./checkOptions.js";

export function horizontalClickFn() {
    const HTML = document.querySelector("html");
    const HORI_BTN = document.querySelector("#switcher-horizontal");
    const LIGHT_MENU_BTN = document.querySelector("#switcher-menu-light");
    const MENU_CLICK_BTN = document.querySelector("#switcher-menu-click");

    HORI_BTN.checked = true;
    MENU_CLICK_BTN.checked = true;
    HTML.setAttribute("data-nav-layout", "horizontal");
    HTML.removeAttribute("data-vertical-style");
    if (!HTML.getAttribute("data-nav-style")) {
        HTML.setAttribute("data-nav-style", "menu-click");
    }
    if (!localStorage.getItem("valexMenu") && !localStorage.getItem("bodylightRGB")) {
        HTML.setAttribute("data-menu-styles", "light");
        LIGHT_MENU_BTN.checked = true;
        checkOptions();
    }
    checkOptions();
    // checkHoriMenu();
}
