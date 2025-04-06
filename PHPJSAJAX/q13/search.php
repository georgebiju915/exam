<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = $_GET['q'];
$sql = "SELECT product_name FROM products WHERE product_name LIKE '%$query%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p>" . htmlspecialchars($row['product_name']) . "</p>";
    }
} else {
    echo "No results found.";
}

$conn->close();
?>