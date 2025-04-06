<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$postId = $_POST['id'];

$sql = "DELETE FROM posts WHERE id='$postId'";

if ($conn->query($sql) === TRUE) {
    echo "Post deleted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>