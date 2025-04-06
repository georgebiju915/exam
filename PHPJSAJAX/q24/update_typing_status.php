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

$typing = $_POST['typing'] ? 1 : 0;
$user = $_SESSION['username'];

$sql = "UPDATE users SET typing='$typing' WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
    echo "Typing status updated successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>