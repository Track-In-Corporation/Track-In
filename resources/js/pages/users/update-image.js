import { Toast } from "../../components/toast";
import { API } from "../../utils/api";

// 1. Listens for the click on your UI element
window.addEventListener("click", (e) => {
    const profileWrapper = e.target.closest("[data-profile-picture-input]");
    if (!profileWrapper) return;

    const fileInput = profileWrapper.querySelector("input");
    if (fileInput) {
        fileInput.click();
    }
});

// 2. Listens for when the user actually picks a file
window.addEventListener("change", async (e) => {
    const profileWrapper = e.target.closest("[data-profile-picture-input]");
    if (!profileWrapper) return;

    const fileInput = e.target;
    const file = fileInput.files?.[0];

    if (file) {
        await handleFileUpload(file, profileWrapper);
    }
});

// 3.Prepares data and sends it
async function handleFileUpload(file, wrapperElement) {
    const formData = new FormData();
    formData.append("profile_picture", file);

    const windowComponent = document.querySelector("[data-window-component]");
    const userId = windowComponent?.dataset.content;
    if (!userId) {
        throw new Error("Missing user id on the window component");
    }

    try {
        const response = await API.post(
            `/users/${userId}/profile-picture`,
            formData
        );

        console.log("Upload Success:", response);

        window.location.reload();
    } catch (err) {
        const errorMessage = err.data?.errors?.profile_picture?.[0];
        Toast.error(
            "Oops, Something Went Wrong!",
            errorMessage || "Terjadi sebuah masalah yang tidak terduga"
        );
    }
}
