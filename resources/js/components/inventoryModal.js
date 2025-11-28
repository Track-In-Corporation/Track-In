document.addEventListener("DOMContentLoaded", () => {
    const sideModalInventory = document.querySelector(".sideModalInventory");
    const sideModalInventoryButton = document.querySelector(
        ".sideModalInventoryButton"
    );
    const sideContentInventory = document.querySelector(
        ".sideModalInventoryContent"
    );
    const backButtonInventory = document.querySelector(".backButtonInventory");

    const closeSideModal = () => {
        sideModalInventory.classList.add("opacity-0", "pointer-events-none");
        sideContentInventory.classList.add("translate-x-full");
    };

    const openSideModal = () => {
        sideModalInventory.classList.remove("opacity-0", "pointer-events-none");
        sideContentInventory.classList.remove("translate-x-full");
    };

    sideModalInventoryButton.addEventListener("click", function () {
        sideModalInventory.classList.remove("opacity-0", "pointer-events-none");
        sideContentInventory.classList.remove("translate-x-full");
    });

    // cancelButton.addEventListener("click", closeSideModal);
    // successButton.addEventListener("click", function () {
    //     closeSideModal();

    //     // More Logic Here
    // });

    sideModalInventory.addEventListener("click", function (e) {
        console.log("ahahh");
        if (e.target === sideModalInventory) {
            closeSideModal();
        }
    });

    backButtonInventory.addEventListener("click", function (e) {
        closeSideModal();
    });
});
