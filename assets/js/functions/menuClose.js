export function menuClose() {
    const HTML = document.querySelector("html");
    HTML.setAttribute("data-toggled", "close");
    const RESPONSIVE_OVERLAY = document.querySelector("#responsive-overlay");
    RESPONSIVE_OVERLAY.classList.remove("active");
}
