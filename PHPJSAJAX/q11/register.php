<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auth_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
    header("Location: login.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>