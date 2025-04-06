$(document).ready(function() {
    var typing = false;
    var timeout = undefined;

    function timeoutFunction() {
        typing = false;
        $.ajax({
            url: 'update_typing_status.php',
            method: 'POST',
            data: { typing: false }
        });
    }

    $('#textInput').on('input', function() {
        if (typing === false) {
            typing = true;
            $.ajax({
                url: 'update_typing_status.php',
                method: 'POST',
                data: { typing: true }
            });
            timeout = setTimeout(timeoutFunction, 3000);
        } else {
            clearTimeout(timeout);
            timeout = setTimeout(timeoutFunction, 3000);
        }
    });

    function checkTypingStatus() {
        $.ajax({
            url: 'fetch_typing_status.php',
            method: 'GET',
            success: function(response) {
                if (response.typing) {
                    $('#typingIndicator').show();
                } else {
                    $('#typingIndicator').hide();
                }
            }
        });
    }

    setInterval(checkTypingStatus, 1000);
});