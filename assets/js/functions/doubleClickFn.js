export function doubleClickFn() {
    const HTML = document.querySelector("html");
    const CHECK_ELEMENT = this.nextElementSibling;
    if (CHECK_ELEMENT) {
        if (!CHECK_ELEMENT.classList.contains("double-menu-active")) {
            if (document.querySelector(".slide-menu")) {
                const SLIDE_MENU = document.querySelectorAll(".slide-menu");
                SLIDE_MENU.forEach((e) => {
                    if (e.classList.contains("double-menu-active")) {
                        e.classList.remove("double-menu-active");
                        HTML.setAttribute("data-toggled", "double-menu-close");
                    }
                });
            }
            CHECK_ELEMENT.classList.add("double-menu-active");
            HTML.setAttribute("data-toggled", "double-menu-open");
        }
    }
}
