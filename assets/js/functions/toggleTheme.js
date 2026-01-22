import { checkOptions } from "./checkOptions.js";

export function toggleTheme() {
    const HTML = document.querySelector("html");

    const LIGHT_BTN = document.querySelector("#switcher-light-theme");
    const DARK_BTN = document.querySelector("#switcher-dark-theme");
    const LIGHT_HEADER_BTN = document.querySelector("#switcher-header-light");
    const DARK_HEADER_BTN = document.querySelector("#switcher-header-dark");
    const LIGHT_MENU_BTN = document.querySelector("#switcher-menu-light");
    const DARK_MENU_BTN = document.querySelector("#switcher-menu-dark");
    const BG_DEFAULT_COLOR_1_BTN = document.querySelector("#switcher-background1");
    const BG_DEFAULT_COLOR_2_BTN = document.querySelector("#switcher-background2");
    const BG_DEFAULT_COLOR_3_BTN = document.querySelector("#switcher-background3");
    const BG_DEFAULT_COLOR_4_BTN = document.querySelector("#switcher-background4");
    const BG_DEFAULT_COLOR_5_BTN = document.querySelector("#switcher-background5");

    if (HTML.getAttribute("data-theme-mode") === "dark") {
        HTML.setAttribute("data-bs-theme", "light");
        HTML.setAttribute("data-theme-mode", "light");
        HTML.setAttribute("data-header-styles", "light");
        HTML.setAttribute("data-menu-styles", "light");
        if (!localStorage.getItem("primaryRGB")) {
            HTML.setAttribute("style", "");
        }
        HTML.removeAttribute("data-bg-theme");
        LIGHT_BTN.checked = true;
        LIGHT_MENU_BTN.checked = true;
        HTML.style.removeProperty("--body-bg-rgb", localStorage.getItem("bodyBgRGB"));
        checkOptions();
        HTML.style.removeProperty("--light-rgb");
        HTML.style.removeProperty("--form-control-bg");
        HTML.style.removeProperty("--input-border");
        LIGHT_HEADER_BTN.checked = true;
        LIGHT_MENU_BTN.checked = true;
        LIGHT_BTN.checked = true;
        BG_DEFAULT_COLOR_5_BTN.checked = false;
        BG_DEFAULT_COLOR_4_BTN.checked = false;
        BG_DEFAULT_COLOR_3_BTN.checked = false;
        BG_DEFAULT_COLOR_2_BTN.checked = false;
        BG_DEFAULT_COLOR_1_BTN.checked = false;
        localStorage.removeItem("valexdarktheme");
        localStorage.removeItem("valexMenu");
        localStorage.removeItem("valexHeader");
        localStorage.removeItem("bodylightRGB");
        localStorage.removeItem("bodyBgRGB");
        if (localStorage.getItem("valexlayout") !== "horizontal") {
            HTML.setAttribute("data-menu-styles", "light");
        }
        HTML.setAttribute("data-header-styles", "light");
    } else {
        HTML.setAttribute("data-bs-theme", "dark");
        HTML.setAttribute("data-theme-mode", "dark");
        HTML.setAttribute("data-header-styles", "dark");
        if (!localStorage.getItem("primaryRGB")) {
            HTML.setAttribute("style", "");
        }
        HTML.setAttribute("data-menu-styles", "dark");
        DARK_BTN.checked = true;
        DARK_MENU_BTN.checked = true;
        DARK_HEADER_BTN.checked = true;
        checkOptions();
        DARK_MENU_BTN.checked = true;
        DARK_HEADER_BTN.checked = true;
        DARK_BTN.checked = true;
        BG_DEFAULT_COLOR_5_BTN.checked = false;
        BG_DEFAULT_COLOR_4_BTN.checked = false;
        BG_DEFAULT_COLOR_3_BTN.checked = false;
        BG_DEFAULT_COLOR_2_BTN.checked = false;
        BG_DEFAULT_COLOR_1_BTN.checked = false;
        localStorage.setItem("valexdarktheme", "true");
        localStorage.setItem("valexMenu", "dark");
        localStorage.setItem("valexHeader", "dark");
        localStorage.removeItem("bodylightRGB");
        localStorage.removeItem("bodyBgRGB");
    }
}
