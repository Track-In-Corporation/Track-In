const modal = document.querySelector(".modal");
const modalButton = document.querySelector(".modalButton");

modalButton.addEventListener("click", function () {
    modal.classList.remove("hidden");
    modal.classList.add("flex");
});

// console.log("ahhh");
