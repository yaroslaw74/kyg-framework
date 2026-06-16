const INPUT = document.getElementById("password");
const BUTTON = document.getElementById("togglePassword");

const _CREATEPASSWORD = BUTTON.addEventListener("click", () => {
    if (INPUT.getAttribute("type") === "password") {
        INPUT.removeAttribute("type");
        INPUT.setAttribute("type", "text");
        BUTTON.children[0].classList.remove("ri-eye-off-line");
        BUTTON.children[0].classList.add("ri-eye-line");
    } else {
        INPUT.removeAttribute("type");
        INPUT.setAttribute("type", "password");
        BUTTON.children[0].classList.remove("ri-eye-line");
        BUTTON.children[0].classList.add("ri-eye-off-line");
    }
});
