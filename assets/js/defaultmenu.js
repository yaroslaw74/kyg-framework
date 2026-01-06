import { customScrollTop } from "./constants/customScrollTop.js";
import { PoppersInstance } from "./constants/PoppersInstance.js";
import { slideToggle } from "./constants/slideToggle.js";
import { slideUp } from "./constants/slideUp.js";
import { clearNavDropdown } from "./functions/clearNavDropdown.js";
import { doubleClickFn } from "./functions/doubleClickFn.js";
import { horizontalClickFn } from "./functions/horizontalClickFn.js";
import { iconOverayFn } from "./functions/iconOverayFn.js";
import { menuClose } from "./functions/menuClose.js";
import { ResizeMenu } from "./functions/ResizeMenu.js";
import { setNavActive } from "./functions/setNavActive.js";
import { switcherArrowFn } from "./functions/switcherArrowFn.js";
import { toggleSidemenu } from "./functions/toggleSidemenu.js";

/**
 * wait for the current animation to finish and update poppers position
 */
const _updatePoppersTimeout = () => {
    setTimeout(() => {
        PoppersInstance.updatePoppers();
    }, 300);
};

const DEFAULT_OPEN_MENUS = document.querySelectorAll(".slide.has-sub.open");
DEFAULT_OPEN_MENUS.forEach((element) => {
    element.lastElementChild.style.display = "block";
});

/**
 * handle top level submenu click
 */
const FIRST_LEVEL_ITEMS = document.querySelectorAll(".nav > ul > .slide.has-sub > a");
FIRST_LEVEL_ITEMS.forEach((element) => {
    element.addEventListener("click", () => {
        const HTML = document.querySelector("html");
        if (
            !(
                (HTML.getAttribute("data-nav-style") === "menu-hover" && HTML.getAttribute("data-toggled") === "menu-hover-closed" && window.innerWidth >= 992) ||
                (HTML.getAttribute("data-nav-style") === "icon-hover" && HTML.getAttribute("data-toggled") === "icon-hover-closed" && window.innerWidth >= 992)
            )
        ) {
            const PARENT_MENU = element.closest(".nav.sub-open");
            if (PARENT_MENU)
                PARENT_MENU.querySelectorAll(":scope > ul > .slide.has-sub > a").forEach((el) => {
                    // window.getComputedStyle(el.nextElementSibling).display !== "none" &&
                    if (el.nextElementSibling.style.display === "block" || window.getComputedStyle(el.nextElementSibling).display === "block") {
                        slideUp(el.nextElementSibling);
                    }
                });
            slideToggle(element.nextElementSibling);
        }
    });
});

/**
 * handle inner submenu click
 */
const INNER_LEVEL_ITEMS = document.querySelectorAll(".nav > ul > .slide.has-sub .slide.has-sub > a");
INNER_LEVEL_ITEMS.forEach((element) => {
    // const HTML = document.querySelector("html");
    // if ((HTML.getAttribute('data-nav-style') !== "menu-hover" || HTML.getAttribute('data-nav-style') !== "icon-hover") ) {
    element.addEventListener("click", () => {
        const INNER_MENU = element.closest(".slide-menu");
        if (INNER_MENU)
            INNER_MENU.querySelectorAll(":scope .slide.has-sub > a").forEach((el) => {
                // window.getComputedStyle(el.nextElementSibling).display !== "none" &&
                // ref || window.getComputedStyle(el.nextElementSibling).display === "block"
                if (el.nextElementSibling && el.nextElementSibling?.style.display === "block") {
                    slideUp(el.nextElementSibling);
                }
            });
        slideToggle(element.nextElementSibling);
    });
    // }
});

/**
 * menu styles
 */
(() => {
    const HTML = document.querySelector("html");

    const HEADER_TOGGLE_BTN = document.querySelector(".sidemenu-toggle");
    HEADER_TOGGLE_BTN.addEventListener("click", toggleSidemenu);
    const MAIN_CONTENT = document.querySelector(".main-content");
    if (window.innerWidth <= 992) {
        MAIN_CONTENT.addEventListener("click", menuClose);
    } else {
        MAIN_CONTENT.removeEventListener("click", menuClose);
    }

    setNavActive();
    if (HTML.getAttribute("data-nav-layout") === "horizontal" && window.innerWidth >= 992) {
        clearNavDropdown();
        MAIN_CONTENT.addEventListener("click", clearNavDropdown);
    } else {
        MAIN_CONTENT.removeEventListener("click", clearNavDropdown);
    }

    window.addEventListener("resize", ResizeMenu);
    switcherArrowFn();

    if (!localStorage.getItem("valexlayout") && !localStorage.getItem("valexnavstyles") && !localStorage.getItem("valexverticalstyles") && !document.querySelector(".landing-body") && HTML.getAttribute("data-nav-layout") !== "horizontal") {
        // To enable sidemenu layout styles
        // iconTextFn();
        // detachedFn();
        // closedSidemenuFn();
        // doubletFn();
        if (!HTML.getAttribute("data-vertical-style") && !HTML.getAttribute("data-nav-style")) {
            iconOverayFn();
        }
    }

    /* Horizontal Start */
    if (HTML.getAttribute("data-nav-layout") === "horizontal" && !document.querySelector(".landing-body") === true) {
        setTimeout(() => {
            horizontalClickFn();
        }, 1000);
    }
    /* Horizontal End */

    toggleSidemenu();

    if ((HTML.getAttribute("data-nav-style") === "menu-hover" || HTML.getAttribute("data-nav-style") === "icon-hover") && window.innerWidth >= 992) {
        clearNavDropdown();
    }
    if (window.innerWidth < 992) {
        HTML.setAttribute("data-toggled", "close");
    }
})();
//

["switcher-icon-click", "switcher-icon-hover", "switcher-horizontal"].map((element) => {
    if (document.getElementById(element)) {
        document.getElementById(element).addEventListener("click", () => {
            const MENU_NAV = document.querySelector(".main-menu");
            const MAIN_CONTAINER_1 = document.querySelector(".main-sidebar");
            const SLIDE_RIGHT = document.getElementById("slide-right");
            setTimeout(() => {
                if (MENU_NAV.offsetWidth > MAIN_CONTAINER_1.offsetWidth) {
                    SLIDE_RIGHT.classList.remove("d-none");
                } else {
                    SLIDE_RIGHT.classList.add("d-none");
                }
            }, 100);
        });
    }
});

window.addEventListener("unload", () => {
    const MAIN_CONTENT = document.querySelector(".main-content");
    MAIN_CONTENT.removeEventListener("click", clearNavDropdown);
    window.removeEventListener("resize", ResizeMenu);
    const SIDE_MENU_LINK = document.querySelectorAll(".main-menu li > .side-menu__item");
    SIDE_MENU_LINK.forEach((ele) => ele.removeEventListener("click", doubleClickFn));
});

// for menu scroll to top active page
setTimeout(() => {
    customScrollTop();
}, 300);
// for menu scroll to top active page

// for menu click active close
const MAIN_CONTENT = document.querySelector(".main-content");
MAIN_CONTENT.addEventListener("click", () => {
    const SLIDE_MENU = document.querySelectorAll(".slide-menu");
    SLIDE_MENU.forEach((ele) => {
        const HTML = document.querySelector("html");
        if (HTML.getAttribute("data-toggled") === "menu-click-closed" || HTML.getAttribute("data-toggled") === "icon-click-closed") {
            ele.style.display = "none";
        }
    });
});
// for menu click active close
