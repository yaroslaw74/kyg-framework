import * as bootstrap from "bootstrap";
import Pickr from "@simonwep/pickr/dist/pickr.es5.min.js";
import Choices from "choices.js";
import Waves from "node-waves";
import SimpleBar from "simplebar";
import { toggleTheme } from "./functions/toggleTheme.js";

(() => {
    const html = document.querySelector("html");

    /* tooltip */
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map((tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl));

    /* popover  */
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
    const popoverList = [...popoverTriggerList].map((popoverTriggerEl) => new bootstrap.Popover(popoverTriggerEl));

    //switcher color pickers
    const pickrContainerPrimary = document.querySelector(".pickr-container-primary");
    const themeContainerPrimary = document.querySelector(".theme-container-primary");
    const pickrContainerBackground = document.querySelector(".pickr-container-background");
    const themeContainerBackground = document.querySelector(".theme-container-background");

    /* for theme primary */
    const nanoThemes = [
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
    const nanoButtons = [];
    let nanoPickr = null;
    for (const [theme, config] of nanoThemes) {
        const button = document.createElement("button");
        button.innerHTML = theme;
        nanoButtons.push(button);

        button.addEventListener("click", () => {
            const el = document.createElement("p");
            pickrContainerPrimary.appendChild(el);

            /* Delete previous instance */
            if (nanoPickr) {
                nanoPickr.destroyAndRemove();
            }

            /* Apply active class */
            for (const btn of nanoButtons) {
                btn.classList[btn === button ? "add" : "remove"]("active");
            }

            /* Create fresh instance */
            nanoPickr = new Pickr(
                Object.assign(
                    {
                        el: el,
                        theme: theme,
                        default: "#0162e8"
                    },
                    config
                )
            );

            /* Set events */
            nanoPickr.on("changestop", (source, instance) => {
                let color = instance.getColor().toRGBA();
                html.style.setProperty("--primary-rgb", `${Math.floor(color[0])}, ${Math.floor(color[1])}, ${Math.floor(color[2])}`);
                /* theme color picker */
                localStorage.setItem("primaryRGB", `${Math.floor(color[0])}, ${Math.floor(color[1])}, ${Math.floor(color[2])}`);
                updateColors();
            });
        });

        themeContainerPrimary.appendChild(button);
    }
    nanoButtons[0].click();
    /* for theme primary */

    /* for theme background */
    const nanoThemes1 = [
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
    const nanoButtons1 = [];
    let nanoPickr1 = null;
    for (const [theme, config] of nanoThemes1) {
        const button = document.createElement("button");
        button.innerHTML = theme;
        nanoButtons1.push(button);

        button.addEventListener("click", () => {
            const el = document.createElement("p");
            pickrContainerBackground.appendChild(el);

            /* Delete previous instance */
            if (nanoPickr1) {
                nanoPickr1.destroyAndRemove();
            }

            /* Apply active class */
            for (const btn of nanoButtons1) {
                btn.classList[btn === button ? "add" : "remove"]("active");
            }

            /* Create fresh instance */
            nanoPickr1 = new Pickr(
                Object.assign(
                    {
                        el: el,
                        theme: theme,
                        default: "#0162e8"
                    },
                    config
                )
            );

            /* Set events */
            nanoPickr1.on("changestop", (source, instance) => {
                let color = instance.getColor().toRGBA();
                html.style.setProperty("--body-bg-rgb", `${color[0]}, ${color[1]}, ${color[2]}`);
                html.style.setProperty("--light-rgb", `${color[0] + 14}, ${color[1] + 14}, ${color[2] + 14}`);
                html.style.setProperty("--form-control-bg", `rgb(${color[0] + 14}, ${color[1] + 14}, ${color[2] + 14})`);
                localStorage.removeItem("bgtheme");
                updateColors();
                html.setAttribute("data-theme-mode", "dark");
                html.setAttribute("data-menu-styles", "dark");
                html.setAttribute("data-header-styles", "dark");
                document.querySelector("#switcher-dark-theme").checked = true;
                localStorage.setItem("bodyBgRGB", `${color[0]}, ${color[1]}, ${color[2]}`);
                localStorage.setItem("bodylightRGB", `${color[0] + 14}, ${color[1] + 14}, ${color[2] + 14}`);
            });
        });
        themeContainerBackground.appendChild(button);
    }
    nanoButtons1[0].click();
    /* for theme background */

    /* header theme toggle */
    let layoutSetting = document.querySelector(".layout-setting");
    layoutSetting.addEventListener("click", toggleTheme);
    /* header theme toggle */

    /* Choices JS */
    document.addEventListener("DOMContentLoaded", function () {
        let genericExamples = document.querySelectorAll("[data-trigger]");
        for (let i = 0; i < genericExamples.length; ++i) {
            let element = genericExamples[i];
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
    let myHeadernotification = document.getElementById("header-notification-scroll");
    new SimpleBar(myHeadernotification, { autoHide: true });

    let myHeaderCart = document.getElementById("header-cart-items-scroll");
    new SimpleBar(myHeaderCart, { autoHide: true });
    /* header dropdowns scroll */
})();
