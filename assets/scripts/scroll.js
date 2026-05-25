document.addEventListener("click", (event) => {
    if (event.target.classList.contains("nav-link")) {
        const NAV_LINC = document.querySelectorAll(".nav-link");
        NAV_LINC.forEach((el) => {
            el.classList.remove("active");
        });
        event.target.classList.add("active");

        let id = event.target.getAttribute("id");

        id = `target_${id}`;

        const ELEMENT = document.getElementById(id);
        if (ELEMENT) {
            ELEMENT.scrollIntoView({
                behavior: "smooth",
                block: "center"
            });
        }
    }
});
