import { stickyFn } from "./functions/stickyFn.js";

(() => {
    window.addEventListener("scroll", stickyFn);
    const NAVBAR = document.getElementById("sidebar");
    const _STICKY = NAVBAR.offsetTop;
    window.addEventListener("scroll", stickyFn);
    window.addEventListener("DOMContentLoaded", stickyFn);
})();
