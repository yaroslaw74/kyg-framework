const customSwitch = document.querySelectorAll(".toggle");
customSwitch.forEach((e) =>
    e.addEventListener("click", () => {
        e.classList.toggle("on");
    })
);
