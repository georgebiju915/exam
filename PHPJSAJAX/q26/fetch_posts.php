<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, content FROM posts ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='post' data-id='" . $row['id'] . "'>";
        echo "<p>" . htmlspecialchars($row['content']) . "</p>";
        echo "<button class='deletePostBtn'>Delete</button>";
        echo "</div>";
    }
} else {
    echo "No posts found.";
}

$conn->close();
?>