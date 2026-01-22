const CUSTOM_SWITCH = document.querySelectorAll(".toggle");
CUSTOM_SWITCH.forEach((e) =>
    e.addEventListener("click", () => {
        e.classList.toggle("on");
    })
);
