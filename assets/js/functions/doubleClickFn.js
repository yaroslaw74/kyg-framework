export function doubleClickFn() {
    const HTML = document.querySelector("html");
    const CHECK_ELEMENT = this.nextElementSibling;
    if (CHECK_ELEMENT) {
        if (!CHECK_ELEMENT.classList.contains("double-menu-active")) {
            const SLIDE_MENU_1 = document.querySelector(".slide-menu");
            if (SLIDE_MENU_1) {
                const SLID_EMENU = document.querySelectorAll(".slide-menu");
                SLID_EMENU.forEach((e) => {
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
