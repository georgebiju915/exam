<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rating_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$product_id = $_GET['product_id'];

$sql = "SELECT username, rating FROM feedback WHERE product_id='$product_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p>" . htmlspecialchars($row['username']) . ": " . $row['rating'] . " Stars</p>";
    }
} else {
    echo "No feedback yet.";
}

$conn->close();
?>