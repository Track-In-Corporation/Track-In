let prevPopup;
window.addEventListener(
    "click",
    (e) => {
        const clickedPopup = e.target.closest("[data-profile-popup-component]");

        // If clicked outside → close popup
        if (!clickedPopup && prevPopup) {
            e.preventDefault();
            e.stopPropagation();
            prevPopup.dataset.state = "closed";
            return;
        }

        // Clicked the trigger → toggle popup
        if (e.target.closest("[data-profile-popup-trigger]")) {
            prevPopup = clickedPopup;
            const newState =
                clickedPopup.dataset.state === "open" ? "closed" : "open";
            clickedPopup.dataset.state = newState;
        }
    },
    true
);
