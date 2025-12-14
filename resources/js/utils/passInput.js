document.querySelectorAll("[data-password-toggle]").forEach((wrapper) => {
    const input = wrapper.querySelector("input");
    const icon = wrapper.querySelector("iconify-icon");

    wrapper.querySelector("button").addEventListener("click", () => {
        console.log("ahh");
        const show = input.type === "password";
        input.type = show ? "text" : "password";
        icon.setAttribute(
            "icon",
            show ? "mdi:eye-off-outline" : "mdi:eye-outline"
        );
    });
});
