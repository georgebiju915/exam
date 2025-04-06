$(document).ready(function() {
    function loadCart() {
        $.ajax({
            url: 'get_cart.php',
            method: 'GET',
            success: function(response) {
                var cart = JSON.parse(response);
                displayCart(cart);
            }
        });
    }

    function displayCart(cart) {
        var html = '';
        if (cart.length > 0) {
            cart.forEach(function(item) {
                html += '<div class="cart-item" data-id="' + item.id + '">';
                html += '<h3>' + item.name + '</h3>';
                html += '<p>$' + item.price + ' x ' + item.quantity + '</p>';
                html += '<button class="remove-from-cart">Remove</button>';
                html += '</div>';
            });
        } else {
            html = '<p>Your cart is empty.</p>';
        }
        $('#cartContainer').html(html);
    }

    $('.add-to-cart').on('click', function() {
        var product = $(this).closest('.product');
        var product_id = product.data('id');
        var product_name = product.find('h3').text();
        var product_price = product.find('p').text().replace('$', '');

        $.ajax({
            url: 'add_to_cart.php',
            method: 'POST',
            data: {
                product_id: product_id,
                product_name: product_name,
                product_price: product_price
            },
            success: function(response) {
                var cart = JSON.parse(response);
                displayCart(cart);
            }
        });
    });

    $(document).on('click', '.remove-from-cart', function() {
        var product_id = $(this).closest('.cart-item').data('id');
        $.ajax({
            url: 'remove_from_cart.php',
            method: 'POST',
            data: { product_id: product_id },
            success: function(response) {
                var cart = JSON.parse(response);
                displayCart(cart);
            }
        });
    });

    loadCart();
});