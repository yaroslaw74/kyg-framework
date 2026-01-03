import { stickyFn } from "./functions/stickyFn.js";

(() => {
    window.addEventListener("scroll", stickyFn);
    const navbar = document.getElementById("sidebar");
    const _sticky = navbar.offsetTop;

    window.addEventListener("scroll", stickyFn);
    window.addEventListener("DOMContentLoaded", stickyFn);
})();
