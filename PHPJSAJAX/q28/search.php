<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "search_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$searchTerm = htmlspecialchars($_GET['term']);

$sql = "SELECT name FROM items WHERE name LIKE '%$searchTerm%'";
$result = $conn->query($sql);

$results = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $results[] = $row['name'];
    }
}

echo json_encode($results);

$conn->close();
?>