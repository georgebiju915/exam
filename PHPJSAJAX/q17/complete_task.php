<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task_manager_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];

$sql = "UPDATE tasks SET completed = 1 WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Task marked as completed";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>