const allDropdowns = document.querySelectorAll("[data-dropdown-component]");
function closeAll() {
    allDropdowns.forEach((dropdown) => {
        dropdown.dataset.state = "closed";
    });
}
document.addEventListener("click", (e) => {
    const target = e.target.closest("[data-dropdown-component]");
    if (!target) {
        return closeAll();
    }

    const content = e.target.closest("[data-dropdown-target]");
    const trigger = e.target.closest("[data-dropdown-trigger]");

    if (trigger && target.dataset.state === "open") {
        return closeAll();
    }

    if (content) {
        target.dataset.active = content.dataset.id;
    }

    target.dataset.state = "open";
});
