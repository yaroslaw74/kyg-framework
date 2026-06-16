import { checkOptions } from "./checkOptions.js";
import { clearNavDropdown } from "./clearNavDropdown.js";
import { lightFn } from "./lightFn.js";
import { updateColors } from "./updateColors.js";
import { verticalFn } from "./verticalFn.js";

export function ResetAllFn() {
    const HTML = document.querySelector("html");
    const MENU_NAV = document.querySelector(".main-menu");
    const MAIN_CONTENT = document.querySelector(".main-content");

    const BOXED_BTN = document.querySelector("#switcher-boxed");
    const FULL_WIDTH_BTN = document.querySelector("#switcher-full-width");
    const FIXED_MENU_BTN = document.querySelector("#switcher-menu-fixed");
    const SCROLL_MENU_BTN = document.querySelector("#switcher-menu-scroll");
    const FIXED_HEADER_BTN = document.querySelector("#switcher-header-fixed");
    const SCROLL_HEADER_BTN = document.querySelector("#switcher-header-scroll");
    const REGULAR_BTN = document.querySelector("#switcher-regular");
    const CLASSIC_BTN = document.querySelector("#switcher-classic");
    const MODERN_BTN = document.querySelector("#switcher-modern");
    const DEFAULT_BTN = document.querySelector("#switcher-default-menu");
    const CLOSED_BTN = document.querySelector("#switcher-closed-menu");
    const ICON_TEXT_BTN = document.querySelector("#switcher-icontext-menu");
    const OVERLAY_BTN = document.querySelector("#switcher-icon-overlay");
    const DOUBLE_BTN = document.querySelector("#switcher-double-menu");
    const DETACHED_BTN = document.querySelector("#switcher-detached");
    const PRIMARY_DEFAULT_COLOR_1_BTN = document.querySelector("#switcher-primary1");
    const PRIMARY_DEFAULT_COLOR_2_BTN = document.querySelector("#switcher-primary2");
    const PRIMARY_DEFAULT_COLOR_3_BTN = document.querySelector("#switcher-primary3");
    const PRIMARY_DEFAULT_COLOR_4_BTN = document.querySelector("#switcher-primary4");
    const PRIMARY_DEFAULT_COLOR_5_BTN = document.querySelector("#switcher-primary5");
    const BG_DEFAULT_COLOR_1_BTN = document.querySelector("#switcher-background1");
    const BG_DEFAULT_COLOR_2_BTN = document.querySelector("#switcher-background2");
    const BG_DEFAULT_COLOR_3_BTN = document.querySelector("#switcher-background3");
    const BG_DEFAULT_COLOR_4_BTN = document.querySelector("#switcher-background4");
    const BG_DEFAULT_COLOR_5_BTN = document.querySelector("#switcher-background5");

    if (localStorage.getItem("valexlayout") === "horizontal") {
        MENU_NAV.style.display = "block";
    }
    checkOptions();

    // clearing localstorage
    localStorage.clear();

    // reseting to light
    lightFn();

    //To reset the light-rgb
    HTML.removeAttribute("style");

    // clearing attibutes
    // removing header, menu, pageStyle & boxed
    HTML.removeAttribute("data-nav-style");
    HTML.removeAttribute("data-menu-position");
    HTML.removeAttribute("data-header-position");
    HTML.removeAttribute("data-width");
    HTML.removeAttribute("data-page-style");

    // removing theme styles
    HTML.removeAttribute("data-bg-img");

    // clear primary & bg color
    HTML.style.removeProperty("--primary-rgb");
    HTML.style.removeProperty("--body-bg-rgb");

    // reseting to vertical
    verticalFn();
    MAIN_CONTENT.removeEventListener("click", clearNavDropdown);

    // reseting page style
    CLASSIC_BTN.checked = false;
    MODERN_BTN.checked = false;
    REGULAR_BTN.checked = true;

    // reseting layout width styles
    FULL_WIDTH_BTN.checked = true;
    BOXED_BTN.checked = false;

    // reseting menu position styles
    FIXED_MENU_BTN.checked = true;
    SCROLL_MENU_BTN.checked = false;

    // reseting header position styles
    FIXED_HEADER_BTN.checked = true;
    SCROLL_HEADER_BTN.checked = false;

    // reseting sidemenu layout styles
    DEFAULT_BTN.checked = true;
    CLOSED_BTN.checked = false;
    ICON_TEXT_BTN.checked = false;
    OVERLAY_BTN.checked = false;
    DETACHED_BTN.checked = false;
    DOUBLE_BTN.checked = false;

    // resetting theme primary
    PRIMARY_DEFAULT_COLOR_1_BTN.checked = false;
    PRIMARY_DEFAULT_COLOR_2_BTN.checked = false;
    PRIMARY_DEFAULT_COLOR_3_BTN.checked = false;
    PRIMARY_DEFAULT_COLOR_4_BTN.checked = false;
    PRIMARY_DEFAULT_COLOR_5_BTN.checked = false;

    // resetting theme background
    BG_DEFAULT_COLOR_1_BTN.checked = false;
    BG_DEFAULT_COLOR_2_BTN.checked = false;
    BG_DEFAULT_COLOR_3_BTN.checked = false;
    BG_DEFAULT_COLOR_4_BTN.checked = false;
    BG_DEFAULT_COLOR_5_BTN.checked = false;

    // reseting chart colors
    updateColors();

    // to reset hrizontal menu scroll
    MENU_NAV.style.marginLeft = "0px";
    MENU_NAV.style.marginRight = "0px";
}
