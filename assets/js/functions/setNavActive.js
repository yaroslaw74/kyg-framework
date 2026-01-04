import { slideDown } from "../constants/slideDown.js";

export function setNavActive() {
    let currentPath = window.location.pathname.split("/")[0];

    currentPath = location.pathname === "/" ? "index.html" : location.pathname.substring(1);
    currentPath = currentPath.substring(currentPath.lastIndexOf("/") + 1);
    const SIDEMENU_ITEMS = document.querySelectorAll(".side-menu__item");
    SIDEMENU_ITEMS.forEach((e) => {
        if (currentPath === "/") {
            currentPath = "index.html";
        }
        if (e.getAttribute("href") === currentPath) {
            e.classList.add("active");
            e.parentElement.classList.add("active");
            let parent = e.closest("ul");
            let _parentNotMain = e.closest("ul:not(.main-menu)");
            if (parent) {
                parent.classList.add("active");
                parent.previousElementSibling.classList.add("active");
                parent.parentElement.classList.add("active");

                if (parent.parentElement.classList.contains("has-sub")) {
                    const ELEMRNT_REF = parent.parentElement.parentElement.parentElement;
                    ELEMRNT_REF.classList.add("open", "active");
                    ELEMRNT_REF.firstElementChild.classList.add("active");
                    ELEMRNT_REF.children[1].style.display = "block";
                    Array.from(ELEMRNT_REF.children[1].children).map((element) => {
                        if (element.classList.contains("active")) {
                            element.children[1].style.display = "block";
                        }
                    });
                }

                if (parent.classList.contains("child1")) {
                    slideDown(parent);
                }
                parent = parent.parentElement.closest("ul");
                //
                if (parent?.closest("ul:not(.main-menu)")) {
                    _parentNotMain = parent.closest("ul:not(.main-menu)");
                }
            }
        }
    });
}
