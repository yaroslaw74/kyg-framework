class PopperObject {
    instance = null;
    reference = null;
    popperTarget = null;

    constructor(reference, popperTarget) {
        this.init(reference, popperTarget);
    }

    init(reference, popperTarget) {
        this.reference = reference;
        this.popperTarget = popperTarget;
        this.instance = Popper.createPopper(this.reference, this.popperTarget, {
            placement: "bottom",
            strategy: "relative",
            resize: true,
            modifiers: [
                {
                    name: "computeStyles",
                    options: {
                        adaptive: false
                    }
                }
            ]
        });

        document.addEventListener("click", (e) => this.clicker(e, this.popperTarget, this.reference), false);

        const ro = new ResizeObserver(() => {
            this.instance.update();
        });

        ro.observe(this.popperTarget);
        ro.observe(this.reference);
    }

    clicker(event, popperTarget, reference) {
        const sidebar = document.getElementById("sidebar");
        if (sidebar.classList.contains("collapsed") && !popperTarget.contains(event.target) && !reference.contains(event.target)) {
            this.hide();
        }
    }

    hide() {
        this.instance.state.elements.popper.style.visibility = "hidden";
    }
}

class Poppers {
    subMenuPoppers = [];

    constructor() {
        this.init();
    }

    init() {
        const slideHasSub = document.querySelectorAll(".nav > ul > .slide.has-sub");
        slideHasSub.forEach((element) => {
            this.subMenuPoppers.push(new PopperObject(element, element.lastElementChild));
            this.closePoppers();
        });
    }

    togglePopper(target) {
        if (window.getComputedStyle(target).visibility === "hidden" && window.getComputedStyle(target).visibility === undefined) target.style.visibility = "visible";
        else target.style.visibility = "hidden";
    }

    updatePoppers() {
        this.subMenuPoppers.forEach((element) => {
            element.instance.state.elements.popper.style.display = "none";
            element.instance.update();
        });
    }

    closePoppers() {
        this.subMenuPoppers.forEach((element) => {
            element.hide();
        });
    }
}

const slideUp = (target, duration = 300) => {
    const { parentElement } = target;
    parentElement.classList.remove("open");
    target.style.transitionProperty = "height, margin, padding";
    target.style.transitionDuration = `${duration}ms`;
    target.style.boxSizing = "border-box";
    target.style.height = `${target.offsetHeight}px`;
    target.offsetHeight;
    target.style.overflow = "hidden";
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.style.paddingBottom = 0;
    target.style.marginTop = 0;
    target.style.marginBottom = 0;
    window.setTimeout(() => {
        target.style.display = "none";
        target.style.removeProperty("height");
        target.style.removeProperty("padding-top");
        target.style.removeProperty("padding-bottom");
        target.style.removeProperty("margin-top");
        target.style.removeProperty("margin-bottom");
        target.style.removeProperty("overflow");
        target.style.removeProperty("transition-duration");
        target.style.removeProperty("transition-property");
    }, duration);
};
const slideDown = (target, duration = 300) => {
    const { parentElement } = target;
    parentElement.classList.add("open");
    target.style.removeProperty("display");
    let { display } = window.getComputedStyle(target);
    if (display === "none") display = "block";
    target.style.display = display;
    const height = target.offsetHeight;
    target.style.overflow = "hidden";
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.style.paddingBottom = 0;
    target.style.marginTop = 0;
    target.style.marginBottom = 0;
    target.offsetHeight;
    target.style.boxSizing = "border-box";
    target.style.transitionProperty = "height, margin, padding";
    target.style.transitionDuration = `${duration}ms`;
    target.style.height = `${height}px`;
    target.style.removeProperty("padding-top");
    target.style.removeProperty("padding-bottom");
    target.style.removeProperty("margin-top");
    target.style.removeProperty("margin-bottom");
    window.setTimeout(() => {
        target.style.removeProperty("height");
        target.style.removeProperty("overflow");
        target.style.removeProperty("transition-property");
        target.style.removeProperty("transition-duration");
    }, duration);
};
const slideToggle = (target, duration = 300) => {
    const html = document.querySelector("html");
    if (
        !(
            (html.getAttribute("data-nav-style") === "menu-hover" && html.getAttribute("data-toggled") === "menu-hover-closed" && window.innerWidth >= 992) ||
            (html.getAttribute("data-nav-style") === "icon-hover" && html.getAttribute("data-toggled") === "icon-hover-closed" && window.innerWidth >= 992)
        ) &&
        target &&
        target.nodeType !== 3
    ) {
        if (window.getComputedStyle(target).display === "none") return slideDown(target, duration);
        return slideUp(target, duration);
    }
};

