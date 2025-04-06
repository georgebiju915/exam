<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username, message, timestamp FROM messages ORDER BY timestamp DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>" . htmlspecialchars($row['username']) . ":</strong> " . htmlspecialchars($row['message']) . " <small>" . $row['timestamp'] . "</small></p>";
    }
} else {
    echo "No messages found.";
}

$conn->close();
?>