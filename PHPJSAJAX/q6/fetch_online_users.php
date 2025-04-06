<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$current_time = time();
$timeout_duration = 60; // Consider user offline if no activity for 60 seconds
$timeout_time = $current_time - $timeout_duration;

$sql = "SELECT user_id FROM online_users WHERE last_activity > $timeout_time";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p>Online User: " . htmlspecialchars($row['user_id']) . "</p>";
    }
} else {
    echo "No users online.";
}

$conn->close();
?>