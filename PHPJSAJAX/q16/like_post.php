<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE post_likes SET like_count = like_count + 1 WHERE post_id = 1";

if ($conn->query($sql) === TRUE) {
    echo "Like count updated successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>