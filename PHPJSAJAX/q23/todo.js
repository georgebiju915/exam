$(document).ready(function() {
    function loadTasks() {
        $.ajax({
            url: 'fetch_tasks.php',
            method: 'GET',
            success: function(data) {
                $('#taskList').html(data);
            }
        });
    }

    $('#addTaskBtn').on('click', function() {
        var task = $('#taskInput').val();
        if (task.trim() !== '') {
            $.ajax({
                url: 'add_task.php',
                method: 'POST',
                data: { task: task },
                success: function(response) {
                    $('#taskInput').val('');
                    loadTasks();
                }
            });
        }
    });

    $(document).on('click', '.delete-task', function() {
        var taskId = $(this).data('id');
        $.ajax({
            url: 'delete_task.php',
            method: 'POST',
            data: { id: taskId },
            success: function(response) {
                loadTasks();
            }
        });
    });

    loadTasks();
});