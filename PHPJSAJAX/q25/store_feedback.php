<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rating_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$product_id = $_POST['product_id'];
$username = htmlspecialchars($_POST['username']);
$rating = $_POST['rating'];

$sql = "INSERT INTO feedback (product_id, username, rating) VALUES ('$product_id', '$username', '$rating')";

if ($conn->query($sql) === TRUE) {
    echo "Feedback submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>