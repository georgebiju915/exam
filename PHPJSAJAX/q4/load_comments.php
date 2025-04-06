<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username, comment, reg_date FROM comments ORDER BY reg_date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>" . htmlspecialchars($row['username']) . "</strong>: " . htmlspecialchars($row['comment']) . "<br><em>" . $row['reg_date'] . "</em></p>";
    }
} else {
    echo "No comments yet.";
}

$conn->close();
?>