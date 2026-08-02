import { checkOptions } from "./checkOptions.js";

export function verticalFn() {
    const HTML = document.querySelector("html");

    const VERTICAL_BTN = document.querySelector("#switcher-vertical");
    const MENU_CLICK_BTN = document.querySelector("#switcher-menu-click");
    const MENU_HOVER_BTN = document.querySelector("#switcher-menu-hover");
    const ICON_CLICK_BTN = document.querySelector("#switcher-icon-click");
    const ICON_HOVER_BTN = document.querySelector("#switcher-icon-hover");

    HTML.setAttribute("data-nav-layout", "vertical");
    HTML.setAttribute("data-vertical-style", "overlay");
    HTML.removeAttribute("data-nav-style");
    localStorage.removeItem("valexnavstyles");
    HTML.removeAttribute("data-toggled");
    VERTICAL_BTN.checked = true;
    MENU_CLICK_BTN.checked = false;
    MENU_HOVER_BTN.checked = false;
    ICON_CLICK_BTN.checked = false;
    ICON_HOVER_BTN.checked = false;
    checkOptions();
    // HTML.setAttribute("data-menu-styles","light");
}
