(() => {
    const $rootElement = document.documentElement;
    const $body = document.body;
    window.onscroll = () => {
        const scrollTop = window.scrollY || window.pageYOffset;
        const clientHt = $rootElement.scrollHeight - $rootElement.clientHeight;
        if (window.scrollY > 100) {
            scrollToTop.style.display = "flex";
        } else {
            scrollToTop.style.display = "none";
        }
    };
    const scrollToTop = document.querySelector(".scrollToTop");
    scrollToTop.onclick = () => {
        window.scrollTo(0, 0);
    };
})();
