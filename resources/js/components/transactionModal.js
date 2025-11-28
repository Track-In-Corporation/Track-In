document.addEventListener("DOMContentLoaded", () => {
    const sideModal = document.querySelector(".sideModalTransaction");
    const sideModalButton = document.querySelector(
        ".sideModalTransactionButton"
    );
    const sideContent = document.querySelector(".sideModalTransactionContent");
    const backButton = document.querySelector(".backButton");

    const closeSideModal = () => {
        sideModal.classList.add("opacity-0", "pointer-events-none");
        sideContent.classList.add("translate-x-full");
    };

    const openSideModal = () => {
        sideModal.classList.remove("opacity-0", "pointer-events-none");
        sideContent.classList.remove("translate-x-full");
    };

    sideModalButton.addEventListener("click", function () {
        console.log("ahh");
        sideModal.classList.remove("opacity-0", "pointer-events-none");
        sideContent.classList.remove("translate-x-full");
    });

    // cancelButton.addEventListener("click", closeSideModal);
    // successButton.addEventListener("click", function () {
    //     closeSideModal();

    //     // More Logic Here
    // });

    sideModal.addEventListener("click", function (e) {
        console.log("ahahh");
        if (e.target === sideModal) {
            closeSideModal();
        }
    });

    backButton.addEventListener("click", function (e) {
        closeSideModal();
    });
});