const PoppersInstance = new Poppers();

/**
 * wait for the current animation to finish and update poppers position
 */
const updatePoppersTimeout = () => {
    setTimeout(() => {
        PoppersInstance.updatePoppers();
    }, 300);
};

const defaultOpenMenus = document.querySelectorAll(".slide.has-sub.open");

defaultOpenMenus.forEach((element) => {
    element.lastElementChild.style.display = "block";
});

/**
 * handle top level submenu click
 */
const firstLevelItems = document.querySelectorAll(".nav > ul > .slide.has-sub > a");
firstLevelItems.forEach((element) => {
    element.addEventListener("click", () => {
        const html = document.querySelector("html");
        if (
            !(
                (html.getAttribute("data-nav-style") === "menu-hover" && html.getAttribute("data-toggled") === "menu-hover-closed" && window.innerWidth >= 992) ||
                (html.getAttribute("data-nav-style") === "icon-hover" && html.getAttribute("data-toggled") === "icon-hover-closed" && window.innerWidth >= 992)
            )
        ) {
            const parentMenu = element.closest(".nav.sub-open");
            if (parentMenu)
                parentMenu.querySelectorAll(":scope > ul > .slide.has-sub > a").forEach((el) => {
                    // window.getComputedStyle(el.nextElementSibling).display !== "none" &&
                    if (el.nextElementSibling.style.display === "block" || window.getComputedStyle(el.nextElementSibling).display === "block") {
                        slideUp(el.nextElementSibling);
                    }
                });
            slideToggle(element.nextElementSibling);
        }
    });
});

/**
 * handle inner submenu click
 */
const innerLevelItems = document.querySelectorAll(".nav > ul > .slide.has-sub .slide.has-sub > a");
innerLevelItems.forEach((element) => {
    const html = document.querySelector("html");
    // if ((html.getAttribute('data-nav-style') !== "menu-hover" || html.getAttribute('data-nav-style') !== "icon-hover") ) {
    element.addEventListener("click", () => {
        const innerMenu = element.closest(".slide-menu");
        if (innerMenu)
            innerMenu.querySelectorAll(":scope .slide.has-sub > a").forEach((el) => {
                // window.getComputedStyle(el.nextElementSibling).display !== "none" &&
                // ref || window.getComputedStyle(el.nextElementSibling).display === "block"
                if (el.nextElementSibling && el.nextElementSibling?.style.display === "block") {
                    slideUp(el.nextElementSibling);
                }
            });
        slideToggle(element.nextElementSibling);
    });
    // }
});

/**
 * menu styles
 */
(() => {
    const html = document.querySelector("html");
    const headerToggleBtn = document.querySelector(".sidemenu-toggle");
    headerToggleBtn.addEventListener("click", toggleSidemenu);
    const mainContent = document.querySelector(".main-content");
    if (window.innerWidth <= 992) {
        mainContent.addEventListener("click", menuClose);
    } else {
        mainContent.removeEventListener("click", menuClose);
    }

    setNavActive();
    if (html.getAttribute("data-nav-layout") === "horizontal" && window.innerWidth >= 992) {
        clearNavDropdown();
        mainContent.addEventListener("click", clearNavDropdown);
    } else {
        mainContent.removeEventListener("click", clearNavDropdown);
    }

    window.addEventListener("resize", ResizeMenu);
    switcherArrowFn();

    if (
        !localStorage.getItem("valexlayout") &&
        !localStorage.getItem("valexnavstyles") &&
        !localStorage.getItem("valexverticalstyles") &&
        !document.querySelector(".landing-body") &&
        document.querySelector("html").getAttribute("data-nav-layout") !== "horizontal"
    ) {
        // To enable sidemenu layout styles
        // iconTextFn();
        // detachedFn();
        // closedSidemenuFn();
        // doubletFn();
        if (!html.getAttribute("data-vertical-style") && !html.getAttribute("data-nav-style")) {
            iconOverayFn();
        }
    }

    /* Horizontal Start */
    if (html.getAttribute("data-nav-layout") === "horizontal" && !document.querySelector(".landing-body") === true) {
        setTimeout(() => {
            horizontalClickFn();
        }, 1000);
    }
    /* Horizontal End */

    toggleSidemenu();

    if ((html.getAttribute("data-nav-style") === "menu-hover" || html.getAttribute("data-nav-style") === "icon-hover") && window.innerWidth >= 992) {
        clearNavDropdown();
    }
    if (window.innerWidth < 992) {
        html.setAttribute("data-toggled", "close");
    }
})();

