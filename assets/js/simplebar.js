import SimpleBar from "simplebar";

(() => {
    const MY_ELEMENT = document.getElementById("sidebar-scroll");
    new SimpleBar(MY_ELEMENT, { autoHide: true });
})();
