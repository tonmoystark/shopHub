document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("product-filters");

    if (!form) return;

    const searchInput = form.querySelector('input[name="search"]');
    const selects = form.querySelectorAll("select");

    let timeout;

    // Debounced search
    if (searchInput) {
        searchInput.addEventListener("input", () => {
            clearTimeout(timeout);

            timeout = setTimeout(() => {
                form.submit();
            }, 1500);
        });
    }

    // Submit immediately when a filter changes
    selects.forEach((select) => {
        select.addEventListener("change", () => {
            form.submit();
        });
    });
});