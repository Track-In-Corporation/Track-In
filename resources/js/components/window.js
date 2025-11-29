import { QueryClient } from "../query-client";

window.addEventListener("click", (e) => {
    const windowContainer = document.querySelector("[data-window-component]");
    const trigger = e.target.closest("[data-window-trigger]");
    const close = e.target.closest("[data-window-close]");
    if (!windowContainer) return;

    // Handle manual close
    if (close) {
        windowContainer.dataset.windowComponentState = "closed";
        windowContainer.dataset.content = "";
        return;
    }

    // Handle Trigger clicks
    if (trigger) {
        windowContainer.dataset.windowComponentState = "open";
        const content = trigger.dataset.windowTrigger;
        windowContainer.dataset.content = content;

        // publish data to subcribers
        // publisher name is stored in window component
        const publisher = windowContainer.dataset.windowComponent;
        QueryClient.publish(publisher);
        return;
    }

    // Handle window container clicks
    const content = e.target.closest("[data-window-content]");

    // If content exist that means the user is clicking inside the content, so we should not close the modal
    if (!content) {
        windowContainer.dataset.windowComponentState = "closed";
        windowContainer.dataset.content = "";
    }
});
