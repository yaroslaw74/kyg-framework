document.addEventListener("click", function (event) {
    if (event.target.classList.contains("nav-link")) {
        let nav_linc = document.querySelectorAll(".nav-link");
        nav_linc.forEach((el) => el.classList.remove("active"));
        event.target.classList.add("active");

        let id = event.target.getAttribute("id");

        id = "target_" + id;

        const ELEMENT = document.getElementById(id);
        if (ELEMENT) {
            ELEMENT.scrollIntoView({
                behavior: "smooth",
                block: "center"
            });
        }
    }
});