function ResizeMenu() {
    const html = document.querySelector("html");
    const mainContent = document.querySelector(".main-content");
    const WindowPreSize = [window.innerWidth];

    WindowPreSize.push(window.innerWidth);
    if (WindowPreSize.length > 2) {
        WindowPreSize.shift();
    }
    if (WindowPreSize.length > 1) {
        if (WindowPreSize[WindowPreSize.length - 1] < 992 && WindowPreSize[WindowPreSize.length - 2] >= 992) {
            // less than 992;
            mainContent.addEventListener("click", menuClose);
            setNavActive();
            toggleSidemenu();
            mainContent.removeEventListener("click", clearNavDropdown);
        }

        if (WindowPreSize[WindowPreSize.length - 1] >= 992 && WindowPreSize[WindowPreSize.length - 2] < 992) {
            // greater than 992
            mainContent.removeEventListener("click", menuClose);
            toggleSidemenu();
            if (html.getAttribute("data-nav-layout") === "horizontal") {
                clearNavDropdown();
                mainContent.addEventListener("click", clearNavDropdown);
            } else {
                mainContent.removeEventListener("click", clearNavDropdown);
            }
            html.removeAttribute("data-toggled");
        }
    }
    checkHoriMenu();
}
function menuClose() {
    const html = document.querySelector("html");
    html.setAttribute("data-toggled", "close");
    document.querySelector("#responsive-overlay").classList.remove("active");
}
function toggleSidemenu() {
    const html = document.querySelector("html");
    const sidemenuType = html.getAttribute("data-nav-layout");
    const sidebar = document.getElementById("sidebar");
    const mainContentDiv = document.querySelector(".main-content");

    if (window.innerWidth >= 992) {
        if (sidemenuType === "vertical") {
            sidebar.removeEventListener("mouseenter", mouseEntered);
            sidebar.removeEventListener("mouseleave", mouseLeave);
            sidebar.removeEventListener("click", icontextOpen);
            mainContentDiv.removeEventListener("click", icontextClose);
            const sidemenulink = document.querySelectorAll(".main-menu li > .side-menu__item");
            sidemenulink.forEach((ele) => ele.removeEventListener("click", doubleClickFn));

            const verticalStyle = html.getAttribute("data-vertical-style");
            switch (verticalStyle) {
                // closed
                case "closed":
                    html.removeAttribute("data-nav-style");
                    if (html.getAttribute("data-toggled") === "close-menu-close") {
                        html.removeAttribute("data-toggled");
                    } else {
                        html.setAttribute("data-toggled", "close-menu-close");
                    }
                    break;
                // icon-overlay
                case "overlay":
                    html.removeAttribute("data-nav-style");
                    if (html.getAttribute("data-toggled") === "icon-overlay-close") {
                        html.removeAttribute("data-toggled", "icon-overlay-close");
                        sidebar.removeEventListener("mouseenter", mouseEntered);
                        sidebar.removeEventListener("mouseleave", mouseLeave);
                    } else {
                        if (window.innerWidth >= 992) {
                            if (!localStorage.getItem("valexlayout")) {
                                html.setAttribute("data-toggled", "icon-overlay-close");
                            }
                            sidebar.addEventListener("mouseenter", mouseEntered);
                            sidebar.addEventListener("mouseleave", mouseLeave);
                        } else {
                            sidebar.removeEventListener("mouseenter", mouseEntered);
                            sidebar.removeEventListener("mouseleave", mouseLeave);
                        }
                    }
                    break;
                // icon-text
                case "icontext":
                    html.removeAttribute("data-nav-style");
                    if (html.getAttribute("data-toggled") === "icon-text-close") {
                        html.removeAttribute("data-toggled", "icon-text-close");
                        sidebar.removeEventListener("click", icontextOpen);
                        mainContentDiv.removeEventListener("click", icontextClose);
                    } else {
                        html.setAttribute("data-toggled", "icon-text-close");
                        if (window.innerWidth >= 992) {
                            sidebar.addEventListener("click", icontextOpen);
                            mainContentDiv.addEventListener("click", icontextClose);
                        } else {
                            sidebar.removeEventListener("click", icontextOpen);
                            mainContentDiv.removeEventListener("click", icontextClose);
                        }
                    }
                    break;
                // doublemenu
                case "doublemenu":
                    html.removeAttribute("data-nav-style");
                    if (html.getAttribute("data-toggled") === "double-menu-open") {
                        html.setAttribute("data-toggled", "double-menu-close");
                        if (document.querySelector(".slide-menu")) {
                            const slidemenu = document.querySelectorAll(".slide-menu");
                            slidemenu.forEach((e) => {
                                if (e.classList.contains("double-menu-active")) {
                                    e.classList.remove("double-menu-active");
                                }
                            });
                        }
                    } else {
                        const sidemenu = document.querySelector(".side-menu__item.active");
                        if (sidemenu) {
                            html.setAttribute("data-toggled", "double-menu-open");
                            if (sidemenu.nextElementSibling) {
                                sidemenu.nextElementSibling.classList.add("double-menu-active");
                            } else {
                                document.querySelector("html").setAttribute("data-toggled", "double-menu-close");
                            }
                        }
                    }

                    doublemenu();
                    break;
                // detached
                case "detached":
                    html.removeAttribute("data-nav-style");
                    if (html.getAttribute("data-toggled") === "detached-close") {
                        html.removeAttribute("data-toggled", "detached-close");
                        sidebar.removeEventListener("mouseenter", mouseEntered);
                        sidebar.removeEventListener("mouseleave", mouseLeave);
                    } else {
                        html.setAttribute("data-toggled", "detached-close");
                        if (window.innerWidth >= 992) {
                            sidebar.addEventListener("mouseenter", mouseEntered);
                            sidebar.addEventListener("mouseleave", mouseLeave);
                        } else {
                            sidebar.removeEventListener("mouseenter", mouseEntered);
                            sidebar.removeEventListener("mouseleave", mouseLeave);
                        }
                    }
                    break;
                // default
                case "default":
                    iconOverayFn();
                    html.removeAttribute("data-toggled");

                // for making any vertical style as default
                // default:
                // iconOverayFn();
                // html.removeAttribute('data-toggled');
            }
            const menuclickStyle = html.getAttribute("data-nav-style");
            switch (menuclickStyle) {
                case "menu-click":
                    if (html.getAttribute("data-toggled") === "menu-click-closed") {
                        html.removeAttribute("data-toggled");
                    } else {
                        html.setAttribute("data-toggled", "menu-click-closed");
                    }
                    break;
                case "menu-hover":
                    if (html.getAttribute("data-toggled") === "menu-hover-closed") {
                        html.removeAttribute("data-toggled");
                        setNavActive();
                    } else {
                        html.setAttribute("data-toggled", "menu-hover-closed");
                        clearNavDropdown();
                    }
                    break;
                case "icon-click":
                    if (html.getAttribute("data-toggled") === "icon-click-closed") {
                        html.removeAttribute("data-toggled");
                    } else {
                        html.setAttribute("data-toggled", "icon-click-closed");
                    }
                    break;
                case "icon-hover":
                    if (html.getAttribute("data-toggled") === "icon-hover-closed") {
                        html.removeAttribute("data-toggled");
                        setNavActive();
                    } else {
                        html.setAttribute("data-toggled", "icon-hover-closed");
                        clearNavDropdown();
                    }
                    break;
                //for making any horizontal style as default
                default:
            }
        }
    } else {
        if (html.getAttribute("data-toggled") === "close") {
            html.setAttribute("data-toggled", "open");
            const i = document.createElement("div");
            i.id = "responsive-overlay";
            setTimeout(() => {
                if (document.querySelector("html").getAttribute("data-toggled") === "open") {
                    document.querySelector("#responsive-overlay").classList.add("active");
                    document.querySelector("#responsive-overlay").addEventListener("click", () => {
                        document.querySelector("#responsive-overlay").classList.remove("active");
                        console.log(i.id);
                        menuClose();
                    });
                }
                window.addEventListener("resize", () => {
                    if (window.screen.width >= 992) {
                        document.querySelector("#responsive-overlay").classList.remove("active");
                    }
                });
            }, 100);
        } else {
            html.setAttribute("data-toggled", "close");
        }
    }
}
function setNavActive() {
    let currentPath = window.location.pathname.split("/")[0];

    currentPath = location.pathname === "/" ? "index.html" : location.pathname.substring(1);
    currentPath = currentPath.substring(currentPath.lastIndexOf("/") + 1);
    const sidemenuItems = document.querySelectorAll(".side-menu__item");
    sidemenuItems.forEach((e) => {
        if (currentPath === "/") {
            currentPath = "index.html";
        }
        if (e.getAttribute("href") === currentPath) {
            e.classList.add("active");
            e.parentElement.classList.add("active");
            let parent = e.closest("ul");
            let parentNotMain = e.closest("ul:not(.main-menu)");
            let hasParent = true;
            // while (hasParent) {
            if (parent) {
                parent.classList.add("active");
                parent.previousElementSibling.classList.add("active");
                parent.parentElement.classList.add("active");

                if (parent.parentElement.classList.contains("has-sub")) {
                    const elemrntRef = parent.parentElement.parentElement.parentElement;
                    elemrntRef.classList.add("open", "active");
                    elemrntRef.firstElementChild.classList.add("active");
                    elemrntRef.children[1].style.display = "block";
                    Array.from(elemrntRef.children[1].children).map((element) => {
                        if (element.classList.contains("active")) {
                            element.children[1].style.display = "block";
                        }
                    });
                }

                if (parent.classList.contains("child1")) {
                    slideDown(parent);
                }
                parent = parent.parentElement.closest("ul");
                //
                if (parent && parent.closest("ul:not(.main-menu)")) {
                    parentNotMain = parent.closest("ul:not(.main-menu)");
                }
                if (!parentNotMain) hasParent = false;
            } else {
                hasParent = false;
            }
        }
        // }
    });
}
function clearNavDropdown() {
    const sidemenus = document.querySelectorAll("ul.slide-menu");
    sidemenus.forEach((e) => {
        let parent = e.closest("ul");
        let parentNotMain = e.closest("ul:not(.main-menu)");
        if (parent) {
            let hasParent = parent.closest("ul.main-menu");
            while (hasParent) {
                parent.classList.add("active");
                slideUp(parent);
                //
                parent = parent.parentElement.closest("ul");
                parentNotMain = parent.closest("ul:not(.main-menu)");
                if (!parentNotMain) hasParent = false;
            }
        }
    });
}
function switcherArrowFn() {
    const slideLeft = document.querySelector(".slide-left");
    const slideRight = document.querySelector(".slide-right");

    // used to remove is-expanded class and remove class on clicking arrow buttons
    function slideClick() {
        const slide = document.querySelectorAll(".slide");
        const slideMenu = document.querySelectorAll(".slide-menu");
        slide.forEach((element, _index) => {
            if (element.classList.contains("is-expanded") === true) {
                element.classList.remove("is-expanded");
            }
        });
        slideMenu.forEach((element, _index) => {
            if (element.classList.contains("open") === true) {
                element.classList.remove("open");
                element.style.display = "none";
            }
        });
    }

    checkHoriMenu();

    slideLeft.addEventListener("click", () => {
        const menuNav = document.querySelector(".main-menu");
        const mainContainer1 = document.querySelector(".main-sidebar");
        const marginLeftValue = Math.ceil(Number(window.getComputedStyle(menuNav).marginLeft.split("px")[0]));
        const marginRightValue = Math.ceil(Number(window.getComputedStyle(menuNav).marginRight.split("px")[0]));
        const mainContainer1Width = mainContainer1.offsetWidth;
        if (menuNav.scrollWidth > mainContainer1.offsetWidth) {
            if (!(document.querySelector("html").getAttribute("dir") === "rtl")) {
                if (marginLeftValue < 0 && !(Math.abs(marginLeftValue) < mainContainer1Width)) {
                    menuNav.style.marginRight = 0;
                    menuNav.style.marginLeft = `${Number(menuNav.style.marginLeft.split("px")[0]) + Math.abs(mainContainer1Width)}px`;
                    slideRight.classList.remove("d-none");
                } else if (marginLeftValue >= 0) {
                    menuNav.style.marginLeft = "0px";
                    slideLeft.classList.add("d-none");
                    slideRight.classList.remove("d-none");
                } else {
                    menuNav.style.marginLeft = "0px";
                    slideLeft.classList.add("d-none");
                    slideRight.classList.remove("d-none");
                }
            } else {
                if (marginRightValue < 0 && !(Math.abs(marginRightValue) < mainContainer1Width)) {
                    menuNav.style.marginLeft = 0;
                    menuNav.style.marginRight = `${Number(menuNav.style.marginRight.split("px")[0]) + Math.abs(mainContainer1Width)}px`;
                    slideRight.classList.remove("d-none");
                } else if (marginRightValue >= 0) {
                    menuNav.style.marginRight = "0px";
                    slideLeft.classList.add("d-none");
                    slideRight.classList.remove("d-none");
                } else {
                    menuNav.style.marginRight = "0px";
                    slideLeft.classList.add("d-none");
                    slideRight.classList.remove("d-none");
                }
            }
        } else {
            document.querySelector(".main-menu").style.marginLeft = "0px";
            document.querySelector(".main-menu").style.marginRight = "0px";
            slideLeft.classList.add("d-none");
        }

        const element = document.querySelector(".main-menu > .slide.open");
        const element1 = document.querySelector(".main-menu > .slide.open >ul");
        if (element) {
            element.classList.remove("open");
        }
        if (element1) {
            element1.style.display = "none";
        }

        slideClick();
        return;
        //
    });
    slideRight.addEventListener("click", () => {
        const menuNav = document.querySelector(".main-menu");
        const mainContainer1 = document.querySelector(".main-sidebar");
        const marginLeftValue = Math.ceil(Number(window.getComputedStyle(menuNav).marginLeft.split("px")[0]));
        const marginRightValue = Math.ceil(Number(window.getComputedStyle(menuNav).marginRight.split("px")[0]));
        const check = menuNav.scrollWidth - mainContainer1.offsetWidth;
        let mainContainer1Width = mainContainer1.offsetWidth;

        if (menuNav.scrollWidth > mainContainer1.offsetWidth) {
            if (!(document.querySelector("html").getAttribute("dir") === "rtl")) {
                if (Math.abs(check) > Math.abs(marginLeftValue)) {
                    menuNav.style.marginRight = 0;
                    if (!(Math.abs(check) > Math.abs(marginLeftValue) + mainContainer1Width)) {
                        mainContainer1Width = Math.abs(check) - Math.abs(marginLeftValue);
                        slideRight.classList.add("d-none");
                    }
                    menuNav.style.marginLeft = `${Number(menuNav.style.marginLeft.split("px")[0]) - Math.abs(mainContainer1Width)}px`;
                    slideLeft.classList.remove("d-none");
                }
            } else {
                if (Math.abs(check) > Math.abs(marginRightValue)) {
                    menuNav.style.marginLeft = 0;
                    if (!(Math.abs(check) > Math.abs(marginRightValue) + mainContainer1Width)) {
                        mainContainer1Width = Math.abs(check) - Math.abs(marginRightValue);
                        slideRight.classList.add("d-none");
                    }
                    menuNav.style.marginRight = `${Number(menuNav.style.marginRight.split("px")[0]) - Math.abs(mainContainer1Width)}px`;
                    slideLeft.classList.remove("d-none");
                }
            }
        }

        const element = document.querySelector(".main-menu > .slide.open");
        const element1 = document.querySelector(".main-menu > .slide.open >ul");
        if (element) {
            element.classList.remove("open");
        }
        if (element1) {
            element1.style.display = "none";
        }

        slideClick();
        return;
    });
}
function checkHoriMenu() {
    const menuNav = document.querySelector(".main-menu");
    const mainContainer1 = document.querySelector(".main-sidebar");
    const slideLeft = document.querySelector(".slide-left");
    const slideRight = document.querySelector(".slide-right");
    const marginLeftValue = Math.ceil(Number(window.getComputedStyle(menuNav).marginLeft.split("px")[0]));
    const marginRightValue = Math.ceil(Number(window.getComputedStyle(menuNav).marginRight.split("px")[0]));
    const check = menuNav.scrollWidth - mainContainer1.offsetWidth;
    // Show/Hide the arrows
    if (menuNav.scrollWidth > mainContainer1.offsetWidth) {
        slideRight.classList.remove("d-none");
        slideLeft.classList.add("d-none");
    } else {
        slideRight.classList.add("d-none");
        slideLeft.classList.add("d-none");
        menuNav.style.marginLeft = "0px";
        menuNav.style.marginRight = "0px";
    }
    if (!(document.querySelector("html").getAttribute("dir") === "rtl")) {
        // LTR check the width and adjust the menu in screen
        if (menuNav.scrollWidth > mainContainer1.offsetWidth) {
            if (Math.abs(check) < Math.abs(marginLeftValue)) {
                menuNav.style.marginLeft = `${-check}px`;
                slideLeft.classList.remove("d-none");
                slideRight.classList.add("d-none");
            }
        }
        if (marginLeftValue === 0) {
            slideLeft.classList.add("d-none");
        } else {
            slideLeft.classList.remove("d-none");
        }
    } else {
        // RTL check the width and adjust the menu in screen
        if (menuNav.scrollWidth > mainContainer1.offsetWidth) {
            if (Math.abs(check) < Math.abs(marginRightValue)) {
                menuNav.style.marginRight = `${-check}px`;
                slideLeft.classList.remove("d-none");
                slideRight.classList.add("d-none");
            }
        }
        if (marginRightValue === 0) {
            slideLeft.classList.add("d-none");
        } else {
            slideLeft.classList.remove("d-none");
        }
    }
    if (marginLeftValue !== 0 || marginRightValue !== 0) {
        slideLeft.classList.remove("d-none");
    }
}

