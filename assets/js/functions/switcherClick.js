import { clearNavDropdown } from "./clearNavDropdown.js";
import { closedSidemenuFn } from "./closedSidemenuFn.js";
import { darkFn } from "./darkFn.js";
import { detachedFn } from "./detachedFn.js";
import { doubletFn } from "./doubletFn.js";
import { horizontalClickFn } from "./horizontalClickFn.js";
import { iconClickFn } from "./iconClickFn.js";
import { iconHoverFn } from "./iconHoverFn.js";
import { iconOverayFn } from "./iconOverayFn.js";
import { iconTextFn } from "./iconTextFn.js";
import { lightFn } from "./lightFn.js";
import { menuhoverFn } from "./menuhoverFn.js";
import { ResetAllFn } from "./ResetAllFn.js";
import { ResizeMenu } from "./ResizeMenu.js";
import { setNavActive } from "./setNavActive.js";
import { toggleSidemenu } from "./toggleSidemenu.js";
import { updateColors } from "./updateColors.js";
import { verticalFn } from "./verticalFn.js";

export function switcherClick() {
    const HTML = document.querySelector("html");
    const MENU_NAV = document.querySelector(".main-menu");
    const MAIN_MENU = document.querySelectorAll(".main-menu>li.open");
    const SLIDE = document.querySelectorAll(".slide");
    const SLIDE_RIGHT = document.querySelector("#slide-right");
    const SLIDE_LEFT = document.querySelector("#slide-left");

    const LIGHT_BTN = document.querySelector("#switcher-light-theme");
    const DARK_BTN = document.querySelector("#switcher-dark-theme");
    const VERTICAL_BTN = document.querySelector("#switcher-vertical");
    const HORI_BTN = document.querySelector("#switcher-horizontal");
    const BOXED_BTN = document.querySelector("#switcher-boxed");
    const FULL_WIDTH_BTN = document.querySelector("#switcher-full-width");
    const FIXED_MENU_BTN = document.querySelector("#switcher-menu-fixed");
    const SCROLL_MENU_BTN = document.querySelector("#switcher-menu-scroll");
    const FIXED_HEADER_BTN = document.querySelector("#switcher-header-fixed");
    const SCROLL_HEADER_BTN = document.querySelector("#switcher-header-scroll");
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
    const REGULAR_BTN = document.querySelector("#switcher-regular");
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
    const BG_IMAGE_1_BTN = document.querySelector("#switcher-bg-img1");
    const BG_IMAGE_2_BTN = document.querySelector("#switcher-bg-img2");
    const BG_IMAGE_3_BTN = document.querySelector("#switcher-bg-img3");
    const BG_IMAGE_4_BTN = document.querySelector("#switcher-bg-img4");
    const BG_IMAGE_5_BTN = document.querySelector("#switcher-bg-img5");
    const RESET_ALL_BTN = document.querySelector("#reset-all");
    const LOADER_ENABLE_BTN = document.querySelector("#switcher-loader-enable");
    const LOADER_DISABLE_BTN = document.querySelector("#switcher-loader-disable");

    // primary theme
    const _primaryColor1Var = PRIMARY_DEFAULT_COLOR_1_BTN.addEventListener("click", () => {
        localStorage.setItem("primaryRGB", "58, 88, 146");
        HTML.style.setProperty("--primary-rgb", "58, 88, 146");
        updateColors();
    });
    const _primaryColor2Var = PRIMARY_DEFAULT_COLOR_2_BTN.addEventListener("click", () => {
        localStorage.setItem("primaryRGB", "49, 176, 176");
        HTML.style.setProperty("--primary-rgb", "49, 176, 176");
        updateColors();
    });
    const _primaryColor3Var = PRIMARY_DEFAULT_COLOR_3_BTN.addEventListener("click", () => {
        localStorage.setItem("primaryRGB", "170, 82, 216");
        HTML.style.setProperty("--primary-rgb", "170, 82, 216");
        updateColors();
    });
    const _primaryColor4Var = PRIMARY_DEFAULT_COLOR_4_BTN.addEventListener("click", () => {
        localStorage.setItem("primaryRGB", "80, 198, 118");
        HTML.style.setProperty("--primary-rgb", "80, 198, 118");
        updateColors();
    });
    const _primaryColor5Var = PRIMARY_DEFAULT_COLOR_5_BTN.addEventListener("click", () => {
        localStorage.setItem("primaryRGB", "244, 86, 86");
        HTML.style.setProperty("--primary-rgb", "244, 86, 86");
        updateColors();
    });

    // Background theme
    const _backgroundColor1Var = BG_DEFAULT_COLOR_1_BTN.addEventListener("click", () => {
        localStorage.setItem("bodyBgRGB", "20, 30, 96");
        localStorage.setItem("bodylightRGB", "25, 38, 101");
        HTML.setAttribute("data-bs-theme", "dark");
        HTML.setAttribute("data-theme-mode", "dark");
        HTML.setAttribute("data-menu-styles", "dark");
        HTML.setAttribute("data-header-styles", "dark");
        HTML.style.setProperty("--body-bg-rgb", localStorage.getItem("bodyBgRGB"));
        HTML.style.setProperty("--body-bg-rgb2", localStorage.getItem("bodylightRGB"));
        HTML.style.setProperty("--light-rgb", "25, 38, 101");
        HTML.style.setProperty("--form-control-bg", "rgb(25, 38, 101)");
        HTML.style.setProperty("--input-border", "rgba(255,255,255,0.1)");
        DARK_BTN.checked = true;
        DARK_MENU_BTN.checked = true;
        DARK_HEADER_BTN.checked = true;
    });
    const _backgroundColor2Var = BG_DEFAULT_COLOR_2_BTN.addEventListener("click", () => {
        localStorage.setItem("bodyBgRGB", "15, 95, 95");
        localStorage.setItem("bodylightRGB", "16, 104, 104");
        HTML.setAttribute("data-bs-theme", "dark");
        HTML.setAttribute("data-theme-mode", "dark");
        HTML.setAttribute("data-menu-styles", "dark");
        HTML.setAttribute("data-header-styles", "dark");
        HTML.style.setProperty("--body-bg-rgb", localStorage.getItem("bodyBgRGB"));
        HTML.style.setProperty("--body-bg-rgb2", localStorage.getItem("bodylightRGB"));
        HTML.style.setProperty("--light-rgb", "16, 104, 104");
        HTML.style.setProperty("--form-control-bg", "rgb(16, 104, 104)");
        HTML.style.setProperty("--input-border", "rgba(255,255,255,0.1)");
        DARK_BTN.checked = true;
        DARK_MENU_BTN.checked = true;
        DARK_HEADER_BTN.checked = true;
    });
    const _backgroundColor3Var = BG_DEFAULT_COLOR_3_BTN.addEventListener("click", () => {
        localStorage.setItem("bodyBgRGB", "87, 48, 121");
        localStorage.setItem("bodylightRGB", "98, 51, 140");
        HTML.setAttribute("data-bs-theme", "dark");
        HTML.setAttribute("data-theme-mode", "dark");
        HTML.setAttribute("data-menu-styles", "dark");
        HTML.setAttribute("data-header-styles", "dark");
        HTML.style.setProperty("--body-bg-rgb", localStorage.getItem("bodyBgRGB"));
        HTML.style.setProperty("--body-bg-rgb2", localStorage.getItem("bodylightRGB"));
        HTML.style.setProperty("--light-rgb", "98, 51, 140");
        HTML.style.setProperty("--form-control-bg", "rgb(98, 51, 140)");
        HTML.style.setProperty("--input-border", "rgba(255,255,255,0.1)");
        DARK_BTN.checked = true;
        DARK_MENU_BTN.checked = true;
        DARK_HEADER_BTN.checked = true;
    });
    const _backgroundColor4Var = BG_DEFAULT_COLOR_4_BTN.addEventListener("click", () => {
        localStorage.setItem("bodyBgRGB", "26, 93, 48");
        localStorage.setItem("bodylightRGB", "28, 103, 53");
        HTML.setAttribute("data-bs-theme", "dark");
        HTML.setAttribute("data-theme-mode", "dark");
        HTML.setAttribute("data-menu-styles", "dark");
        HTML.setAttribute("data-header-styles", "dark");
        HTML.style.setProperty("--body-bg-rgb", localStorage.getItem("bodyBgRGB"));
        HTML.style.setProperty("--body-bg-rgb2", localStorage.getItem("bodylightRGB"));
        HTML.style.setProperty("--light-rgb", "28, 103, 53");
        HTML.style.setProperty("--form-control-bg", "rgb(28, 103, 53)");
        HTML.style.setProperty("--input-border", "rgba(255,255,255,0.1)");
        DARK_BTN.checked = true;
        DARK_MENU_BTN.checked = true;
        DARK_HEADER_BTN.checked = true;
    });
    const _backgroundColor5Var = BG_DEFAULT_COLOR_5_BTN.addEventListener("click", () => {
        localStorage.setItem("bodyBgRGB", "157, 41, 41");
        localStorage.setItem("bodylightRGB", "172, 56, 56");
        HTML.setAttribute("data-bs-theme", "dark");
        HTML.setAttribute("data-theme-mode", "dark");
        HTML.setAttribute("data-menu-styles", "dark");
        HTML.setAttribute("data-header-styles", "dark");
        HTML.style.setProperty("--body-bg-rgb", localStorage.getItem("bodyBgRGB"));
        HTML.style.setProperty("--body-bg-rgb2", localStorage.getItem("bodylightRGB"));
        HTML.style.setProperty("--light-rgb", "172, 56, 56");
        HTML.style.setProperty("--form-control-bg", "rgb(172, 56, 56)");
        HTML.style.setProperty("--input-border", "rgba(255,255,255,0.1)");
        DARK_BTN.checked = true;
        DARK_MENU_BTN.checked = true;
        DARK_HEADER_BTN.checked = true;
    });

    // Bg image
    const _bgImg1Var = BG_IMAGE_1_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-bg-img", "bgimg1");
        localStorage.setItem("bgimg", "bgimg1");
    });
    const _bgImg2Var = BG_IMAGE_2_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-bg-img", "bgimg2");
        localStorage.setItem("bgimg", "bgimg2");
    });
    const _bgImg3Var = BG_IMAGE_3_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-bg-img", "bgimg3");
        localStorage.setItem("bgimg", "bgimg3");
    });
    const _bgImg4Var = BG_IMAGE_4_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-bg-img", "bgimg4");
        localStorage.setItem("bgimg", "bgimg4");
    });
    const _bgImg5Var = BG_IMAGE_5_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-bg-img", "bgimg5");
        localStorage.setItem("bgimg", "bgimg5");
    });

    /* Light Layout Start */
    const _lightThemeVar = LIGHT_BTN.addEventListener("click", () => {
        lightFn();
        localStorage.setItem("valexHeader", "light");
        // localStorage.setItem("valexMenu", 'light');
        localStorage.removeItem("bodylightRGB");
        localStorage.removeItem("bodyBgRGB");
        localStorage.removeItem("valexMenu");
    });
    /* Light Layout End */

    /* Dark Layout Start */
    const _darkThemeVar = DARK_BTN.addEventListener("click", () => {
        darkFn();
        localStorage.setItem("valexMenu", "dark");
        localStorage.setItem("valexHeader", "dark");
        // HTML.setAttribute("style","")
    });
    /* Dark Layout End */

    /* Light Menu Start */
    const _lightMenuVar = LIGHT_MENU_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-menu-styles", "light");
        localStorage.setItem("valexMenu", "light");
    });
    /* Light Menu End */

    /* Color Menu Start */
    const _colorMenuVar = COLOR_MENU_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-menu-styles", "color");
        localStorage.setItem("valexMenu", "color");
    });
    /* Color Menu End */

    /* Dark Menu Start */
    const _darkMenuVar = DARK_MENU_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-menu-styles", "dark");
        localStorage.setItem("valexMenu", "dark");
    });
    /* Dark Menu End */

    /* Gradient Menu Start */
    const _gradientMenuVar = GRADIENT_MENU_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-menu-styles", "gradient");
        localStorage.setItem("valexMenu", "gradient");
    });
    /* Gradient Menu End */

    /* Transparent Menu Start */
    const _transparentMenuVar = TRANSPARENT_MENU_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-menu-styles", "transparent");
        localStorage.setItem("valexMenu", "transparent");
    });
    /* Transparent Menu End */

    /* Light Header Start */
    const _lightHeaderVar = LIGHT_HEADER_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-header-styles", "light");
        localStorage.setItem("valexHeader", "light");
    });
    /* Light Header End */

    /* Color Header Start */
    const _colorHeaderVar = COLOR_HEADER_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-header-styles", "color");
        localStorage.setItem("valexHeader", "color");
    });
    /* Color Header End */

    /* Dark Header Start */
    const _darkHeaderVar = DARK_HEADER_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-header-styles", "dark");
        localStorage.setItem("valexHeader", "dark");
    });
    /* Dark Header End */

    /* Gradient Header Start */
    const _gradientHeaderVar = GRADIENT_HEADER_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-header-styles", "gradient");
        localStorage.setItem("valexHeader", "gradient");
    });
    /* Gradient Header End */

    /* Transparent Header Start */
    const _transparentHeaderVar = TRANSPARENT_HEADER_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-header-styles", "transparent");
        localStorage.setItem("valexHeader", "transparent");
    });
    /* Transparent Header End */

    /* Full Width Layout Start */
    const _fullwidthVar = FULL_WIDTH_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-width", "fullwidth");
        localStorage.setItem("valexfullwidth", "true");
        localStorage.removeItem("valexboxed");
    });
    /* Full Width Layout End */

    /* Boxed Layout Start */
    const _boxedVar = BOXED_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-width", "boxed");
        localStorage.setItem("valexboxed", "true");
        localStorage.removeItem("valexfullwidth");
        SLIDE_RIGHT.classList.remove("d-none");
        // checkHoriMenu();
    });
    /* Boxed Layout End */

    /* Regular page style Start */
    const _shadowVar = REGULAR_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-page-style", "regular");
        localStorage.setItem("valexregular", "true");
        localStorage.removeItem("valexclassic");
        localStorage.removeItem("valexmodern");
    });
    /* Regular page style End */

    /* Classic page style Start */
    const _noShadowVar = CLASSIC_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-page-style", "classic");
        localStorage.setItem("valexclassic", "true");
        localStorage.removeItem("valexregular");
        localStorage.removeItem("valexmodern");
    });
    /* Classic page style End */

    /* modern page style Start */
    const _modernVar = MODERN_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-page-style", "modern");
        localStorage.setItem("valexmodern", "true");
        localStorage.removeItem("valexregular");
        localStorage.removeItem("valexclassic");
    });
    /* modern page style End */

    /* Header-Position Styles Start */
    const _fixedHeaderVar = FIXED_HEADER_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-header-position", "fixed");
        localStorage.setItem("valexHeaderfixed", "true");
        localStorage.removeItem("valexHeaderscrollable");
    });

    const _scrollHeaderVar = SCROLL_HEADER_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-header-position", "scrollable");
        localStorage.setItem("valexHeaderscrollable", "true");
        localStorage.removeItem("valexHeaderfixed");
    });
    /* Header-Position Styles End */

    /* Menu-Position Styles Start */
    const _fixedMenuVar = FIXED_MENU_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-menu-position", "fixed");
        localStorage.setItem("valexMenufixed", "true");
        localStorage.removeItem("valexMenuscrollable");
    });

    const _scrollMenuVar = SCROLL_MENU_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-menu-position", "scrollable");
        localStorage.setItem("valexMenuscrollable", "true");
        localStorage.removeItem("valexMenufixed");
    });
    /* Menu-Position Styles End */

    /* Default Sidemenu Start */
    const _defaultVar = DEFAULT_BTN.addEventListener("click", () => {
        HTML.setAttribute("data-vertical-style", "default");
        HTML.setAttribute("data-nav-layout", "vertical");
        toggleSidemenu();
        localStorage.removeItem("valexverticalstyles");
        MAIN_MENU.forEach((ele) => {
            if (!ele.classList.contains("active")) {
                ele.classList.remove("open");
                ele.querySelector("ul").style.display = "none";
            }
        });
    });
    /* Default Sidemenu End */

    /* Closed Sidemenu Start */
    const _closedVar = CLOSED_BTN.addEventListener("click", () => {
        closedSidemenuFn();
        localStorage.setItem("valexverticalstyles", "closed");
        MAIN_MENU.forEach((ele) => {
            if (!ele.classList.contains("active")) {
                ele.classList.remove("open");
                ele.querySelector("ul").style.display = "none";
            }
        });
    });
    /* Closed Sidemenu End */

    /* Hover Submenu Start */
    const _detachedVar = DETACHED_BTN.addEventListener("click", () => {
        detachedFn();
        localStorage.setItem("valexverticalstyles", "detached");
    });
    /* Hover Submenu End */

    /* Icon Text Sidemenu Start */
    const _iconTextVar = ICON_TEXT_BTN.addEventListener("click", () => {
        iconTextFn();
        localStorage.setItem("valexverticalstyles", "icontext");
    });
    /* Icon Text Sidemenu End */

    /* Icon Overlay Sidemenu Start */
    const _overlayVar = OVERLAY_BTN.addEventListener("click", () => {
        iconOverayFn();
        localStorage.setItem("valexverticalstyles", "overlay");
        MAIN_MENU.forEach((ele) => {
            if (!ele.classList.contains("active")) {
                ele.classList.remove("open");
                ele.querySelector("ul").style.display = "none";
            }
        });
    });
    /* Icon Overlay Sidemenu End */

    /* doublemenu Sidemenu Start */
    const _doubleVar = DOUBLE_BTN.addEventListener("click", () => {
        doubletFn();
        localStorage.setItem("valexverticalstyles", "doublemenu");
    });
    /* doublemenu Sidemenu End */

    /* Menu Click Sidemenu Start */
    const _menuClickVar = MENU_CLICK_BTN.addEventListener("click", () => {
        HTML.removeAttribute("data-vertical-style");
        menuClickFn();
        localStorage.setItem("valexnavstyles", "menu-click");
        localStorage.removeItem("valexverticalstyles");
        MAIN_MENU.forEach((ele) => {
            if (!ele.classList.contains("active")) {
                ele.classList.remove("open");
                ele.querySelector("ul").style.display = "none";
            }
        });

        if (HTML.getAttribute("data-nav-layout") === "horizontal") {
            MENU_NAV.style.marginLeft = "0px";
            MENU_NAV.style.marginRight = "0px";
            ResizeMenu();
        }
    });
    /* Menu Click Sidemenu End */

    /* Menu Hover Sidemenu Start */
    const _menuhoverVar = MENU_HOVER_BTN.addEventListener("click", () => {
        HTML.removeAttribute("data-vertical-style");
        menuhoverFn();
        localStorage.setItem("valexnavstyles", "menu-hover");
        localStorage.removeItem("valexverticalstyles");

        if (HTML.getAttribute("data-nav-layout") === "horizontal") {
            MENU_NAV.style.marginLeft = "0px";
            MENU_NAV.style.marginRight = "0px";
            ResizeMenu();
        }
    });
    /* Menu Hover Sidemenu End */

    /* icon Click Sidemenu Start */
    const _iconClickVar = ICON_CLICK_BTN.addEventListener("click", () => {
        HTML.removeAttribute("data-vertical-style");
        iconClickFn();
        localStorage.setItem("valexnavstyles", "icon-click");
        localStorage.removeItem("valexverticalstyles");

        if (HTML.getAttribute("data-nav-layout") === "horizontal") {
            MENU_NAV.style.marginLeft = "0px";
            MENU_NAV.style.marginRight = "0px";
            ResizeMenu();
            SLIDE_LEFT.classList.add("d-none");
        }
        MAIN_MENU.forEach((ele) => {
            if (!ele.classList.contains("active")) {
                ele.classList.remove("open");
                ele.querySelector("ul").style.display = "none";
            }
        });
    });
    /* icon Click Sidemenu End */

    /* icon hover Sidemenu Start */
    const _iconhoverVar = ICON_HOVER_BTN.addEventListener("click", () => {
        HTML.removeAttribute("data-vertical-style");
        iconHoverFn();
        localStorage.setItem("valexnavstyles", "icon-hover");
        localStorage.removeItem("valexverticalstyles");

        if (HTML.getAttribute("data-nav-layout") === "horizontal") {
            MENU_NAV.style.marginLeft = "0px";
            MENU_NAV.style.marginRight = "0px";
            ResizeMenu();
            SLIDE_LEFT.classList.add("d-none");
        }
    });
    /* icon hover Sidemenu End */

    /* Sidemenu start*/
    const _verticalVar = VERTICAL_BTN.addEventListener("click", () => {
        const mainContent = document.querySelector(".main-content");
        // local storage
        localStorage.removeItem("valexlayout");
        localStorage.setItem("valexverticalstyles", "default");
        verticalFn();
        setNavActive();
        mainContent.removeEventListener("click", clearNavDropdown);

        //
        MENU_NAV.style.marginLeft = "0px";
        MENU_NAV.style.marginRight = "0px";

        SLIDE.forEach((element) => {
            if (element.classList.contains("open") && !element.classList.contains("active")) {
                element.querySelector("ul").style.display = "none";
            }
        });
    });
    /* Sidemenu end */

    /* horizontal start*/
    const _horiVar = HORI_BTN.addEventListener("click", () => {
        const mainContent = document.querySelector(".main-content");
        HTML.removeAttribute("data-vertical-style");
        //    local storage
        localStorage.setItem("valexlayout", "horizontal");
        localStorage.removeItem("valexverticalstyles");

        horizontalClickFn();
        clearNavDropdown();
        mainContent.addEventListener("click", clearNavDropdown);
    });
    /* horizontal end*/

    // reset all start
    const _resetVar = RESET_ALL_BTN.addEventListener("click", () => {
        ResetAllFn();
        setNavActive();
        HTML.setAttribute("data-menu-styles", "light");
        LIGHT_MENU_BTN.checked = true;
        SLIDE.forEach((element) => {
            if (element.classList.contains("open") && !element.classList.contains("active")) {
                element.querySelector("ul").style.display = "none";
            }
        });
    });
    // reset all end

    /* loader start */
    LOADER_ENABLE_BTN.onclick = () => {
        HTML.setAttribute("loader", "enable");
        localStorage.setItem("loaderEnable", "true");
    };

    LOADER_DISABLE_BTN.onclick = () => {
        HTML.setAttribute("loader", "disable");
        localStorage.setItem("loaderEnable", "false");
    };
    /* loader end */
}
