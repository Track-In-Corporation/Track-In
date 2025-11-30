export class Toast {
    static TIME_MS = 5000;
    static element = document.querySelector("[data-toast-component]");

    static show(heading, description, mode) {
        const title = this.element.querySelector("[data-title]");
        const subtitle = this.element.querySelector("[data-subtitle]");

        this.element.dataset.mode = mode;
        this.element.dataset.state = "open";

        title.textContent = heading;
        subtitle.textContent = description;

        setTimeout(() => {
            this.element.dataset.state = "closed";
        }, this.TIME_MS);
    }

    static success(title, description) {
        this.show(title, description, "success");
    }

    static error(title, description) {
        this.show(title, description, "error");
    }
}
