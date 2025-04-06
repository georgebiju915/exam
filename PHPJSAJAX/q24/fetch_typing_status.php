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

$sql = "SELECT typing FROM users WHERE username != '" . $_SESSION['username'] . "' AND typing=1";
$result = $conn->query($sql);

$response = ['typing' => $result->num_rows > 0];
echo json_encode($response);

$conn->close();
?>