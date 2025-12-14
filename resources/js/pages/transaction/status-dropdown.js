let dropdown;
const handleClick = (e) => {
    const trigger = e.target.closest("[data-status-dropdown]");
    if (trigger) {
        handleDropdown(e);
    } else {
        handleClose(e);
    }
};

const handleClose = (e) => {
    if (dropdown) {
        dropdown.dataset.state = "closed";
        e.stopPropagation();
        dropdown = undefined;
    }
};

const handleDropdown = (e) => {
    const trigger = e.target.closest("[data-status-dropdown]");
    const content = trigger.querySelector("[data-content]");
    dropdown = trigger;

    if (content.contains(e.target)) {
        return;
    }

    trigger.dataset.state =
        trigger.dataset.state === "open" ? "closed" : "open";
};

window.addEventListener("click", handleClick, true);
