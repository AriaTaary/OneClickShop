function submitForm(name) {
    document.forms.namedItem(name).submit();
}

function favourite(product_id, user_id) {
    $.ajax({
        type: "POST",
        url: "/products/favourite/",
        data: {"user_id": user_id, "product_id": product_id},
        success: function (response) {
            document.location.reload();
        },
        error: function (msg) {
            console.log(msg);
        }
    });
}

function cart(product_id, count, type = "shop") {
    $.ajax({
        type: "POST",
        url: "/cart/",
        data: {"product_id": product_id, "count": count},
        success: function (response) {
            if (type === "shop") {
                alert("Товар успешно добавлен в корзину!");
            }
            else {
                document.location.reload();
            }
        },
        error: function (msg) {
            console.log(msg);
        }
    });
}

function cart_minus(product_id, count) {
    $.ajax({
        type: "POST",
        url: "/cart/",
        data: {"product_id": product_id, "count": count, 'minus': true},
        success: function (response) {
            document.location.reload();
        },
        error: function (msg) {
            console.log(msg);
        }
    });
}