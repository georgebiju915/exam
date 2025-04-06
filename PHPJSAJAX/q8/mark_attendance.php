<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendance_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$student = $_POST['student'];
$status = $_POST['status'];

$sql = "INSERT INTO attendance (student, status) VALUES ('$student', '$status')";

if ($conn->query($sql) === TRUE) {
    echo "Attendance marked successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>