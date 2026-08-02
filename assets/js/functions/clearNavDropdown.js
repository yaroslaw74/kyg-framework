import { slideUp } from "../constants/slideUp.js";

export function clearNavDropdown() {
    const SIDE_MENUS = document.querySelectorAll("ul.slide-menu");
    SIDE_MENUS.forEach((e) => {
        let parent = e.closest("ul");
        let parentNotMain = e.closest("ul:not(.main-menu)");
        if (parent) {
            let hasParent = parent.closest("ul.main-menu");
            while (hasParent) {
                parent.classList.add("active");
                slideUp(parent);
                //
                parent = parent.parentElement.closest("ul");
                parentNotMain = parent.closest("ul:not(.main-menu)");
                if (!parentNotMain) {
                    hasParent = false;
                }
            }
        }
    });
}
