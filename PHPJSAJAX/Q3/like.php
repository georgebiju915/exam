<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the current number of likes
$sql = "SELECT likes FROM blog_post WHERE id=1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$currentLikes = $row['likes'];

// Increment the number of likes
$newLikes = $currentLikes + 1;
$sql = "UPDATE blog_post SET likes=$newLikes WHERE id=1";

if ($conn->query($sql) === TRUE) {
    echo $newLikes;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>