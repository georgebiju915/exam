$(document).ready(function() {
    $('#textInput').on('input', function() {
        var text = $(this).val();

        $.ajax({
            url: 'count_words.php',
            method: 'POST',
            data: { text: text },
            success: function(response) {
                $('#wordCount').text(response);
            },
            error: function() {
                $('#wordCount').text('Error');
            }
        });
    });
});