<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = $_POST['message'];
$username = $_SESSION['username'];

$sql = "INSERT INTO messages (username, message) VALUES ('$username', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Message sent successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>