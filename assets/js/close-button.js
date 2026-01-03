/* for cart dropdown */
const HEADER_BTN = document.querySelectorAll(".dropdown-item-close");
HEADER_BTN.forEach((button) => {
    button.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();
        button.parentNode.parentNode.parentNode.parentNode.parentNode.remove();
        document.getElementById("cart-data").innerText = `${document.querySelectorAll(".dropdown-item-close").length} Items`;
        document.getElementById("cart-icon-badge").innerText = `${document.querySelectorAll(".dropdown-item-close").length}`;
        console.log(document.getElementById("header-cart-items-scroll").children.length);
        if (document.querySelectorAll(".dropdown-item-close").length === 0) {
            const ELEMENT_HIDE = document.querySelector(".empty-header-item");
            const ELEMENT_SHOW = document.querySelector(".empty-item");
            ELEMENT_HIDE.classList.add("d-none");
            ELEMENT_SHOW.classList.remove("d-none");
        }
    });
});
/* for cart dropdown */

/* for notifications dropdown */
const HEADER_BTN_1 = document.querySelectorAll(".dropdown-item-close1");
HEADER_BTN_1.forEach((button) => {
    button.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();
        button.parentNode.parentNode.parentNode.parentNode.remove();
        document.getElementById("notifiation-data").innerText = `${document.querySelectorAll(".dropdown-item-close1").length} Unread`;
        document.getElementById("notification-icon-badge").innerText = `${document.querySelectorAll(".dropdown-item-close1").length}`;
        if (document.querySelectorAll(".dropdown-item-close1").length === 0) {
            const ELEMENT_HIDE_1 = document.querySelector(".empty-header-item1");
            const ELEMENT_SHOW_1 = document.querySelector(".empty-item1");
            ELEMENT_HIDE_1.classList.add("d-none");
            ELEMENT_SHOW_1.classList.remove("d-none");
        }
    });
});
