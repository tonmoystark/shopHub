document.addEventListener("DOMContentLoaded", () => {

    const quantityInput = document.querySelector(
        'input[name="quantity"]'
    );

    if (!quantityInput) return;

    const unitPriceElement = document.getElementById("unit-price");
    const quantityElement = document.getElementById("summary-quantity");
    const totalElement = document.getElementById("summary-total");

    const unitPrice = Number(unitPriceElement.dataset.price);

    function updateSummary() {

        const quantity = Number(quantityInput.value);

        quantityElement.textContent = quantity;

        totalElement.textContent =
            `৳${(unitPrice * quantity).toFixed(2)}`;

    }

    quantityInput.addEventListener("input", updateSummary);

    updateSummary();

});