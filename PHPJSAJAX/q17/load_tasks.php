<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task_manager_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, task, completed FROM tasks ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $completedClass = $row['completed'] ? 'completed' : '';
        $buttonText = $row['completed'] ? 'Completed' : 'Mark as Completed';
        $buttonDisabled = $row['completed'] ? 'disabled' : '';
        echo "<li class='$completedClass'>" . htmlspecialchars($row['task']) . " <button class='complete-task' data-id='" . $row['id'] . "' $buttonDisabled>$buttonText</button></li>";
    }
} else {
    echo "No tasks found.";
}

$conn->close();
?>