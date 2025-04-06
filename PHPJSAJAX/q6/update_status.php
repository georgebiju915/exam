<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
$user_id = session_id();
$current_time = time();

$sql = "REPLACE INTO online_users (user_id, last_activity) VALUES ('$user_id', '$current_time')";

if ($conn->query($sql) === TRUE) {
    echo "Status updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>