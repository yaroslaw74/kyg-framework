export function toggleTheme() {
    const html = document.querySelector("html");
    if (html.getAttribute("data-theme-mode") === "dark") {
        html.setAttribute("data-theme-mode", "light");
        html.setAttribute("data-header-styles", "light");
        html.setAttribute("data-menu-styles", "light");
        if (!localStorage.getItem("primaryRGB")) {
            html.setAttribute("style", "");
        }
        html.removeAttribute("data-bg-theme");
        document.querySelector("#switcher-light-theme").checked = true;
        document.querySelector("#switcher-menu-light").checked = true;
        html.style.removeProperty("--body-bg-rgb", localStorage.bodyBgRGB);
        checkOptions();
        html.style.removeProperty("--light-rgb");
        html.style.removeProperty("--form-control-bg");
        html.style.removeProperty("--input-border");
        document.querySelector("#switcher-header-light").checked = true;
        document.querySelector("#switcher-menu-light").checked = true;
        document.querySelector("#switcher-light-theme").checked = true;
        document.querySelector("#switcher-background4").checked = false;
        document.querySelector("#switcher-background3").checked = false;
        document.querySelector("#switcher-background2").checked = false;
        document.querySelector("#switcher-background1").checked = false;
        document.querySelector("#switcher-background").checked = false;
        localStorage.removeItem("valexdarktheme");
        localStorage.removeItem("valexMenu");
        localStorage.removeItem("valexHeader");
        localStorage.removeItem("bodylightRGB");
        localStorage.removeItem("bodyBgRGB");
        if (localStorage.getItem("valexlayout") !== "horizontal") {
            html.setAttribute("data-menu-styles", "light");
        }
        html.setAttribute("data-header-styles", "light");
    } else {
        html.setAttribute("data-theme-mode", "dark");
        html.setAttribute("data-header-styles", "dark");
        if (!localStorage.getItem("primaryRGB")) {
            html.setAttribute("style", "");
        }
        html.setAttribute("data-menu-styles", "dark");
        document.querySelector("#switcher-dark-theme").checked = true;
        document.querySelector("#switcher-menu-dark").checked = true;
        document.querySelector("#switcher-header-dark").checked = true;
        checkOptions();
        document.querySelector("#switcher-menu-dark").checked = true;
        document.querySelector("#switcher-header-dark").checked = true;
        document.querySelector("#switcher-dark-theme").checked = true;
        document.querySelector("#switcher-background4").checked = false;
        document.querySelector("#switcher-background3").checked = false;
        document.querySelector("#switcher-background2").checked = false;
        document.querySelector("#switcher-background1").checked = false;
        document.querySelector("#switcher-background").checked = false;
        localStorage.setItem("valexdarktheme", "true");
        localStorage.setItem("valexMenu", "dark");
        localStorage.setItem("valexHeader", "dark");
        localStorage.removeItem("bodylightRGB");
        localStorage.removeItem("bodyBgRGB");
    }
}
