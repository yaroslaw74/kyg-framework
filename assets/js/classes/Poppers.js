import { PopperObject } from "./PopperObject.js";

export class Poppers {
    subMenuPoppers = [];

    constructor() {
        this.init();
    }

    init() {
        const SLIDE_HAS_SUB = document.querySelectorAll(".nav > ul > .slide.has-sub");
        SLIDE_HAS_SUB.forEach((element) => {
            this.subMenuPoppers.push(new PopperObject(element, element.lastElementChild));
            this.closePoppers();
        });
    }

    togglePopper(target) {
        if (window.getComputedStyle(target).visibility === "hidden" && window.getComputedStyle(target).visibility === undefined) {
            target.style.visibility = "visible";
        } else {
            target.style.visibility = "hidden";
        }
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
