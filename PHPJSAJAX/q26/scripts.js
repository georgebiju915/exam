$(document).ready(function() {
    function loadPosts() {
        $.ajax({
            url: 'fetch_posts.php',
            method: 'GET',
            success: function(data) {
                $('#postsContainer').html(data);
            }
        });
    }

    $('#addPostBtn').on('click', function() {
        var content = $('#postContent').val();
        if (content.trim() !== '') {
            $.ajax({
                url: 'add_post.php',
                method: 'POST',
                data: { content: content },
                success: function(response) {
                    alert(response);
                    $('#postContent').val('');
                    loadPosts();
                }
            });
        }
    });

    $(document).on('click', '.deletePostBtn', function() {
        var postId = $(this).closest('.post').data('id');
        $.ajax({
            url: 'delete_post.php',
            method: 'POST',
            data: { id: postId },
            success: function(response) {
                alert(response);
                loadPosts();
            }
        });
    });

    loadPosts();
});