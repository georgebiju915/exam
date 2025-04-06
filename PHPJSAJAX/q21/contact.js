$(document).ready(function() {
    $('#contactForm').on('submit', function(event) {
        event.preventDefault();

        var formData = {
            name: $('#name').val(),
            email: $('#email').val(),
            message: $('#message').val()
        };

        $.ajax({
            url: 'submit_contact.php',
            method: 'POST',
            data: formData,
            success: function(response) {
                $('#responseMessage').html(response);
                $('#contactForm')[0].reset();
            },
            error: function() {
                $('#responseMessage').html('An error occurred. Please try again.');
            }
        });
    });
});