(() => {
    const SCROLL_TO_TOP = document.querySelector(".scrollToTop");
    const $_ROOT_ELEMENT = document.documentElement;
    const _$_BODY = document.body;
    window.onscroll = () => {
        const _SCROLL_TOP = window.scrollY || window.pageYOffset;
        const _CLIENT_HT = $_ROOT_ELEMENT.scrollHeight - $_ROOT_ELEMENT.clientHeight;
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
