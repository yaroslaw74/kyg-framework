export function updateColors() {
    const PRIMARY_RGB = getComputedStyle(document.documentElement).getPropertyValue("--primary-rgb").trim();

    //get variable
    const _myVarVal = localStorage.getItem("primaryRGB") || PRIMARY_RGB;
    if (document.querySelector("#Sales-bar") !== null) {
        salesReport();
    }
    if (document.querySelector("#us-map1") !== null) {
        vectormap();
    }
}
