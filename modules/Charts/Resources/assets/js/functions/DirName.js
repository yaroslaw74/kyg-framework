export function DirName() {
    const HTML = document.querySelector("html");
    if (HTML.getAttribute("dir") === "rtl") {
        return "right";
    } else {
        return "left";
    }
}
