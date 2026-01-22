export const customScrollTop = () => {
    const SIDEMENU_ITEMS = document.querySelectorAll(".side-menu__item");
    SIDEMENU_ITEMS.forEach((ele) => {
        if (ele.classList.contains("active")) {
            const ELEM_RECT = ele.getBoundingClientRect();
            if (ele.children[0] && ele.parentElement.classList.contains("has-sub") && ELEM_RECT.top > 435) {
                ele.scrollIntoView({ behavior: "smooth" });
            }
        }
    });
};
