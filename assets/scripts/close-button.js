/* for cart dropdown */
const HEADER_BTN = document.querySelectorAll(".dropdown-item-close");
HEADER_BTN.forEach((button) => {
    button.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();
        button.parentNode.parentNode.parentNode.parentNode.parentNode.remove();
        const CART_DATA = document.getElementById("cart-data");
        CART_DATA.innerText = `${HEADER_BTN.length} Items`;
        const CART_ICON_BADGE = document.getElementById("cart-icon-badge");
        CART_ICON_BADGE.innerText = `${HEADER_BTN.length}`;
        console.log(document.getElementById("header-cart-items-scroll").children.length);
        if (HEADER_BTN.length === 0) {
            const ELEMENT_HIDE = document.querySelector(".empty-header-item");
            ELEMENT_HIDE.classList.add("d-none");
            const ELEMENT_SHOW = document.querySelector(".empty-item");
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
        const NOTIFIATION_DATA = document.getElementById("notifiation-data");
        NOTIFIATION_DATA.innerText = `${HEADER_BTN_1.length} Unread`;
        const NOTIFICATION_ICON_BADGE = document.getElementById("notification-icon-badge");
        NOTIFICATION_ICON_BADGE.innerText = `${HEADER_BTN_1.length}`;
        if (HEADER_BTN_1.length === 0) {
            const ELEMENT_HIDE_1 = document.querySelector(".empty-header-item1");
            ELEMENT_HIDE_1.classList.add("d-none");
            const ELEMENT_SHOW_1 = document.querySelector(".empty-item1");
            ELEMENT_SHOW_1.classList.remove("d-none");
        }
    });
});
/* for notifications dropdown */
