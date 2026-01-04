import { PoppersInstance } from "./constants/PoppersInstance.js";
import { slideUp } from "./constants/slideUp.js";
import { slideToggle } from "./constants/slideToggle.js";
import { customScrollTop } from "./constants/customScrollTop.js";

/**
 * wait for the current animation to finish and update poppers position
 */
const _updatePoppersTimeout = () => {
    setTimeout(() => {
        PoppersInstance.updatePoppers();
    }, 300);
};

const DEFAULT_OPEN_MENUS = document.querySelectorAll(".slide.has-sub.open");
DEFAULT_OPEN_MENUS.forEach((element) => {
    element.lastElementChild.style.display = "block";
});

/**
 * handle top level submenu click
 */
const FIRST_LEVEL_ITEMS = document.querySelectorAll(".nav > ul > .slide.has-sub > a");
FIRST_LEVEL_ITEMS.forEach((element) => {
    element.addEventListener("click", () => {
        const HTML = document.querySelector("html");
        if (
            !(
                (HTML.getAttribute("data-nav-style") === "menu-hover" && HTML.getAttribute("data-toggled") === "menu-hover-closed" && window.innerWidth >= 992) ||
                (HTML.getAttribute("data-nav-style") === "icon-hover" && HTML.getAttribute("data-toggled") === "icon-hover-closed" && window.innerWidth >= 992)
            )
        ) {
            const PARENT_MENU = element.closest(".nav.sub-open");
            if (PARENT_MENU)
                PARENT_MENU.querySelectorAll(":scope > ul > .slide.has-sub > a").forEach((el) => {
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
const INNER_LEVEL_ITEMS = document.querySelectorAll(".nav > ul > .slide.has-sub .slide.has-sub > a");
INNER_LEVEL_ITEMS.forEach((element) => {
    // const HTML = document.querySelector("html");
    // if ((HTML.getAttribute('data-nav-style') !== "menu-hover" || HTML.getAttribute('data-nav-style') !== "icon-hover") ) {
    element.addEventListener("click", () => {
        const INNER_MENU = element.closest(".slide-menu");
        if (INNER_MENU)
            INNER_MENU.querySelectorAll(":scope .slide.has-sub > a").forEach((el) => {
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
    const HTML = document.querySelector("html");
    const headerToggleBtn = document.querySelector(".sidemenu-toggle");
    headerToggleBtn.addEventListener("click", toggleSidemenu);
    const mainContent = document.querySelector(".main-content");
    if (window.innerWidth <= 992) {
        mainContent.addEventListener("click", menuClose);
    } else {
        mainContent.removeEventListener("click", menuClose);
    }

    setNavActive();
    if (HTML.getAttribute("data-nav-layout") === "horizontal" && window.innerWidth >= 992) {
        clearNavDropdown();
        mainContent.addEventListener("click", clearNavDropdown);
    } else {
        mainContent.removeEventListener("click", clearNavDropdown);
    }

    window.addEventListener("resize", ResizeMenu);
    switcherArrowFn();

    if (!localStorage.getItem("valexlayout") && !localStorage.getItem("valexnavstyles") && !localStorage.getItem("valexverticalstyles") && !document.querySelector(".landing-body") && HTML.getAttribute("data-nav-layout") !== "horizontal") {
        // To enable sidemenu layout styles
        // iconTextFn();
        // detachedFn();
        // closedSidemenuFn();
        // doubletFn();
        if (!HTML.getAttribute("data-vertical-style") && !HTML.getAttribute("data-nav-style")) {
            iconOverayFn();
        }
    }

    /* Horizontal Start */
    if (HTML.getAttribute("data-nav-layout") === "horizontal" && !document.querySelector(".landing-body") === true) {
        setTimeout(() => {
            horizontalClickFn();
        }, 1000);
    }
    /* Horizontal End */

    toggleSidemenu();

    if ((HTML.getAttribute("data-nav-style") === "menu-hover" || HTML.getAttribute("data-nav-style") === "icon-hover") && window.innerWidth >= 992) {
        clearNavDropdown();
    }
    if (window.innerWidth < 992) {
        HTML.setAttribute("data-toggled", "close");
    }
})();

function ResizeMenu() {
    const HTML = document.querySelector("html");
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
            if (HTML.getAttribute("data-nav-layout") === "horizontal") {
                clearNavDropdown();
                mainContent.addEventListener("click", clearNavDropdown);
            } else {
                mainContent.removeEventListener("click", clearNavDropdown);
            }
            HTML.removeAttribute("data-toggled");
        }
    }
    checkHoriMenu();
}
function toggleSidemenu() {
    const HTML = document.querySelector("html");
    const sidemenuType = HTML.getAttribute("data-nav-layout");
    const sidebar = document.getElementById("sidebar");
    const mainContentDiv = document.querySelector(".main-content");
    const RESPONSIVE_OVERLAY = document.querySelector("#responsive-overlay");

    if (window.innerWidth >= 992) {
        if (sidemenuType === "vertical") {
            sidebar.removeEventListener("mouseenter", mouseEntered);
            sidebar.removeEventListener("mouseleave", mouseLeave);
            sidebar.removeEventListener("click", icontextOpen);
            mainContentDiv.removeEventListener("click", icontextClose);
            const sidemenulink = document.querySelectorAll(".main-menu li > .side-menu__item");
            sidemenulink.forEach((ele) => ele.removeEventListener("click", doubleClickFn));

            const verticalStyle = HTML.getAttribute("data-vertical-style");
            switch (verticalStyle) {
                // closed
                case "closed":
                    HTML.removeAttribute("data-nav-style");
                    if (HTML.getAttribute("data-toggled") === "close-menu-close") {
                        HTML.removeAttribute("data-toggled");
                    } else {
                        HTML.setAttribute("data-toggled", "close-menu-close");
                    }
                    break;
                // icon-overlay
                case "overlay":
                    HTML.removeAttribute("data-nav-style");
                    if (HTML.getAttribute("data-toggled") === "icon-overlay-close") {
                        HTML.removeAttribute("data-toggled", "icon-overlay-close");
                        sidebar.removeEventListener("mouseenter", mouseEntered);
                        sidebar.removeEventListener("mouseleave", mouseLeave);
                    } else {
                        if (window.innerWidth >= 992) {
                            if (!localStorage.getItem("valexlayout")) {
                                HTML.setAttribute("data-toggled", "icon-overlay-close");
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
                    HTML.removeAttribute("data-nav-style");
                    if (HTML.getAttribute("data-toggled") === "icon-text-close") {
                        HTML.removeAttribute("data-toggled", "icon-text-close");
                        sidebar.removeEventListener("click", icontextOpen);
                        mainContentDiv.removeEventListener("click", icontextClose);
                    } else {
                        HTML.setAttribute("data-toggled", "icon-text-close");
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
                    HTML.removeAttribute("data-nav-style");
                    if (HTML.getAttribute("data-toggled") === "double-menu-open") {
                        HTML.setAttribute("data-toggled", "double-menu-close");
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
                            HTML.setAttribute("data-toggled", "double-menu-open");
                            if (sidemenu.nextElementSibling) {
                                sidemenu.nextElementSibling.classList.add("double-menu-active");
                            } else {
                                HTML.setAttribute("data-toggled", "double-menu-close");
                            }
                        }
                    }

                    doublemenu();
                    break;
                // detached
                case "detached":
                    HTML.removeAttribute("data-nav-style");
                    if (HTML.getAttribute("data-toggled") === "detached-close") {
                        HTML.removeAttribute("data-toggled", "detached-close");
                        sidebar.removeEventListener("mouseenter", mouseEntered);
                        sidebar.removeEventListener("mouseleave", mouseLeave);
                    } else {
                        HTML.setAttribute("data-toggled", "detached-close");
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
                    HTML.removeAttribute("data-toggled");

                // for making any vertical style as default
                // default:
                // iconOverayFn();
                // HTML.removeAttribute('data-toggled');
            }
            const menuclickStyle = HTML.getAttribute("data-nav-style");
            switch (menuclickStyle) {
                case "menu-click":
                    if (HTML.getAttribute("data-toggled") === "menu-click-closed") {
                        HTML.removeAttribute("data-toggled");
                    } else {
                        HTML.setAttribute("data-toggled", "menu-click-closed");
                    }
                    break;
                case "menu-hover":
                    if (HTML.getAttribute("data-toggled") === "menu-hover-closed") {
                        HTML.removeAttribute("data-toggled");
                        setNavActive();
                    } else {
                        HTML.setAttribute("data-toggled", "menu-hover-closed");
                        clearNavDropdown();
                    }
                    break;
                case "icon-click":
                    if (HTML.getAttribute("data-toggled") === "icon-click-closed") {
                        HTML.removeAttribute("data-toggled");
                    } else {
                        HTML.setAttribute("data-toggled", "icon-click-closed");
                    }
                    break;
                case "icon-hover":
                    if (HTML.getAttribute("data-toggled") === "icon-hover-closed") {
                        HTML.removeAttribute("data-toggled");
                        setNavActive();
                    } else {
                        HTML.setAttribute("data-toggled", "icon-hover-closed");
                        clearNavDropdown();
                    }
                    break;
                //for making any horizontal style as default
                default:
            }
        }
    } else {
        if (HTML.getAttribute("data-toggled") === "close") {
            HTML.setAttribute("data-toggled", "open");
            const i = document.createElement("div");
            i.id = "responsive-overlay";
            setTimeout(() => {
                if (HTML.getAttribute("data-toggled") === "open") {
                    RESPONSIVE_OVERLAY.classList.add("active");
                    RESPONSIVE_OVERLAY.addEventListener("click", () => {
                        RESPONSIVE_OVERLAY.classList.remove("active");
                        console.log(i.id);
                        menuClose();
                    });
                }
                window.addEventListener("resize", () => {
                    if (window.screen.width >= 992) {
                        RESPONSIVE_OVERLAY.classList.remove("active");
                    }
                });
            }, 100);
        } else {
            HTML.setAttribute("data-toggled", "close");
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
            if (!(HTML.getAttribute("dir") === "rtl")) {
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
            if (!(HTML.getAttribute("dir") === "rtl")) {
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
    if (!(HTML.getAttribute("dir") === "rtl")) {
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
// double-menu click toggle end

window.addEventListener("unload", () => {
    const MAIN_CONTENT = document.querySelector(".main-content");
    MAIN_CONTENT.removeEventListener("click", clearNavDropdown);
    window.removeEventListener("resize", ResizeMenu);
    const SIDEMENU_LINK = document.querySelectorAll(".main-menu li > .side-menu__item");
    SIDEMENU_LINK.forEach((ele) => ele.removeEventListener("click", doubleClickFn));
});

// for menu scroll to top active page
setTimeout(() => {
    customScrollTop();
}, 300);
// for menu scroll to top active page

// for menu click active close
const MAIN_CONTENT = document.querySelector(".main-content");
MAIN_CONTENT.addEventListener("click", () => {
    const SLIDEMENU = document.querySelectorAll(".slide-menu");
    SLIDEMENU.forEach((ele) => {
        const HTML = document.querySelector("html");
        if (HTML.getAttribute("data-toggled") === "menu-click-closed" || HTML.getAttribute("data-toggled") === "icon-click-closed") {
            ele.style.display = "none";
        }
    });
});
// for menu click active close
