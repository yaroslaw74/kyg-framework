import { checkHoriMenu } from "./checkHoriMenu.js";
import { slideClick } from "./slideClick.js";

export function switcherArrowFn() {
    const HTML = document.querySelector("html");

    // used to remove is-expanded class and remove class on clicking arrow buttons
    checkHoriMenu();

    const MENU_NAV = document.querySelector(".main-menu");
    const SLIDE_LEFT = document.querySelector(".slide-left");
    const SLIDE_RIGHT = document.querySelector(".slide-right");

    SLIDE_LEFT.addEventListener("click", () => {
        const MAIN_CONTAINER_1 = document.querySelector(".main-sidebar");
        const MARGIN_LEFT_VALUE = Math.ceil(Number(window.getComputedStyle(MENU_NAV).marginLeft.split("px")[0]));
        const MARGIN_RIGHT_VALUE = Math.ceil(Number(window.getComputedStyle(MENU_NAV).marginRight.split("px")[0]));
        const MAIN_CONTAINER_1_WIDTH = MAIN_CONTAINER_1.offsetWidth;
        if (MENU_NAV.scrollWidth > MAIN_CONTAINER_1.offsetWidth) {
            if (!(HTML.getAttribute("dir") === "rtl")) {
                if (MARGIN_LEFT_VALUE < 0 && !(Math.abs(MARGIN_LEFT_VALUE) < MAIN_CONTAINER_1_WIDTH)) {
                    MENU_NAV.style.marginRight = 0;
                    MENU_NAV.style.marginLeft = `${Number(MENU_NAV.style.marginLeft.split("px")[0]) + Math.abs(MAIN_CONTAINER_1_WIDTH)}px`;
                    SLIDE_RIGHT.classList.remove("d-none");
                } else if (MARGIN_LEFT_VALUE >= 0) {
                    MENU_NAV.style.marginLeft = "0px";
                    SLIDE_LEFT.classList.add("d-none");
                    SLIDE_RIGHT.classList.remove("d-none");
                } else {
                    MENU_NAV.style.marginLeft = "0px";
                    SLIDE_LEFT.classList.add("d-none");
                    SLIDE_RIGHT.classList.remove("d-none");
                }
            } else {
                if (MARGIN_RIGHT_VALUE < 0 && !(Math.abs(MARGIN_RIGHT_VALUE) < MAIN_CONTAINER_1_WIDTH)) {
                    MENU_NAV.style.marginLeft = 0;
                    MENU_NAV.style.marginRight = `${Number(MENU_NAV.style.marginRight.split("px")[0]) + Math.abs(MAIN_CONTAINER_1_WIDTH)}px`;
                    SLIDE_RIGHT.classList.remove("d-none");
                } else if (MARGIN_RIGHT_VALUE >= 0) {
                    MENU_NAV.style.marginRight = "0px";
                    SLIDE_LEFT.classList.add("d-none");
                    SLIDE_RIGHT.classList.remove("d-none");
                } else {
                    MENU_NAV.style.marginRight = "0px";
                    SLIDE_LEFT.classList.add("d-none");
                    SLIDE_RIGHT.classList.remove("d-none");
                }
            }
        } else {
            MENU_NAV.style.marginLeft = "0px";
            MENU_NAV.style.marginRight = "0px";
            SLIDE_LEFT.classList.add("d-none");
        }

        const ELEMENT = document.querySelector(".main-menu > .slide.open");
        if (ELEMENT) {
            ELEMENT.classList.remove("open");
        }
        const ELEMENT_1 = document.querySelector(".main-menu > .slide.open >ul");
        if (ELEMENT_1) {
            ELEMENT_1.style.display = "none";
        }

        slideClick();
        return;
        //
    });

    SLIDE_RIGHT.addEventListener("click", () => {
        const MAIN_CONTAINER_1 = document.querySelector(".main-sidebar");
        const MARGIN_LEFT_VALUE = Math.ceil(Number(window.getComputedStyle(MENU_NAV).marginLeft.split("px")[0]));
        const MARGIN_RIGHT_VALUE = Math.ceil(Number(window.getComputedStyle(MENU_NAV).marginRight.split("px")[0]));
        const CHECK = MENU_NAV.scrollWidth - MAIN_CONTAINER_1.offsetWidth;
        let mainContainer1Width = MAIN_CONTAINER_1.offsetWidth;

        if (MENU_NAV.scrollWidth > MAIN_CONTAINER_1.offsetWidth) {
            if (!(HTML.getAttribute("dir") === "rtl")) {
                if (Math.abs(CHECK) > Math.abs(MARGIN_LEFT_VALUE)) {
                    MENU_NAV.style.marginRight = 0;
                    if (!(Math.abs(CHECK) > Math.abs(MARGIN_LEFT_VALUE) + mainContainer1Width)) {
                        mainContainer1Width = Math.abs(CHECK) - Math.abs(MARGIN_LEFT_VALUE);
                        SLIDE_RIGHT.classList.add("d-none");
                    }
                    MENU_NAV.style.marginLeft = `${Number(MENU_NAV.style.marginLeft.split("px")[0]) - Math.abs(mainContainer1Width)}px`;
                    SLIDE_LEFT.classList.remove("d-none");
                }
            } else {
                if (Math.abs(CHECK) > Math.abs(MARGIN_RIGHT_VALUE)) {
                    MENU_NAV.style.marginLeft = 0;
                    if (!(Math.abs(CHECK) > Math.abs(MARGIN_RIGHT_VALUE) + mainContainer1Width)) {
                        mainContainer1Width = Math.abs(CHECK) - Math.abs(MARGIN_RIGHT_VALUE);
                        SLIDE_RIGHT.classList.add("d-none");
                    }
                    MENU_NAV.style.marginRight = `${Number(MENU_NAV.style.marginRight.split("px")[0]) - Math.abs(mainContainer1Width)}px`;
                    SLIDE_LEFT.classList.remove("d-none");
                }
            }
        }

        const ELEMENT = document.querySelector(".main-menu > .slide.open");
        if (ELEMENT) {
            ELEMENT.classList.remove("open");
        }
        const ELEMENT_1 = document.querySelector(".main-menu > .slide.open >ul");
        if (ELEMENT_1) {
            ELEMENT_1.style.display = "none";
        }

        slideClick();
        return;
    });
}
