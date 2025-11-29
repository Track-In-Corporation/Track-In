const allDropdowns = document.querySelectorAll(
    "[data-input-dropdown-component]"
);
function closeAll() {
    allDropdowns.forEach((dropdown) => {
        dropdown.dataset.state = "closed";
    });
}
document.addEventListener("click", (e) => {
    const target = e.target.closest("[data-input-dropdown-component]");
    if (!target) return closeAll();

    const input = target.querySelector("[data-input-dropdown-storage]");
    const content = e.target.closest("[data-input-dropdown-content]");
    const trigger = e.target.closest("[data-input-dropdown-trigger]");

    if (trigger && target.dataset.state === "open") {
        return closeAll();
    }

    if (content && input) {
        const triggerContent = target.querySelector(
            "[data-input-dropdown-trigger-content]"
        );
        const selected = e.target.closest("[data-input-dropdown-item]")?.dataset
            .inputDropdownItem;

        if (!selected) return;

        // Set value on hidden input and trigger content
        input.value = selected;
        triggerContent.textContent = selected;

        // Update dropdown item state
        const items = target.querySelectorAll("[data-input-dropdown-item]");
        Array.from(items).forEach((item) => {
            item.dataset.inputDropdownState = "inactive";
            if (selected === item.dataset.inputDropdownItem) {
                item.dataset.inputDropdownState = "active";
            }
        });

        target.dataset.state = "closed";
        return;
    }

    target.dataset.state = "open";
});
