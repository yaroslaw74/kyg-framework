const ELEM = document.documentElement;
function _openFullscreen() {
    const OPEN = document.querySelector(".full-screen-open");
    const CLOSE = document.querySelector(".full-screen-close");

    if (!document.fullscreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
        if (ELEM.requestFullscreen) {
            ELEM.requestFullscreen();
        } else if (ELEM.webkitRequestFullscreen) {
            /* Safari */
            ELEM.webkitRequestFullscreen();
        } else if (ELEM.msRequestFullscreen) {
            /* IE11 */
            ELEM.msRequestFullscreen();
        }
        CLOSE.classList.add("d-block");
        CLOSE.classList.remove("d-none");
        OPEN.classList.add("d-none");
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.webkitExitFullscreen) {
            /* Safari */
            document.webkitExitFullscreen();
            console.log("working");
        } else if (document.msExitFullscreen) {
            /* IE11 */
            document.msExitFullscreen();
        }
        CLOSE.classList.remove("d-block");
        OPEN.classList.remove("d-none");
        CLOSE.classList.add("d-none");
        OPEN.classList.add("d-block");
    }
}
