export function stickyFn() {
    let navbar = document.getElementById("sidebar");
    if (window.scrollY >= 75) {
        navbar.classList.add("sticky-pin");
    } else {
        navbar.classList.remove("sticky-pin");
    }
}
