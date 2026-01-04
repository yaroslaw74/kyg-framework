import { doubleClickFn } from "./doubleClickFn.js";

export function doublemenu() {
    if (window.innerWidth >= 992) {
        const SIDEMENU_LINK = document.querySelectorAll(".main-menu > li > .side-menu__item");
        SIDEMENU_LINK.forEach((ele) => {
            ele.addEventListener("click", doubleClickFn);
        });
    }
}
