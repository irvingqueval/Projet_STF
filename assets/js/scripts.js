function togglePasswordVisibility(id) {
    var passwordInput = document.getElementById(id);
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const priceElements = document.querySelectorAll(".reservation-price");
    const totalPriceElement = document.getElementById("total-price");
    const ammoQuantities = document.querySelectorAll(".ammo-quantity");

    function calculateTotalPrice() {
        let total = 0;

        // Sum of reservation prices
        priceElements.forEach(function (element) {
            total += parseFloat(element.value);
        });

        // Ammunition price added according to quantity
        ammoQuantities.forEach(function (element) {
            const quantity = parseInt(element.value, 10);
            const pricePerBox = parseFloat(element.getAttribute("data-price"));
            if (!isNaN(quantity) && quantity > 0) {
                total += quantity * pricePerBox;
            }
        });

        totalPriceElement.textContent = "$" + total.toFixed(2);
    }

    // Initial calculation
    calculateTotalPrice();

    // Recalculate total price when ammunition quantity is modified
    ammoQuantities.forEach(function (element) {
        element.addEventListener("input", calculateTotalPrice);
    });
});

