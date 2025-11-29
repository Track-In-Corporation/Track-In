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

    // 1. Capture the state BEFORE closing everything
    const wasOpen = target?.dataset.state === "open";

    // 2. Now it's safe to close everything (resets the UI)
    closeAll();

    if (!target) return;

    const input = target.querySelector("[data-input-dropdown-storage]");
    const content = e.target.closest("[data-input-dropdown-content]");
    const trigger = e.target.closest("[data-input-dropdown-trigger]");

    // 3. Use the captured variable 'wasOpen' instead of checking the DOM
    if (trigger && wasOpen) {
        return;
    }

    if (content && input) {
        const triggerContent = target.querySelector(
            "[data-input-dropdown-trigger-content]"
        );
        const selected = e.target.closest("[data-input-dropdown-item]")?.dataset
            .inputDropdownItem;

        if (!selected) return;

        input.value = selected;
        triggerContent.textContent = selected;

        const items = target.querySelectorAll("[data-input-dropdown-item]");
        Array.from(items).forEach((item) => {
            item.dataset.inputDropdownState = "inactive";
            if (selected === item.dataset.inputDropdownItem) {
                item.dataset.inputDropdownState = "active";
            }
        });

        return;
    }

    target.dataset.state = "open";
});
