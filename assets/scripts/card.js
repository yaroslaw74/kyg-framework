(() => {
    /* card with close button */
    const DIV_CARD = ".card";
    const CARD_REMOVE_BTN = document.querySelectorAll('[data-bs-toggle="card-remove"]');
    CARD_REMOVE_BTN.forEach((ele) => {
        ele.addEventListener("click", function (e) {
            e.preventDefault();
            const CARD = this.closest(DIV_CARD);
            CARD.remove();
            return false;
        });
    });
    /* card with close button */

    /* card with fullscreen */
    const CARD_FULLSCREEN_BTN = document.querySelectorAll('[data-bs-toggle="card-fullscreen"]');
    CARD_FULLSCREEN_BTN.forEach((ele) => {
        ele.addEventListener("click", function (e) {
            const CARD = this.closest(DIV_CARD);
            CARD.classList.toggle("card-fullscreen");
            CARD.classList.remove("card-collapsed");
            e.preventDefault();
            return false;
        });
    });
    /* card with fullscreen */
})();
