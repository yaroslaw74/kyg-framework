import { clearNavDropdown } from "./clearNavDropdown.js";
import { checkHoriMenu } from "./checkHoriMenu.js";

export function localStorageBackup() {
    const HTML = document.querySelector("html");
    const THEME_CONTAINER_PRIMARY = document.querySelector(".theme-container-primary");
    const THEME_CONTAINER_BACKGROUND = document.querySelector(".theme-container-background");

    // if there is a value stored, update color picker and background color
    // Used to retrive the data from local storage
    if (localStorage.getItem("primaryRGB")) {
        if (THEME_CONTAINER_PRIMARY) {
            THEME_CONTAINER_PRIMARY.value = localStorage.getItem("primaryRGB");
        }
        HTML.style.setProperty("--primary-rgb", localStorage.getItem("primaryRGB"));
    }
    if (localStorage.getItem("bodyBgRGB") && localStorage.getItem("bodylightRGB")) {
        if (THEME_CONTAINER_BACKGROUND) {
            THEME_CONTAINER_BACKGROUND.value = localStorage.getItem("bodyBgRGB");
        }
        HTML.style.setProperty("--body-bg-rgb", localStorage.getItem("bodyBgRGB"));
        HTML.style.setProperty("--body-bg-rgb2", localStorage.getItem("bodylightRGB"));
        HTML.style.setProperty("--light-rgb", localStorage.getItem("bodylightRGB"));
        HTML.style.setProperty("--form-control-bg", `rgb(${localStorage.getItem("bodylightRGB")})`);
        HTML.style.setProperty("--input-border", "rgba(255,255,255,0.1)");
        HTML.setAttribute("data-bs-theme", "dark");
        HTML.setAttribute("data-theme-mode", "dark");
        HTML.setAttribute("data-menu-styles", "dark");
        HTML.setAttribute("data-header-styles", "dark");
    }
    if (localStorage.getItem("valexdarktheme") === "true") {
        HTML.setAttribute("data-bs-theme", "dark");
        HTML.setAttribute("data-theme-mode", "dark");
    }
    if (localStorage.getItem("valexlayout")) {
        HTML.setAttribute("data-nav-layout", "horizontal");
        setTimeout(() => {
            clearNavDropdown();
        }, 5000);
        HTML.setAttribute("data-nav-style", "menu-click");
        setTimeout(() => {
            checkHoriMenu();
        }, 5000);
    }
    if (localStorage.getItem("valexverticalstyles")) {
        const VERTICAL_STYLES = localStorage.getItem("valexverticalstyles");

        if (VERTICAL_STYLES === "default") {
            HTML.setAttribute("data-vertical-style", "default");
            localStorage.removeItem("ynexnavstyles");
        }

        if (VERTICAL_STYLES === "closed") {
            HTML.setAttribute("data-vertical-style", "closed");
            localStorage.removeItem("valexnavstyles");
        }
        if (VERTICAL_STYLES === "icontext") {
            HTML.setAttribute("data-vertical-style", "icontext");
            localStorage.removeItem("valexnavstyles");
        }
        if (VERTICAL_STYLES === "overlay") {
            HTML.setAttribute("data-vertical-style", "overlay");
            localStorage.removeItem("valexnavstyles");
        }
        if (VERTICAL_STYLES === "detached") {
            HTML.setAttribute("data-vertical-style", "detached");
            localStorage.removeItem("valexnavstyles");
        }
        if (VERTICAL_STYLES === "doublemenu") {
            HTML.setAttribute("data-vertical-style", "doublemenu");
            localStorage.removeItem("valexnavstyles");
            setTimeout(() => {
                // Create the tooltip element
                const TOOLTIP = document.createElement("div");
                TOOLTIP.className = "custome-tooltip";
                // TOOLTIP.textContent = "This is a tooltip";

                // Set the CSS properties of the tooltip element
                TOOLTIP.style.setProperty("position", "fixed");
                TOOLTIP.style.setProperty("display", "none");
                TOOLTIP.style.setProperty("padding", "0.5rem");
                TOOLTIP.style.setProperty("font-weight", "500");
                TOOLTIP.style.setProperty("font-size", "0.75rem");
                TOOLTIP.style.setProperty("background-color", "rgb(15, 23 ,42)");
                TOOLTIP.style.setProperty("color", "rgb(255, 255 ,255)");
                TOOLTIP.style.setProperty("margin-inline-start", "100px");
                TOOLTIP.style.setProperty("border-radius", "0.25rem");
                TOOLTIP.style.setProperty("z-index", "99");

                const MENU_SLIDE_ITEM = document.querySelectorAll(".main-menu > li > .side-menu__item");
                MENU_SLIDE_ITEM.forEach((e) => {
                    // Add an event listener to the menu slide item to show the tooltip
                    e.addEventListener("mouseenter", () => {
                        TOOLTIP.style.setProperty("display", "block");
                        TOOLTIP.textContent = e.querySelector(".side-menu__label").textContent;
                        if (HTML.getAttribute("data-vertical-style") === "doublemenu") {
                            e.appendChild(TOOLTIP);
                        }
                    });

                    // Add an event listener to hide the tooltip
                    e.addEventListener("mouseleave", () => {
                        TOOLTIP.style.setProperty("display", "none");
                        TOOLTIP.textContent = e.querySelector(".side-menu__label").textContent;
                    });
                });
            }, 1000);
        }
    }
    if (localStorage.getItem("valexnavstyles")) {
        const NAV_STYLES = localStorage.getItem("valexnavstyles");
        if (NAV_STYLES === "menu-click") {
            HTML.setAttribute("data-nav-style", "menu-click");
            localStorage.removeItem("valexverticalstyles");
            HTML.removeAttribute("data-vertical-style");
        }
        if (NAV_STYLES === "menu-hover") {
            HTML.setAttribute("data-nav-style", "menu-hover");
            localStorage.removeItem("valexverticalstyles");
            HTML.removeAttribute("data-vertical-style");
        }
        if (NAV_STYLES === "icon-click") {
            HTML.setAttribute("data-nav-style", "icon-click");
            localStorage.removeItem("valexverticalstyles");
            HTML.removeAttribute("data-vertical-style");
        }
        if (NAV_STYLES === "icon-hover") {
            HTML.setAttribute("data-nav-style", "icon-hover");
            localStorage.removeItem("valexverticalstyles");
            HTML.removeAttribute("data-vertical-style");
        }
    }
    if (localStorage.getItem("valexclassic") === "true") {
        HTML.setAttribute("data-page-style", "classic");
    }
    if (localStorage.getItem("valexmodern") === "true") {
        HTML.setAttribute("data-page-style", "modern");
    }
    if (localStorage.getItem("valexboxed") === "true") {
        HTML.setAttribute("data-width", "boxed");
    }
    if (localStorage.getItem("valexHeaderfixed") === "true") {
        HTML.setAttribute("data-header-position", "fixed");
    }
    if (localStorage.getItem("valexHeaderscrollable") === "true") {
        HTML.setAttribute("data-header-position", "scrollable");
    }
    if (localStorage.getItem("valexMenufixed")) {
        HTML.setAttribute("data-menu-position", "fixed");
    }
    if (localStorage.getItem("valexMenuscrollable") === "true") {
        HTML.setAttribute("data-menu-position", "scrollable");
    }
    if (localStorage.getItem("valexMenu")) {
        const MENU_VALUE = localStorage.getItem("valexMenu");
        switch (MENU_VALUE) {
            case "light":
                HTML.setAttribute("data-menu-styles", "light");
                break;
            case "dark":
                HTML.setAttribute("data-menu-styles", "dark");
                break;
            case "color":
                HTML.setAttribute("data-menu-styles", "color");
                break;
            case "gradient":
                HTML.setAttribute("data-menu-styles", "gradient");
                break;
            case "transparent":
                HTML.setAttribute("data-menu-styles", "transparent");
                break;
            default:
                break;
        }
    }
    if (localStorage.getItem("valexHeader")) {
        const HEADER_VALUE = localStorage.getItem("valexHeader");
        switch (HEADER_VALUE) {
            case "light":
                HTML.setAttribute("data-header-styles", "light");
                break;
            case "dark":
                HTML.setAttribute("data-header-styles", "dark");
                break;
            case "color":
                HTML.setAttribute("data-header-styles", "color");
                break;
            case "gradient":
                HTML.setAttribute("data-header-styles", "gradient");
                break;
            case "transparent":
                HTML.setAttribute("data-header-styles", "transparent");
                break;

            default:
                break;
        }
    }
    if (localStorage.getItem("bgimg")) {
        const VALUE = localStorage.getItem("bgimg");
        HTML.setAttribute("data-bg-img", VALUE);
    }
}
