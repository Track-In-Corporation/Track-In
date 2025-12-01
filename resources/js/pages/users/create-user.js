import { API } from "../../utils/api";

window.addEventListener(
    "click",
    (e) => {
        const submitButton = e.target.closest(
            "[data-create-user-modal-submit]"
        );
        const createButton = e.target.closest("[data-create-user-button]");
        const modal = e.target.closest("[data-create-user-modal-component]");
        if (createButton) handleOpenModal(e);
        if (modal) handleCloseModal(e);
        if (submitButton) handleCreateUser(e);
    },
    true
);

const handleOpenModal = (e) => {
    const modal = document.querySelector("[data-create-user-modal-component]");
    modal.dataset.state = "open";
};

const handleCloseModal = (e) => {
    const modal = document.querySelector("[data-create-user-modal-component]");
    const clickedOutside = !e.target.closest(
        "[data-create-user-modal-content]"
    );
    if (clickedOutside) {
        e.stopPropagation();
        modal.dataset.state = "close";
    }
};

const errorTemplate = (error) => `
  <div data-form-error class="flex items-center gap-2 mt-2 text-red-400">
      <svg class="fill-red-400" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
          <path
              d="M11.953 2C6.465 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.493 2 11.953 2zM12 20c-4.411 0-8-3.589-8-8s3.567-8 7.953-8C16.391 4 20 7.589 20 12s-3.589 8-8 8z">
          </path>
          <path d="M11 7h2v7h-2zm0 8h2v2h-2z"></path>
      </svg>
      <p class="text-sm font-normal">
          ${error}
      </p>
  </div>
`;

const handleCreateUser = async (e) => {
    const form = document.querySelector("[data-create-user-modal-content]");
    const inputs = form.querySelectorAll("input");
    const errorElements = form.querySelectorAll("[data-form-error]");
    if (inputs) {
        Array.from(inputs).forEach((input) => (input.dataset.state = "none"));
    }
    if (errorElements) Array.from(errorElements).forEach((el) => el.remove());
    try {
        const payload = {};
        Array.from(inputs).forEach((input) => {
            if (input.name) {
                payload[input.name] = input.value;
            }
        });

        await API.post(`/users`, payload);
        window.location.reload();
    } catch (err) {
        const errors = err.data.errors;
        console.log(JSON.stringify(err));
        Object.entries(errors).forEach(([name, [message]]) => {
            const inputEl = Array.from(inputs).find((i) => i.name === name);
            const errorHTML = errorTemplate(message);
            inputEl.insertAdjacentHTML("afterend", errorHTML);
            inputEl.dataset.state = "error";
        });
    }
};
