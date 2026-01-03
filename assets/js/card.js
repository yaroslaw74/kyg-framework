(() => {
    /* card with close button */
    const DIV_CARD = ".card";
    const cardRemoveBtn = document.querySelectorAll('[data-bs-toggle="card-remove"]');
    cardRemoveBtn.forEach((ele) => {
        ele.addEventListener("click", function (e) {
            e.preventDefault();
            const card = this.closest(DIV_CARD);
            card.remove();
            return false;
        });
    });
    /* card with close button */

    /* card with fullscreen */
    const cardFullscreenBtn = document.querySelectorAll('[data-bs-toggle="card-fullscreen"]');
    cardFullscreenBtn.forEach((ele) => {
        ele.addEventListener("click", function (e) {
            const card = this.closest(DIV_CARD);
            card.classList.toggle("card-fullscreen");
            card.classList.remove("card-collapsed");
            e.preventDefault();
            return false;
        });
    });
    /* card with fullscreen */
})();
