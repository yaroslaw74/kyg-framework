import { slideDown } from "./slideDown.js";
import { slideUp } from "./slideUp.js";

export const slideToggle = (target, duration = 300) => {
    const HTML = document.querySelector("html");
    if (
        !((HTML.getAttribute("data-nav-style") === "menu-hover" && HTML.getAttribute("data-toggled") === "menu-hover-closed" && window.innerWidth >= 992) || (HTML.getAttribute("data-nav-style") === "icon-hover" && HTML.getAttribute("data-toggled") === "icon-hover-closed" && window.innerWidth >= 992)) &&
        target &&
        target.nodeType !== 3
    ) {
        if (window.getComputedStyle(target).display === "none") {
            return slideDown(target, duration);
        }
        return slideUp(target, duration);
    }
};
