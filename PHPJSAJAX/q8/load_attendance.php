<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendance_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT student, status, reg_date FROM attendance ORDER BY reg_date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<li>" . htmlspecialchars($row['student']) . " - " . htmlspecialchars($row['status']) . " (" . $row['reg_date'] . ")</li>";
    }
} else {
    echo "No attendance records found.";
}

$conn->close();
?>