//

["switcher-icon-click", "switcher-icon-hover", "switcher-horizontal"].map((element) => {
    if (document.getElementById(element)) {
        document.getElementById(element).addEventListener("click", () => {
            const menuNav = document.querySelector(".main-menu");
            const mainContainer1 = document.querySelector(".main-sidebar");
            setTimeout(() => {
                if (menuNav.offsetWidth > mainContainer1.offsetWidth) {
                    document.getElementById("slide-right").classList.remove("d-none");
                } else {
                    document.getElementById("slide-right").classList.add("d-none");
                }
            }, 100);
        });
    }
});

// double-menu click toggle start
function doublemenu() {
    if (window.innerWidth >= 992) {
        const sidemenulink = document.querySelectorAll(".main-menu > li > .side-menu__item");
        sidemenulink.forEach((ele) => {
            ele.addEventListener("click", doubleClickFn);
        });
    }
}
function doubleClickFn() {
    const html = document.querySelector("html");
    let checkElement = this.nextElementSibling;
    if (checkElement) {
        if (!checkElement.classList.contains("double-menu-active")) {
            if (document.querySelector(".slide-menu")) {
                const slidemenu = document.querySelectorAll(".slide-menu");
                slidemenu.forEach((e) => {
                    if (e.classList.contains("double-menu-active")) {
                        e.classList.remove("double-menu-active");
                        html.setAttribute("data-toggled", "double-menu-close");
                    }
                });
            }
            checkElement.classList.add("double-menu-active");
            html.setAttribute("data-toggled", "double-menu-open");
        }
    }
}
// double-menu click toggle end

