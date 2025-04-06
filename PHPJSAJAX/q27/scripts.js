$(document).ready(function() {
    $('#subscriptionForm').on('submit', function(event) {
        event.preventDefault();
        var email = $('#email').val();

        $.ajax({
            url: 'subscribe.php',
            method: 'POST',
            data: { email: email },
            success: function(response) {
                $('#message').text(response);
                $('#email').val('');
            },
            error: function() {
                $('#message').text('An error occurred. Please try again.');
            }
        });
    });
});