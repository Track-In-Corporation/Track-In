import { API_URL } from "../config/constants";
import { QueryClient } from "../query-client";

async function renderTransactionDetails() {
    const container = document.querySelector(
        "[data-transaction-detail-container]"
    );
    const windowComponent = document.querySelector("[data-window-component]");
    const id = windowComponent?.dataset.content;
    if (!id || !container) return;

    container.innerHTML = "";
    container.dataset.isLoading = true;
    try {
        // Fetch partial page
        const res = await fetch(`${API_URL}/transactions/${id}`);
        const json = await res.json();
        if (!res.ok) throw new Error("Request did not succeed");

        // Append html string
        const data = json.data;
        container.innerHTML = data;
    } catch (err) {
        console.log(err);
    }
    container.dataset.isLoading = false;
}

QueryClient.subscribe("transaction", renderTransactionDetails);
