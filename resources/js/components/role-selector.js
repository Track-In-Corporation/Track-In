window.addEventListener("click", (e) => {
    const target = e.target.closest("[data-user-role-selector]");
    if (!target) return;

    const selected = e.target.closest("[data-option]");
    const options = target.querySelectorAll("[data-option]");
    const input = target.querySelector("[data-input]");
    if (!selected) return;

    Array.from(options).forEach((o) => (o.dataset.state = "inactive"));
    selected.dataset.state = "active";
    input.value = selected.dataset.option;
});
