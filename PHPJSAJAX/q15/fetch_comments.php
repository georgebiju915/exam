<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comments_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username, comment, reg_date FROM comments ORDER BY reg_date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='comment'><strong>" . htmlspecialchars($row['username']) . "</strong><br>" . htmlspecialchars($row['comment']) . "<br><small>" . $row['reg_date'] . "</small></div>";
    }
} else {
    echo "No comments found.";
}

$conn->close();
?>