export function stickyFn() {
    const NAVBAR = document.getElementById("sidebar");
    if (window.scrollY >= 75) {
        NAVBAR.classList.add("sticky-pin");
    } else {
        NAVBAR.classList.remove("sticky-pin");
    }
}