window.addEventListener("unload", () => {
    const mainContent = document.querySelector(".main-content");
    mainContent.removeEventListener("click", clearNavDropdown);
    window.removeEventListener("resize", ResizeMenu);
    const sidemenulink = document.querySelectorAll(".main-menu li > .side-menu__item");
    sidemenulink.forEach((ele) => ele.removeEventListener("click", doubleClickFn));
});

// for menu scroll to top active page
const customScrollTop = () => {
    document.querySelectorAll(".side-menu__item").forEach((ele) => {
        if (ele.classList.contains("active")) {
            const elemRect = ele.getBoundingClientRect();
            if (ele.children[0] && ele.parentElement.classList.contains("has-sub") && elemRect.top > 435) {
                ele.scrollIntoView({ behavior: "smooth" });
            }
        }
    });
};
setTimeout(() => {
    customScrollTop();
}, 300);
// for menu scroll to top active page

// for menu click active close
const MAIN_CONTENT = document.querySelector(".main-content");
MAIN_CONTENT.addEventListener("click", () => {
    document.querySelectorAll(".slide-menu").forEach((ele) => {
        if (document.querySelector("html").getAttribute("data-toggled") === "menu-click-closed" || document.querySelector("html").getAttribute("data-toggled") === "icon-click-closed") {
            ele.style.display = "none";
        }
    });
});
// for menu click active close
