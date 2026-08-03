document.addEventListener("DOMContentLoaded", () => {
    const forms = document.querySelectorAll("[data-search-form]");

    forms.forEach((form) => {
        const input = form.querySelector("[data-search-input]");

        if (!input) return;

        let timeout;

        input.addEventListener("input", () => {
            clearTimeout(timeout);

            timeout = setTimeout(() => {
                form.submit();
            }, 1000);
        });
    });
});