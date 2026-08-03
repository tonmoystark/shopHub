document.addEventListener("DOMContentLoaded", () => {

    document.querySelectorAll("[data-image-upload]").forEach(container => {

        const input = container.querySelector("[data-image-input]");
        const dropZone = container.querySelector("[data-drop-zone]");

        if (!input || !dropZone) return;

        function updatePreview(files) {

            const singlePreview = container.querySelector("[data-image-preview]");
            const previewList = container.querySelector("[data-image-preview-list]");

            if (singlePreview) {

                if (!files.length) return;

                singlePreview.src = URL.createObjectURL(files[0]);

                return;
            }

            if (!previewList) return;

            previewList.innerHTML = "";

            files.forEach(file => {

                const img = document.createElement("img");

                img.src = URL.createObjectURL(file);

                img.className =
                    "h-32 w-32 rounded-xl border border-gray-300 object-cover";

                previewList.appendChild(img);

            });

        }

        input.addEventListener("change", () => {
            updatePreview(Array.from(input.files));
        });

        dropZone.addEventListener("dragover", (e) => {
            e.preventDefault();

            dropZone.classList.add(
                "border-blue-500",
                "bg-blue-100"
            );
        });

        dropZone.addEventListener("dragleave", () => {

            dropZone.classList.remove(
                "border-blue-500",
                "bg-blue-100"
            );

        });

        dropZone.addEventListener("drop", (e) => {

            e.preventDefault();

            dropZone.classList.remove(
                "border-blue-500",
                "bg-blue-100"
            );

            input.files = e.dataTransfer.files;

            updatePreview(Array.from(input.files));

        });

    });

});