import * as bootstrap from "bootstrap";
import Pickr from "@simonwep/pickr/dist/pickr.es5.min.js";
import Choices from "choices.js";
import Waves from "node-waves";
import SimpleBar from "simplebar";
import { toggleTheme } from "./functions/toggleTheme.js";
import { updateColors } from "./functions/updateColors.js";

(() => {
    const HTML = document.querySelector("html");

    /* tooltip */
    const TOOLTIP_TRIGGER_LIST = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const _TOOLTIP_LIST_ = [...TOOLTIP_TRIGGER_LIST].map((tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl));

    /* popover  */
    const POPOVER_TRIGGER_LIST = document.querySelectorAll('[data-bs-toggle="popover"]');
    const _POPOVER_LIST_ = [...POPOVER_TRIGGER_LIST].map((popoverTriggerEl) => new bootstrap.Popover(popoverTriggerEl));

    //switcher color pickers
    const PICKR_CONTAINER_PRIMARY = document.querySelector(".pickr-container-primary");
    const THEME_CONTAINER_PRIMARY = document.querySelector(".theme-container-primary");
    const PICKR_CONTAINER_BACKGROUND = document.querySelector(".pickr-container-background");
    const THEME_CONTAINER_BACKGROUND = document.querySelector(".theme-container-background");

    /* for theme primary */
    const NANO_THEMES = [
        [
            "nano",
            {
                defaultRepresentation: "RGB",
                components: {
                    preview: true,
                    opacity: false,
                    hue: true,

                    interaction: {
                        hex: false,
                        rgba: true,
                        hsva: false,
                        input: true,
                        clear: false,
                        save: false
                    }
                }
            }
        ]
    ];
    const NANO_BUTTONS = [];
    let nanoPickr = null;
    for (const [THEME, CONFIG] of NANO_THEMES) {
        const BUTTON = document.createElement("button");
        BUTTON.innerHTML = THEME;
        NANO_BUTTONS.push(BUTTON);

        BUTTON.addEventListener("click", () => {
            const EL = document.createElement("p");
            PICKR_CONTAINER_PRIMARY.appendChild(EL);

            /* Delete previous instance */
            if (nanoPickr) {
                nanoPickr.destroyAndRemove();
            }

            /* Apply active class */
            for (const BTN of NANO_BUTTONS) {
                BTN.classList[BTN === BUTTON ? "add" : "remove"]("active");
            }

            /* Create fresh instance */
            nanoPickr = new Pickr(
                Object.assign(
                    {
                        el: EL,
                        theme: THEME,
                        default: "#0162e8"
                    },
                    CONFIG
                )
            );

            /* Set events */
            nanoPickr.on("changestop", (_source, instance) => {
                const COLOR = instance.getColor().toRGBA();
                HTML.style.setProperty("--primary-rgb", `${Math.floor(COLOR[0])}, ${Math.floor(COLOR[1])}, ${Math.floor(COLOR[2])}`);
                /* theme color picker */
                localStorage.setItem("primaryRGB", `${Math.floor(COLOR[0])}, ${Math.floor(COLOR[1])}, ${Math.floor(COLOR[2])}`);
                updateColors();
            });
        });

        THEME_CONTAINER_PRIMARY.appendChild(BUTTON);
    }
    NANO_BUTTONS[0].click();
    /* for theme primary */

    /* for theme background */
    const NANO_THEMES_1 = [
        [
            "nano",
            {
                defaultRepresentation: "RGB",
                components: {
                    preview: true,
                    opacity: false,
                    hue: true,

                    interaction: {
                        hex: false,
                        rgba: true,
                        hsva: false,
                        input: true,
                        clear: false,
                        save: false
                    }
                }
            }
        ]
    ];
    const NANO_BUTTONS_1 = [];
    let nanoPickr1 = null;
    for (const [THEME, CONFIG] of NANO_THEMES_1) {
        const BUTTON = document.createElement("button");
        BUTTON.innerHTML = THEME;
        NANO_BUTTONS_1.push(BUTTON);

        BUTTON.addEventListener("click", () => {
            const EL = document.createElement("p");
            PICKR_CONTAINER_BACKGROUND.appendChild(EL);

            /* Delete previous instance */
            if (nanoPickr1) {
                nanoPickr1.destroyAndRemove();
            }

            /* Apply active class */
            for (const BTN of NANO_BUTTONS_1) {
                BTN.classList[BTN === BUTTON ? "add" : "remove"]("active");
            }

            /* Create fresh instance */
            nanoPickr1 = new Pickr(
                Object.assign(
                    {
                        el: EL,
                        theme: THEME,
                        default: "#0162e8"
                    },
                    CONFIG
                )
            );

            /* Set events */
            nanoPickr1.on("changestop", (_source, instance) => {
                const COLOR = instance.getColor().toRGBA();
                HTML.style.setProperty("--body-bg-rgb", `${COLOR[0]}, ${COLOR[1]}, ${COLOR[2]}`);
                HTML.style.setProperty("--light-rgb", `${COLOR[0] + 14}, ${COLOR[1] + 14}, ${COLOR[2] + 14}`);
                HTML.style.setProperty("--form-control-bg", `rgb(${COLOR[0] + 14}, ${COLOR[1] + 14}, ${COLOR[2] + 14})`);
                localStorage.removeItem("bgtheme");
                updateColors();
                HTML.setAttribute("data-bs-theme", "dark");
                HTML.setAttribute("data-theme-mode", "dark");
                HTML.setAttribute("data-menu-styles", "dark");
                HTML.setAttribute("data-header-styles", "dark");
                const DARK_BTN = document.querySelector("#switcher-dark-theme");
                DARK_BTN.checked = true;
                localStorage.setItem("bodyBgRGB", `${COLOR[0]}, ${COLOR[1]}, ${COLOR[2]}`);
                localStorage.setItem("bodylightRGB", `${COLOR[0] + 14}, ${COLOR[1] + 14}, ${COLOR[2] + 14}`);
            });
        });
        THEME_CONTAINER_BACKGROUND.appendChild(BUTTON);
    }
    NANO_BUTTONS_1[0].click();
    /* for theme background */

    /* header theme toggle */
    const LAYOUT_SETTING = document.querySelector(".layout-setting");
    LAYOUT_SETTING.addEventListener("click", toggleTheme);
    /* header theme toggle */

    /* Choices JS */
    document.addEventListener("DOMContentLoaded", () => {
        const GENERIC_EXAMPLES = document.querySelectorAll("[data-trigger]");
        for (let i = 0; i < GENERIC_EXAMPLES.length; ++i) {
            const element = GENERIC_EXAMPLES[i];
            new Choices(element, {
                allowHTML: true,
                placeholderValue: "This is a placeholder set in the config",
                searchPlaceholderValue: "Search"
            });
        }
    });
    /* Choices JS */

    /* node waves */
    Waves.attach(".btn-wave", ["waves-light"]);
    Waves.init();
    /* node waves */

    /* header dropdowns scroll */
    const MY_HEADER_NOTIFICATION = document.getElementById("header-notification-scroll");
    new SimpleBar(MY_HEADER_NOTIFICATION, { autoHide: true });

    const MY_HEADER_CART = document.getElementById("header-cart-items-scroll");
    new SimpleBar(MY_HEADER_CART, { autoHide: true });
    /* header dropdowns scroll */
})();
