export function localStorageBackup() {
    const HTML = document.querySelector("html");
    // if there is a value stored, update color picker and background color
    // Used to retrive the data from local storage
    if (localStorage.getItem("primaryRGB")) {
        const THEME_CONTAINER_PRIMARY = document.querySelector(".theme-container-primary");
        if (THEME_CONTAINER_PRIMARY) {
            THEME_CONTAINER_PRIMARY.value = localStorage.getItem("primaryRGB");
        }
        HTML.style.setProperty("--primary-rgb", localStorage.getItem("primaryRGB"));
    }
    if (localStorage.getItem("bodyBgRGB") && localStorage.getItem("bodylightRGB")) {
        const THEME_CONTAINER_BACKGROUND = document.querySelector(".theme-container-background");
        if (THEME_CONTAINER_BACKGROUND) {
            THEME_CONTAINER_BACKGROUND.value = localStorage.getItem("bodyBgRGB");
        }
        HTML.style.setProperty("--body-bg-rgb", localStorage.getItem("bodyBgRGB"));
        HTML.style.setProperty("--light-rgb", localStorage.getItem("bodylightRGB"));
        HTML.style.setProperty("--form-control-bg", `rgb(${localStorage.getItem("bodylightRGB")})`);
        HTML.style.setProperty("--input-border", "rgba(255,255,255,0.1)");
        HTML.setAttribute("data-bs-theme", "dark");
        HTML.setAttribute("data-theme-mode", "dark");
        HTML.setAttribute("data-menu-styles", "dark");
        HTML.setAttribute("data-header-styles", "dark");
    }
    if (localStorage.getItem("valexdarktheme") === "true") {
        HTML.setAttribute("data-theme-mode", "dark");
    }
}
