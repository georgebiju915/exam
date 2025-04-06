<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "poll_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, option_text, votes FROM poll_options";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='vote-option'>";
        echo "<span>" . htmlspecialchars($row['option_text']) . "</span>";
        echo "<button class='vote-btn' data-id='" . $row['id'] . "'>Vote</button>";
        echo "<span class='vote-count'>Votes: " . $row['votes'] . "</span>";
        echo "</div>";
    }
} else {
    echo "No poll options found.";
}

$conn->close();
?>