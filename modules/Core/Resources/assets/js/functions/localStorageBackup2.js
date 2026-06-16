export function localStorageBackup2() {
    const DARK_BTN = document.querySelector("#switcher-dark-theme");
    const DARK_HEADER_BTN = document.querySelector("#switcher-header-dark");
    const DARK_MENU_BTN = document.querySelector("#switcher-menu-dark");
    const PRIMARY_DEFAULT_COLOR_1_BTN = document.querySelector("#switcher-primary1");
    const PRIMARY_DEFAULT_COLOR_2_BTN = document.querySelector("#switcher-primary2");
    const PRIMARY_DEFAULT_COLOR_3_BTN = document.querySelector("#switcher-primary3");
    const PRIMARY_DEFAULT_COLOR_4_BTN = document.querySelector("#switcher-primary4");
    const PRIMARY_DEFAULT_COLOR_5_BTN = document.querySelector("#switcher-primary5");
    const BG_DEFAULT_COLOR_1_BTN = document.querySelector("#switcher-background1");
    const BG_DEFAULT_COLOR_2_BTN = document.querySelector("#switcher-background2");
    const BG_DEFAULT_COLOR_3_BTN = document.querySelector("#switcher-background3");
    const BG_DEFAULT_COLOR_4_BTN = document.querySelector("#switcher-background4");
    const BG_DEFAULT_COLOR_5_BTN = document.querySelector("#switcher-background5");
    const LOADER_ENABLE_BTN = document.querySelector("#switcher-loader-enable");

    if (localStorage.getItem("bodyBgRGB") || localStorage.getItem("bodylightRGB")) {
        DARK_BTN.checked = true;
        DARK_MENU_BTN.checked = true;
        DARK_HEADER_BTN.checked = true;
    }

    if (localStorage.getItem("bodyBgRGB") && localStorage.getItem("bodylightRGB")) {
        if (localStorage.getItem("bodyBgRGB") === "20, 30, 96") {
            BG_DEFAULT_COLOR_1_BTN.checked = true;
        }
        if (localStorage.getItem("bodyBgRGB") === "15, 95, 95") {
            BG_DEFAULT_COLOR_2_BTN.checked = true;
        }
        if (localStorage.getItem("bodyBgRGB") === "87, 48, 121") {
            BG_DEFAULT_COLOR_3_BTN.checked = true;
        }
        if (localStorage.getItem("bodyBgRGB") === "26, 93, 48") {
            BG_DEFAULT_COLOR_4_BTN.checked = true;
        }
        if (localStorage.getItem("bodyBgRGB") === "157, 41, 41") {
            BG_DEFAULT_COLOR_5_BTN.checked = true;
        }
    }

    if (localStorage.getItem("primaryRGB")) {
        if (localStorage.getItem("primaryRGB") === "58, 88, 146") {
            PRIMARY_DEFAULT_COLOR_1_BTN.checked = true;
        }
        if (localStorage.getItem("primaryRGB") === "49, 176, 176") {
            PRIMARY_DEFAULT_COLOR_2_BTN.checked = true;
        }
        if (localStorage.getItem("primaryRGB") === "170, 82, 216") {
            PRIMARY_DEFAULT_COLOR_3_BTN.checked = true;
        }
        if (localStorage.getItem("primaryRGB") === "80, 198, 118") {
            PRIMARY_DEFAULT_COLOR_4_BTN.checked = true;
        }
        if (localStorage.getItem("primaryRGB") === "244, 86, 86") {
            PRIMARY_DEFAULT_COLOR_5_BTN.checked = true;
        }
    }

    if (localStorage.getItem("loaderEnable") === "true") {
        LOADER_ENABLE_BTN.checked = true;
    }
}
