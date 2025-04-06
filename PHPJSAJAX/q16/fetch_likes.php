<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT like_count FROM post_likes WHERE post_id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['like_count'];
} else {
    echo "0";
}

$conn->close();
?>