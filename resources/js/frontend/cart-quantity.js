document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".quantity-input").forEach((input) => {
        let timeout;

        const submitForm = () => {
            clearTimeout(timeout);

            timeout = setTimeout(() => {
                input.closest("form").submit();
            }, 500);
        };

        input.addEventListener("input", submitForm);

        const container = input.parentElement;

        container
            .querySelector(".quantity-increase")
            ?.addEventListener("click", () => {
                input.stepUp();
                submitForm();
            });

        container
            .querySelector(".quantity-decrease")
            ?.addEventListener("click", () => {
                if (Number(input.value) > Number(input.min)) {
                    input.stepDown();
                    submitForm();
                }
            });
    });
});