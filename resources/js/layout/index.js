const layout = document.querySelector(".layout");
const navbar = document.querySelector(".navbar");
const navbarToggle = navbar?.querySelector(".navbar__toggle");
if (navbarToggle) {
    const handleToggle = () => {
        let state = layout.dataset.navbarState;
        layout.dataset.navbarState = state === "open" ? "closed" : "open";
    };

    navbarToggle.addEventListener("click", handleToggle);
}
