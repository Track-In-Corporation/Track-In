import { QueryClient } from "../queryClient";
import { API_URL } from "../config/constants";

async function renderInventoryDetails() {
    try {
        const code =
            document.querySelector("[data-window-component]")?.dataset
                .content || "PRD001";
        if (!code) return;

        const res = await fetch(`${API_URL}/products/${code}`);
        const json = await res.json();
        if (!res.ok) {
            throw new Error("Request did not succeed");
        }

        const data = json.data;
        const container = document.querySelector(
            "[data-product-detail-container]"
        );
        if (container) {
            container.innerHTML = data;
        }
    } catch (err) {
        console.log(err);
    }
}

QueryClient.subscribe("inventory", renderInventoryDetails);
