/* for cart dropdown */
const headerbtn = document.querySelectorAll(".dropdown-item-close");
headerbtn.forEach((button) => {
    button.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();
        button.parentNode.parentNode.parentNode.parentNode.parentNode.remove();
        document.getElementById("cart-data").innerText = `${document.querySelectorAll(".dropdown-item-close").length} Items`;
        document.getElementById("cart-icon-badge").innerText = `${document.querySelectorAll(".dropdown-item-close").length}`;
        console.log(document.getElementById("header-cart-items-scroll").children.length);
        if (document.querySelectorAll(".dropdown-item-close").length == 0) {
            const elementHide = document.querySelector(".empty-header-item");
            const elementShow = document.querySelector(".empty-item");
            elementHide.classList.add("d-none");
            elementShow.classList.remove("d-none");
        }
    });
});
/* for cart dropdown */

/* for notifications dropdown */
const headerbtn1 = document.querySelectorAll(".dropdown-item-close1");
headerbtn1.forEach((button) => {
    button.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();
        button.parentNode.parentNode.parentNode.parentNode.remove();
        document.getElementById("notifiation-data").innerText = `${document.querySelectorAll(".dropdown-item-close1").length} Unread`;
        document.getElementById("notification-icon-badge").innerText = `${document.querySelectorAll(".dropdown-item-close1").length}`;
        if (document.querySelectorAll(".dropdown-item-close1").length == 0) {
            const elementHide1 = document.querySelector(".empty-header-item1");
            const elementShow1 = document.querySelector(".empty-item1");
            elementHide1.classList.add("d-none");
            elementShow1.classList.remove("d-none");
        }
    });
});
