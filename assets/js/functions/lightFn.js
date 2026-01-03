import { checkOptions } from "./checkOptions.js";
import { updateColors } from "./updateColors.js";

export function lightFn() {
    const HTML = document.querySelector("html");

    const LIGHT_BTN = document.querySelector("#switcher-light-theme");
    const LIGHT_HEADER_BTN = document.querySelector("#switcher-header-light");
    const LIGHT_MENU_BTN = document.querySelector("#switcher-menu-light");
    const BG_DEFAULT_COLOR_1_BTN = document.querySelector("#switcher-background1");
    const BG_DEFAULT_COLOR_2_BTN = document.querySelector("#switcher-background2");
    const BG_DEFAULT_COLOR_3_BTN = document.querySelector("#switcher-background3");
    const BG_DEFAULT_COLOR_4_BTN = document.querySelector("#switcher-background4");
    const BG_DEFAULT_COLOR_5_BTN = document.querySelector("#switcher-background5");

    HTML.setAttribute("data-bs-theme", "light");
    HTML.setAttribute("data-theme-mode", "light");
    HTML.setAttribute("data-header-styles", "light");
    HTML.setAttribute("data-menu-styles", "light");
    if (localStorage.getItem("valexlayout") === "horizontal") {
        HTML.setAttribute("data-menu-styles", "light");
    }
    if (!localStorage.getItem("primaryRGB")) {
        HTML.setAttribute("style", "");
    }
    LIGHT_BTN.checked = true;
    LIGHT_MENU_BTN.checked = true;
    LIGHT_HEADER_BTN.checked = true;
    updateColors();
    localStorage.removeItem("valexdarktheme");
    localStorage.removeItem("valexbgColor");
    localStorage.removeItem("valexHeaderbg");
    localStorage.removeItem("valexbgwhite");
    localStorage.removeItem("valexMenubg");
    localStorage.removeItem("valexMenubg");
    checkOptions();
    HTML.style.removeProperty("--body-bg-rgb");
    HTML.style.removeProperty("--body-bg-rgb2");
    HTML.style.removeProperty("--light-rgb");
    HTML.style.removeProperty("--form-control-bg");
    HTML.style.removeProperty("--input-border");

    BG_DEFAULT_COLOR_1_BTN.checked = false;
    BG_DEFAULT_COLOR_2_BTN.checked = false;
    BG_DEFAULT_COLOR_3_BTN.checked = false;
    BG_DEFAULT_COLOR_4_BTN.checked = false;
    BG_DEFAULT_COLOR_5_BTN.checked = false;
    LIGHT_MENU_BTN.checked = true;
    LIGHT_HEADER_BTN.checked = true;
}
