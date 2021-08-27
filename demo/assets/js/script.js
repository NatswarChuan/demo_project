function getPrice(value, id, price) {
    const _price = document.getElementById("price" + id);
    const _subtotal = document.getElementById("total");
    const _total = document.getElementById("total");
    const _prices = document.getElementsByName("prices");
    const _priceValue = document.getElementById("prices" + id);
    const _quantityPrice = document.getElementById("quantityPrice" + id);
    var subtotal = 0;

    _price.innerHTML = "<span>$" + (value * price) + "</span>";
    _priceValue.value = (value * price);
    _quantityPrice.value = id + "-" + value;
    _prices.forEach((entry) => {
        subtotal += +entry.value;
    });

    _subtotal.innerHTML = "<span>$" + subtotal + "</span>";
}