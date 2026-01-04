export function slideClick() {
    const SLIDE = document.querySelectorAll(".slide");
    SLIDE.forEach((element, _index) => {
        if (element.classList.contains("is-expanded") === true) {
            element.classList.remove("is-expanded");
        }
    });

    const SLIDE_MENU = document.querySelectorAll(".slide-menu");
    SLIDE_MENU.forEach((element, _index) => {
        if (element.classList.contains("open") === true) {
            element.classList.remove("open");
            element.style.display = "none";
        }
    });
}
