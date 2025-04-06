$(document).ready(function() {
    function updateCart() {
        $.ajax({
            url: 'fetch_cart.php',
            method: 'GET',
            success: function(data) {
                $('#cartItems').html(data.items);
                $('#total').text(data.total);
            }
        });
    }

    $('.add-to-cart').on('click', function() {
        var itemId = $(this).data('id');
        var itemName = $(this).data('name');
        var itemPrice = $(this).data('price');

        $.ajax({
            url: 'add_to_cart.php',
            method: 'POST',
            data: {
                id: itemId,
                name: itemName,
                price: itemPrice
            },
            success: function(response) {
                updateCart();
            }
        });
    });

    updateCart();
});