<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$postContent = htmlspecialchars($_POST['content']);

$sql = "INSERT INTO posts (content) VALUES ('$postContent')";

if ($conn->query($sql) === TRUE) {
    echo "Post added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>