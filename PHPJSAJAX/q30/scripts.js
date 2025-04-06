$(document).ready(function() {
    $('#currencyForm').on('submit', function(event) {
        event.preventDefault();
        var amount = $('#amount').val();
        var fromCurrency = $('#fromCurrency').val();
        var toCurrency = $('#toCurrency').val();

        $.ajax({
            url: 'convert.php',
            method: 'POST',
            data: {
                amount: amount,
                fromCurrency: fromCurrency,
                toCurrency: toCurrency
            },
            success: function(response) {
                $('#result').html(response);
            },
            error: function() {
                $('#result').html('<p>An error occurred. Please try again.</p>');
            }
        });
    });
});