import { mouseEntered } from "./mouseEntered.js";
import { mouseLeave } from "./mouseLeave.js";
import { icontextOpen } from "./icontextOpen.js";
import { icontextClose } from "./icontextClose.js";
import { doubleClickFn } from "./doubleClickFn.js";
import { setNavActive } from "./setNavActive.js";
import { menuClose } from "./menuClose.js";
import { clearNavDropdown } from "./clearNavDropdown.js";

export function toggleSidemenu() {
    const HTML = document.querySelector("html");
    const SIDEMENU_TYPE = HTML.getAttribute("data-nav-layout");
    const SIDEBAR = document.getElementById("sidebar");
    const MAIN_CONTEN_TDIV = document.querySelector(".main-content");
    const RESPONSIVE_OVERLAY = document.querySelector("#responsive-overlay");

    if (window.innerWidth >= 992) {
        if (SIDEMENU_TYPE === "vertical") {
            SIDEBAR.removeEventListener("mouseenter", mouseEntered);
            SIDEBAR.removeEventListener("mouseleave", mouseLeave);
            SIDEBAR.removeEventListener("click", icontextOpen);
            MAIN_CONTEN_TDIV.removeEventListener("click", icontextClose);
            const SIDEMENU_LINK = document.querySelectorAll(".main-menu li > .side-menu__item");
            SIDEMENU_LINK.forEach((ele) => {
                ele.removeEventListener("click", doubleClickFn);
            });

            const VERTICAL_STYLE = HTML.getAttribute("data-vertical-style");
            switch (VERTICAL_STYLE) {
                // closed
                case "closed":
                    HTML.removeAttribute("data-nav-style");
                    if (HTML.getAttribute("data-toggled") === "close-menu-close") {
                        HTML.removeAttribute("data-toggled");
                    } else {
                        HTML.setAttribute("data-toggled", "close-menu-close");
                    }
                    break;
                // icon-overlay
                case "overlay":
                    HTML.removeAttribute("data-nav-style");
                    if (HTML.getAttribute("data-toggled") === "icon-overlay-close") {
                        HTML.removeAttribute("data-toggled", "icon-overlay-close");
                        SIDEBAR.removeEventListener("mouseenter", mouseEntered);
                        SIDEBAR.removeEventListener("mouseleave", mouseLeave);
                    } else {
                        if (window.innerWidth >= 992) {
                            if (!localStorage.getItem("valexlayout")) {
                                HTML.setAttribute("data-toggled", "icon-overlay-close");
                            }
                            SIDEBAR.addEventListener("mouseenter", mouseEntered);
                            SIDEBAR.addEventListener("mouseleave", mouseLeave);
                        } else {
                            SIDEBAR.removeEventListener("mouseenter", mouseEntered);
                            SIDEBAR.removeEventListener("mouseleave", mouseLeave);
                        }
                    }
                    break;
                // icon-text
                case "icontext":
                    HTML.removeAttribute("data-nav-style");
                    if (HTML.getAttribute("data-toggled") === "icon-text-close") {
                        HTML.removeAttribute("data-toggled", "icon-text-close");
                        SIDEBAR.removeEventListener("click", icontextOpen);
                        MAIN_CONTEN_TDIV.removeEventListener("click", icontextClose);
                    } else {
                        HTML.setAttribute("data-toggled", "icon-text-close");
                        if (window.innerWidth >= 992) {
                            SIDEBAR.addEventListener("click", icontextOpen);
                            MAIN_CONTEN_TDIV.addEventListener("click", icontextClose);
                        } else {
                            SIDEBAR.removeEventListener("click", icontextOpen);
                            MAIN_CONTEN_TDIV.removeEventListener("click", icontextClose);
                        }
                    }
                    break;
                // doublemenu
                case "doublemenu":
                    HTML.removeAttribute("data-nav-style");
                    if (HTML.getAttribute("data-toggled") === "double-menu-open") {
                        HTML.setAttribute("data-toggled", "double-menu-close");
                        if (document.querySelector(".slide-menu")) {
                            const SLIDEMENU = document.querySelectorAll(".slide-menu");
                            SLIDEMENU.forEach((e) => {
                                if (e.classList.contains("double-menu-active")) {
                                    e.classList.remove("double-menu-active");
                                }
                            });
                        }
                    } else {
                        const SIDEMENU = document.querySelector(".side-menu__item.active");
                        if (SIDEMENU) {
                            HTML.setAttribute("data-toggled", "double-menu-open");
                            if (SIDEMENU.nextElementSibling) {
                                SIDEMENU.nextElementSibling.classList.add("double-menu-active");
                            } else {
                                HTML.setAttribute("data-toggled", "double-menu-close");
                            }
                        }
                    }

                    doublemenu();
                    break;
                // detached
                case "detached":
                    HTML.removeAttribute("data-nav-style");
                    if (HTML.getAttribute("data-toggled") === "detached-close") {
                        HTML.removeAttribute("data-toggled", "detached-close");
                        SIDEBAR.removeEventListener("mouseenter", mouseEntered);
                        SIDEBAR.removeEventListener("mouseleave", mouseLeave);
                    } else {
                        HTML.setAttribute("data-toggled", "detached-close");
                        if (window.innerWidth >= 992) {
                            SIDEBAR.addEventListener("mouseenter", mouseEntered);
                            SIDEBAR.addEventListener("mouseleave", mouseLeave);
                        } else {
                            SIDEBAR.removeEventListener("mouseenter", mouseEntered);
                            SIDEBAR.removeEventListener("mouseleave", mouseLeave);
                        }
                    }
                    break;
                // default
                case "default":
                    HTML.removeAttribute("data-toggled");
                    HTML.setAttribute("data-nav-layout", "vertical");
                    HTML.setAttribute("data-vertical-style", "overlay");
                    setNavActive();

                // for making any vertical style as default
                // default:
                // iconOverayFn();
                // HTML.removeAttribute('data-toggled');
            }
            const MENU_CLICK_STYLE = HTML.getAttribute("data-nav-style");
            switch (MENU_CLICK_STYLE) {
                case "menu-click":
                    if (HTML.getAttribute("data-toggled") === "menu-click-closed") {
                        HTML.removeAttribute("data-toggled");
                    } else {
                        HTML.setAttribute("data-toggled", "menu-click-closed");
                    }
                    break;
                case "menu-hover":
                    if (HTML.getAttribute("data-toggled") === "menu-hover-closed") {
                        HTML.removeAttribute("data-toggled");
                        setNavActive();
                    } else {
                        HTML.setAttribute("data-toggled", "menu-hover-closed");
                        clearNavDropdown();
                    }
                    break;
                case "icon-click":
                    if (HTML.getAttribute("data-toggled") === "icon-click-closed") {
                        HTML.removeAttribute("data-toggled");
                    } else {
                        HTML.setAttribute("data-toggled", "icon-click-closed");
                    }
                    break;
                case "icon-hover":
                    if (HTML.getAttribute("data-toggled") === "icon-hover-closed") {
                        HTML.removeAttribute("data-toggled");
                        setNavActive();
                    } else {
                        HTML.setAttribute("data-toggled", "icon-hover-closed");
                        clearNavDropdown();
                    }
                    break;
                //for making any horizontal style as default
                default:
            }
        }
    } else {
        if (HTML.getAttribute("data-toggled") === "close") {
            HTML.setAttribute("data-toggled", "open");
            const I = document.createElement("div");
            I.id = "responsive-overlay";
            setTimeout(() => {
                if (HTML.getAttribute("data-toggled") === "open") {
                    RESPONSIVE_OVERLAY.classList.add("active");
                    RESPONSIVE_OVERLAY.addEventListener("click", () => {
                        RESPONSIVE_OVERLAY.classList.remove("active");
                        console.log(I.id);
                        menuClose();
                    });
                }
                window.addEventListener("resize", () => {
                    if (window.screen.width >= 992) {
                        RESPONSIVE_OVERLAY.classList.remove("active");
                    }
                });
            }, 100);
        } else {
            HTML.setAttribute("data-toggled", "close");
        }
    }
}
