import { checkOptions } from "./checkOptions.js";
import { updateColors } from "./updateColors.js";

export function darkFn() {
    const HTML = document.querySelector("html");

    const DARK_BTN = document.querySelector("#switcher-dark-theme");
    const DARK_HEADER_BTN = document.querySelector("#switcher-header-dark");
    const DARK_MENU_BTN = document.querySelector("#switcher-menu-dark");
    const BG_DEFAULT_COLOR_1_BTN = document.querySelector("#switcher-background1");
    const BG_DEFAULT_COLOR_2_BTN = document.querySelector("#switcher-background2");
    const BG_DEFAULT_COLOR_3_BTN = document.querySelector("#switcher-background3");
    const BG_DEFAULT_COLOR_4_BTN = document.querySelector("#switcher-background4");
    const BG_DEFAULT_COLOR_5_BTN = document.querySelector("#switcher-background5");

    HTML.setAttribute("data-bs-theme", "dark");
    HTML.setAttribute("data-theme-mode", "dark");
    HTML.setAttribute("data-header-styles", "dark");
    HTML.setAttribute("data-menu-styles", "dark");
    if (!localStorage.getItem("primaryRGB")) {
        HTML.setAttribute("style", "");
    }
    DARK_BTN.checked = true;
    DARK_MENU_BTN.checked = true;
    DARK_HEADER_BTN.checked = true;
    HTML.style.removeProperty("--body-bg-rgb");
    HTML.style.removeProperty("--body-bg-rgb2");
    HTML.style.removeProperty("--light-rgb");
    HTML.style.removeProperty("--form-control-bg");
    HTML.style.removeProperty("--input-border");
    updateColors();
    localStorage.setItem("valexdarktheme", "true");
    localStorage.removeItem("valexlighttheme");
    localStorage.removeItem("bodyBgRGB");
    localStorage.removeItem("valexbgColor");
    localStorage.removeItem("valexHeaderbg");
    localStorage.removeItem("valexbgwhite");
    localStorage.removeItem("valexMenubg");
    checkOptions();

    BG_DEFAULT_COLOR_1_BTN.checked = false;
    BG_DEFAULT_COLOR_2_BTN.checked = false;
    BG_DEFAULT_COLOR_3_BTN.checked = false;
    BG_DEFAULT_COLOR_4_BTN.checked = false;
    BG_DEFAULT_COLOR_5_BTN.checked = false;
    DARK_MENU_BTN.checked = true;
    DARK_HEADER_BTN.checked = true;
}
