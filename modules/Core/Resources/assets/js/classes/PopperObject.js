import * as Popper from "@popperjs/core";
import ResizeObserver from "resize-observer-polyfill";

export class PopperObject {
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

        document.addEventListener(
            "click",
            (e) => {
                this.clicker(e, this.popperTarget, this.reference);
            },
            false
        );

        const RO = new ResizeObserver(() => {
            this.instance.update();
        });

        RO.observe(this.popperTarget);
        RO.observe(this.reference);
    }

    clicker(event, popperTarget, reference) {
        const SIDEBAR = document.getElementById("sidebar");
        if (SIDEBAR.classList.contains("collapsed") && !popperTarget.contains(event.target) && !reference.contains(event.target)) {
            this.hide();
        }
    }

    hide() {
        this.instance.state.elements.popper.style.visibility = "hidden";
    }
}
