import { checkOptions } from "./functions/checkOptions.js";
import { localStorageBackup2 } from "./functions/localStorageBackup2.js";
import { switcherClick } from "./functions/switcherClick.js";
import { updateColors } from "./functions/updateColors.js";

(() => {
    localStorageBackup2();
    switcherClick();
    checkOptions();
    setTimeout(() => {
        checkOptions();
    }, 1000);
})();

// chart colors
updateColors();
