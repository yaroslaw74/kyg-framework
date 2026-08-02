import { doubleClickFn } from "./doubleClickFn.js";

export function doublemenu() {
    if (window.innerWidth >= 992) {
        const SIDE_MENU_LINK = document.querySelectorAll(".main-menu > li > .side-menu__item");
        SIDE_MENU_LINK.forEach((ele) => {
            ele.addEventListener("click", doubleClickFn);
        });
    }
}
