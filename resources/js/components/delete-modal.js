const confirmationModal = document.querySelector("[data-delete-modal]");
const modalDeleteForm = document.querySelector("[data-delete-modal-form]");

window.addEventListener(
    "click",
    (e) => {
        if (!confirmationModal) return;
        const modal = e.target.closest("[data-delete-modal]");
        const deleteBtn = e.target.closest("[data-delete-button]");
        const modalContent = e.target.closest("[data-delete-modal-content]");
        const acceptBtn = e.target.closest("[data-delete-modal-accept]");
        const declineBtn = e.target.closest("[data-delete-modal-decline]");

        if (modal) {
            e.stopPropagation();
        }

        if (deleteBtn) {
            confirmationModal.dataset.state = "open";
            const action = deleteBtn.dataset.action;
            modalDeleteForm.action = action;
            return;
        }

        if (!modalContent || declineBtn) {
            confirmationModal.dataset.state = "closed";
            confirmationModal.dataset.context = "";
            return;
        }

        if (acceptBtn) {
            modalDeleteForm.submit();
        }
    },
    true
);
