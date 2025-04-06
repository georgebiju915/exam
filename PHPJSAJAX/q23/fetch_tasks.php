<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todo_list_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, task FROM tasks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<li>" . htmlspecialchars($row['task']) . " <button class='delete-task' data-id='" . $row['id'] . "'>Delete</button></li>";
    }
} else {
    echo "No tasks found.";
}

$conn->close();
?>