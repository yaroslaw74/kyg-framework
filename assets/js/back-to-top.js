(() => {
    const SCROLL_TO_TOP = document.querySelector(".scrollToTop");
    const $ROOT_ELEMENT = document.documentElement;
    const _$BODY = document.body;
    window.onscroll = () => {
        const _SCROLL_TOP = window.scrollY || window.pageYOffset;
        const _CLIENT_HT = $ROOT_ELEMENT.scrollHeight - $ROOT_ELEMENT.clientHeight;
        if (window.scrollY > 100) {
            SCROLL_TO_TOP.style.display = "flex";
        } else {
            SCROLL_TO_TOP.style.display = "none";
        }
    };
    SCROLL_TO_TOP.onclick = () => {
        window.scrollTo(0, 0);
    };
})();
