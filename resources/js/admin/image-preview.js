document.addEventListener("DOMContentLoaded", () => {
    const imageInputs = document.querySelectorAll("[data-image-input]");

    imageInputs.forEach((input) => {
        input.addEventListener("change", function (e) {
            const file = e.target.files[0];

            if (!file) return;

            const container = input.closest("[data-image-upload]");
            const preview = container?.querySelector("[data-image-preview]");

            if (!preview) return;

            preview.src = URL.createObjectURL(file);
        });
    });
});