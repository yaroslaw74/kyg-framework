import { stickyFn } from "./functions/stickyFn.js";

(() => {
    window.addEventListener("scroll", stickyFn);
    let navbar = document.getElementById("sidebar");
    let sticky = navbar.offsetTop;

    window.addEventListener("scroll", stickyFn);
    window.addEventListener("DOMContentLoaded", stickyFn);
})();
