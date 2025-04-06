<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comments_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$comment = $_POST['comment'];

$sql = "INSERT INTO comments (username, comment) VALUES ('$username', '$comment')";

if ($conn->query($sql) === TRUE) {
    echo "Comment posted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>