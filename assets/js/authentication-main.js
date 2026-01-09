import { localStorageBackup3 } from "./functions/localStorageBackup3.js";

(function () {
    "use strict";
    const HTML = document.querySelector("html");
    if (localStorage.getItem("valexdarktheme") === "true") {
        HTML.setAttribute("data-bs-theme", "dark");
        HTML.setAttribute("data-theme-mode", "dark");
        HTML.setAttribute("data-menu-styles", "dark");
        HTML.setAttribute("data-header-styles", "dark");
    }
    if (localStorage.getItem("valexlayout") === "horizontal") {
        HTML.setAttribute("data-nav-layout", "horizontal");
    }
    localStorageBackup3();
})();
