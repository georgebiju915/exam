$(document).ready(function() {
    $('.rating-form').on('submit', function(event) {
        event.preventDefault();
        var form = $(this);
        var product_id = form.closest('.product').data('id');
        var username = form.find('input[name="username"]').val();
        var rating = form.find('select[name="rating"]').val();

        $.ajax({
            url: 'store_feedback.php',
            method: 'POST',
            data: {
                product_id: product_id,
                username: username,
                rating: rating
            },
            success: function(response) {
                alert(response);
                fetchFeedback(product_id, form.next('.feedback'));
            }
        });
    });

    function fetchFeedback(product_id, feedbackDiv) {
        $.ajax({
            url: 'fetch_feedback.php',
            method: 'GET',
            data: { product_id: product_id },
            success: function(response) {
                feedbackDiv.html(response);
            }
        });
    }

    $('.product').each(function() {
        var product_id = $(this).data('id');
        var feedbackDiv = $(this).find('.feedback');
        fetchFeedback(product_id, feedbackDiv);
    });
});