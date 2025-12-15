document.addEventListener("DOMContentLoaded", function () {
    const passwordEyeIcon = document.querySelector(".password_eye_icon");

    passwordEyeIcon.addEventListener("click", (e) => {
        const passwordInput = e.target.closest("[data-password-input]");
        if (passwordInput) handleToggleVisibility(e);
    });

    const STATE = {
        OPEN: "oui:eye",
        CLOSED: "oui:eye-closed",
    };
    const handleToggleVisibility = (e) => {
        const passwordInput = e.target.closest("[data-password-input]");
        const icon = passwordInput.querySelector("[data-icon]");
        const input = passwordInput.querySelector("[data-input]");
        icon.icon = icon.icon === STATE.OPEN ? STATE.CLOSED : STATE.OPEN;
        input.type = icon.icon === STATE.OPEN ? "text" : "password";
    };
});
