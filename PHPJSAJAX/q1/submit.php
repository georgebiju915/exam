<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);

$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "<p>Details submitted successfully!</p>";
} else {
    echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
}

$conn->close();
?>