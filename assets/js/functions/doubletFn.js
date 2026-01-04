import { toggleSidemenu } from "./toggleSidemenu.js";

export function doubletFn() {
    const HTML = document.querySelector("html");
    HTML.setAttribute("data-nav-layout", "vertical");
    HTML.setAttribute("data-vertical-style", "doublemenu");
    toggleSidemenu();

    // Create the tooltip element
    const TOOLTIP = document.createElement("div");
    TOOLTIP.className = "custome-tooltip";
    // TOOLTIP.textContent = "This is a tooltip";

    // Set the CSS properties of the tooltip element
    TOOLTIP.style.setProperty("position", "fixed");
    TOOLTIP.style.setProperty("display", "none");
    TOOLTIP.style.setProperty("padding", "0.5rem");
    TOOLTIP.style.setProperty("font-weight", "500");
    TOOLTIP.style.setProperty("font-size", "0.75rem");
    TOOLTIP.style.setProperty("background-color", "rgb(15, 23 ,42)");
    TOOLTIP.style.setProperty("color", "rgb(255, 255 ,255)");
    TOOLTIP.style.setProperty("margin-inline-start", "100px");
    TOOLTIP.style.setProperty("border-radius", "0.25rem");
    TOOLTIP.style.setProperty("z-index", "99");

    const MENU_SLIDE_ITEM = document.querySelectorAll(".main-menu > li > .side-menu__item");
    MENU_SLIDE_ITEM.forEach((e) => {
        // Add an event listener to the menu slide item to show the tooltip
        e.addEventListener("mouseenter", () => {
            TOOLTIP.style.setProperty("display", "block");
            TOOLTIP.textContent = e.querySelector(".side-menu__label").textContent;
            if (HTML.getAttribute("data-vertical-style") === "doublemenu") {
                e.appendChild(TOOLTIP);
            }
        });

        // Add an event listener to hide the tooltip
        e.addEventListener("mouseleave", () => {
            TOOLTIP.style.setProperty("display", "none");
            TOOLTIP.textContent = e.querySelector(".side-menu__label").textContent;
            if (HTML.getAttribute("data-vertical-style") === "doublemenu") {
                e.removeChild(TOOLTIP);
            }
        });
    });
}
