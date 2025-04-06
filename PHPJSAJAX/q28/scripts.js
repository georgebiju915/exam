$(document).ready(function() {
    $('#searchInput').on('input', function() {
        var searchTerm = $(this).val();

        if (searchTerm.trim() !== '') {
            $.ajax({
                url: 'search.php',
                method: 'GET',
                data: { term: searchTerm },
                success: function(response) {
                    var results = JSON.parse(response);
                    displayResults(results);
                },
                error: function() {
                    $('#resultsContainer').html('<p>An error occurred. Please try again.</p>');
                }
            });
        } else {
            $('#resultsContainer').empty();
        }
    });

    function displayResults(results) {
        var html = '';
        if (results.length > 0) {
            results.forEach(function(result) {
                html += '<p>' + result + '</p>';
            });
        } else {
            html = '<p>No results found.</p>';
        }
        $('#resultsContainer').html(html);
    }
});