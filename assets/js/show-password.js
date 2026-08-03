const INPUT = document.getElementById("password");
const INPUT1 = document.getElementById("registration_form_plainPassword");
const BUTTON = document.getElementById("togglePassword");

const _CREATEPASSWORD = BUTTON.addEventListener("click", () => {
    if (INPUT !== null) {
        if (INPUT.getAttribute("type") === "password") {
            INPUT.removeAttribute("type");
            INPUT.setAttribute("type", "text");
            BUTTON.children[0].classList.remove("ri-eye-line");
            BUTTON.children[0].classList.add("ri-eye-off-line");
        } else {
            INPUT.removeAttribute("type");
            INPUT.setAttribute("type", "password");
            BUTTON.children[0].classList.remove("ri-eye-off-line");
            BUTTON.children[0].classList.add("ri-eye-line");
        }
    }

    if (INPUT1 !== null) {
        if (INPUT1.getAttribute("type") === "password") {
            INPUT1.removeAttribute("type");
            INPUT1.setAttribute("type", "text");
            BUTTON.children[0].classList.remove("ri-eye-line");
            BUTTON.children[0].classList.add("ri-eye-off-line");
        } else {
            INPUT1.removeAttribute("type");
            INPUT1.setAttribute("type", "password");
            BUTTON.children[0].classList.remove("ri-eye-off-line");
            BUTTON.children[0].classList.add("ri-eye-line");
        }
    }
});
