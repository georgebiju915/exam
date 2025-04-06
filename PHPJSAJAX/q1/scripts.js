$(document).ready(function() {
    $('#userForm').on('submit', function(event) {
        event.preventDefault();
        var name = $('#name').val();
        var email = $('#email').val();

        $.ajax({
            url: 'submit.php',
            method: 'POST',
            data: {
                name: name,
                email: email
            },
            success: function(response) {
                $('#message').html(response);
                $('#name').val('');
                $('#email').val('');
            },
            error: function() {
                $('#message').html('<p>An error occurred. Please try again.</p>');
            }
        });
    });
});