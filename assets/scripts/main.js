import { localStorageBackup } from "./functions/localStorageBackup.js";

(() => {
    const HTML = document.querySelector("html");

    if (localStorage.getItem("valexdarktheme")) {
        HTML.setAttribute("data-bs-theme", "dark");
        HTML.setAttribute("data-theme-mode", "dark");
        HTML.setAttribute("data-menu-styles", "dark");
        HTML.setAttribute("data-header-styles", "dark");
    }
    if (localStorage.getItem("valexlayout") === "horizontal") {
        HTML.setAttribute("data-nav-layout", "horizontal");
    }

    if (localStorage.getItem("loaderEnable") === "true") {
        HTML.setAttribute("loader", "enable");
    } else {
        if (!HTML.getAttribute("loader")) {
            HTML.setAttribute("loader", "disable");
        }
    }

    localStorageBackup();
})();
