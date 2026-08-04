document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".quantity-input").forEach((input) => {
        let timeout;

        const min = Number(input.min) || 1;
        const max = Number(input.max) || Infinity;


        const container = input.closest(".quantity-selector");

const error = container.querySelector(".quantity-error");


        const showError = (message) => {
            if (!error) return;

            error.textContent = message;

            error.classList.remove("hidden");

            clearTimeout(error.timeout);

            error.timeout = setTimeout(() => {
                error.classList.add("hidden");
            }, 2500);
        };

        const submitForm = () => {
            clearTimeout(timeout);

            timeout = setTimeout(() => {
                input.closest("form").submit();
            }, 500);
        };

        input.addEventListener("input", () => {

            if (Number(input.value) > max) {

                input.value = max;

                showError(`Only ${max} item(s) available.`);
            }

            if (Number(input.value) < min) {

                input.value = min;
            }

            submitForm();
        });

        container
            .querySelector(".quantity-increase")
            ?.addEventListener("click", () => {

                if (Number(input.value) >= max) {

                    showError(`Only ${max} item(s) available.`);

                    return;
                }

                input.stepUp();

                submitForm();
            });

        container
            .querySelector(".quantity-decrease")
            ?.addEventListener("click", () => {

                if (Number(input.value) <= min) {

                    return;
                }

                input.stepDown();

                submitForm();
            });
    });
});