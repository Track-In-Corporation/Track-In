const profilePopUp = document.querySelector("[data-profile-popup-component]");
function closePopUp() {
    profilePopUp.dataset.state = "closed";
}
document.addEventListener("click", (e) => {
    const target = e.target.closest("[data-profile-popup-component]");

    // 1. Capture the state BEFORE closing everything
    const wasOpen = target?.dataset.state === "open";

    // 2. Now it's safe to close everything (resets the UI)
    closePopUp();

    if (!target) return;

    const popup = target.querySelector("[data-profile-popup-storage]");
    const content = e.target.closest("[data-profile-popup-content]");
    const trigger = e.target.closest("[data-profile-popup-trigger]");

    // 3. Use the captured variable 'wasOpen' instead of checking the DOM
    if (trigger && wasOpen) {
        return;
    }

    if (content && popup) {
        const triggerContent = target.querySelector(
            "[data-profile-popup-trigger-content]"
        );
        const selected = e.target.closest("[data-profile-popup-item]")?.dataset
            .inputDropdownItem;

        if (!selected) return;

        input.value = selected;
        triggerContent.textContent = selected;

        const items = target.querySelectorAll("[data-profile-popup-item]");
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
