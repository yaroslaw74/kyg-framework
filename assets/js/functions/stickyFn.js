export function stickyFn() {
    const NAV_BAR = document.getElementById("sidebar");
    if (window.scrollY >= 75) {
        NAV_BAR.classList.add("sticky-pin");
    } else {
        NAV_BAR.classList.remove("sticky-pin");
    }
}
