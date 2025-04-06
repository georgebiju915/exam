<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "poll_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$optionId = $_POST['id'];

$sql = "UPDATE poll_options SET votes = votes + 1 WHERE id = $optionId";

if ($conn->query($sql) === TRUE) {
    echo "Vote counted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>