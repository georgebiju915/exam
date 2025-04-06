$(document).ready(function() {
    function loadMessages() {
        $.ajax({
            url: 'fetch_messages.php',
            method: 'GET',
            success: function(data) {
                $('#chatBox').html(data);
            }
        });
    }

    $('#messageForm').on('submit', function(event) {
        event.preventDefault();

        var message = $('#message').val();

        $.ajax({
            url: 'send_message.php',
            method: 'POST',
            data: { message: message },
            success: function(response) {
                $('#message').val('');
                loadMessages();
            }
        });
    });

    setInterval(loadMessages, 2000); // Refresh messages every 2 seconds
});