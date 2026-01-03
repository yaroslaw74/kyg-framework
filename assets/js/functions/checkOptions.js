export function checkOptions() {
    const DARK_BTN = document.querySelector("#switcher-dark-theme");
    const VERTICAL_BTN = document.querySelector("#switcher-vertical");
    const HORI_BTN = document.querySelector("#switcher-horizontal");
    const BOXED_BTN = document.querySelector("#switcher-boxed");
    const FIXED_MENU_BTN = document.querySelector("#switcher-menu-fixed");
    const SCROLL_MENU_BTN = document.querySelector("#switcher-menu-scroll");
    const FIXED_HEADER_BTN = document.querySelector("#switcher-header-fixed");
    const SCROLL_HEADE_RBTN = document.querySelector("#switcher-header-scroll");
    const LIGHT_HEADER_BTN = document.querySelector("#switcher-header-light");
    const DARK_HEADER_BTN = document.querySelector("#switcher-header-dark");
    const COLOR_HEADER_BTN = document.querySelector("#switcher-header-primary");
    const GRADIENT_HEADER_BTN = document.querySelector("#switcher-header-gradient");
    const TRANSPARENT_HEADER_BTN = document.querySelector("#switcher-header-transparent");
    const LIGHT_MENU_BTN = document.querySelector("#switcher-menu-light");
    const DARK_MENU_BTN = document.querySelector("#switcher-menu-dark");
    const COLOR_MENU_BTN = document.querySelector("#switcher-menu-primary");
    const GRADIENT_MENU_BTN = document.querySelector("#switcher-menu-gradient");
    const TRANSPARENT_MENU_BTN = document.querySelector("#switcher-menu-transparent");
    const CLASSIC_BTN = document.querySelector("#switcher-classic");
    const MODERN_BTN = document.querySelector("#switcher-modern");
    const DEFAULT_BTN = document.querySelector("#switcher-default-menu");
    const MENU_CLICK_BTN = document.querySelector("#switcher-menu-click");
    const MENU_HOVER_BTN = document.querySelector("#switcher-menu-hover");
    const ICON_CLICK_BTN = document.querySelector("#switcher-icon-click");
    const ICON_HOVER_BTN = document.querySelector("#switcher-icon-hover");
    const CLOSED_BTN = document.querySelector("#switcher-closed-menu");
    const ICON_TEXT_BTN = document.querySelector("#switcher-icontext-menu");
    const OVERLAY_BTN = document.querySelector("#switcher-icon-overlay");
    const DOUBLE_BTN = document.querySelector("#switcher-double-menu");
    const DETACHED_BTN = document.querySelector("#switcher-detached");
    const LOADER_DISABLE_BTN = document.querySelector("#switcher-loader-disable");

    // dark
    if (localStorage.getItem("valexdarktheme")) {
        DARK_BTN.checked = true;
    }

    // horizontal
    if (localStorage.getItem("valexlayout") === "horizontal") {
        HORI_BTN.checked = true;
        MENU_CLICK_BTN.checked = true;
    } else {
        VERTICAL_BTN.checked = true;
    }

    // light header
    if (localStorage.getItem("valexHeader") === "light") {
        LIGHT_HEADER_BTN.checked = true;
    }

    // color header
    if (localStorage.getItem("valexHeader") === "color") {
        COLOR_HEADER_BTN.checked = true;
    }

    // gradient header
    if (localStorage.getItem("valexHeader") === "gradient") {
        GRADIENT_HEADER_BTN.checked = true;
    }

    // dark header
    if (localStorage.getItem("valexHeader") === "dark") {
        DARK_HEADER_BTN.checked = true;
    }
    // transparent header
    if (localStorage.getItem("valexHeader") === "transparent") {
        TRANSPARENT_HEADER_BTN.checked = true;
    }

    // light menu
    if (localStorage.getItem("valexMenu") === "light") {
        LIGHT_MENU_BTN.checked = true;
    }

    // color menu
    if (localStorage.getItem("valexMenu") === "color") {
        COLOR_MENU_BTN.checked = true;
    }

    // gradient menu
    if (localStorage.getItem("valexMenu") === "gradient") {
        GRADIENT_MENU_BTN.checked = true;
    }

    // dark menu
    if (localStorage.getItem("valexMenu") === "dark") {
        DARK_MENU_BTN.checked = true;
    }
    // transparent menu
    if (localStorage.getItem("valexMenu") === "transparent") {
        TRANSPARENT_MENU_BTN.checked = true;
    }

    //boxed
    if (localStorage.getItem("valexboxed")) {
        BOXED_BTN.checked = true;
    }

    //scrollable
    if (localStorage.getItem("valexHeaderscrollable")) {
        SCROLL_HEADE_RBTN.checked = true;
    }
    if (localStorage.getItem("valexMenuscrollable")) {
        SCROLL_MENU_BTN.checked = true;
    }

    //fixed
    if (localStorage.getItem("valexHeaderfixed")) {
        FIXED_HEADER_BTN.checked = true;
    }
    if (localStorage.getItem("valexMenufixed")) {
        FIXED_MENU_BTN.checked = true;
    }

    //classic
    if (localStorage.getItem("valexclassic")) {
        CLASSIC_BTN.checked = true;
    }

    //modern
    if (localStorage.getItem("valexmodern")) {
        MODERN_BTN.checked = true;
    }

    // sidemenu layout style
    if (localStorage.getItem("valexverticalstyles")) {
        const verticalStyles = localStorage.getItem("valexverticalstyles");
        switch (verticalStyles) {
            case "default":
                DEFAULT_BTN.checked = true;
                break;
            case "closed":
                CLOSED_BTN.checked = true;
                break;
            case "icontext":
                ICON_TEXT_BTN.checked = true;
                break;
            case "overlay":
                OVERLAY_BTN.checked = true;
                break;
            case "detached":
                DETACHED_BTN.checked = true;
                break;
            case "doublemenu":
                DOUBLE_BTN.checked = true;
                break;
            default:
                DEFAULT_BTN.checked = true;
                break;
        }
    }
    // navigation menu style
    if (localStorage.getItem("valexnavstyles")) {
        const NAV_STYLES = localStorage.getItem("valexnavstyles");
        switch (NAV_STYLES) {
            case "menu-click":
                MENU_CLICK_BTN.checked = true;
                break;
            case "menu-hover":
                MENU_HOVER_BTN.checked = true;
                break;
            case "icon-click":
                ICON_CLICK_BTN.checked = true;
                break;
            case "icon-hover":
                ICON_HOVER_BTN.checked = true;
                break;
        }
    }

    // loader
    if (localStorage.getItem("loaderEnable") !== "true") {
        LOADER_DISABLE_BTN.checked = true;
    }
}
