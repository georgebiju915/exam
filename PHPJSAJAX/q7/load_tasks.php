<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, task FROM tasks ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<li>" . htmlspecialchars($row['task']) . "</li>";
    }
} else {
    echo "No tasks found.";
}

$conn->close();
?>