export function menuClose() {
    const HTML = document.querySelector("html");
    const RESPONSIVE_OVERLAY = document.querySelector("#responsive-overlay");
    HTML.setAttribute("data-toggled", "close");
    RESPONSIVE_OVERLAY.classList.remove("active");
}
