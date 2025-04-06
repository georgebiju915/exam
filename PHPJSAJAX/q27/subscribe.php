<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "subscription_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = htmlspecialchars($_POST['email']);

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $sql = "INSERT INTO subscribers (email) VALUES ('$email')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Subscription successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid email format.";
}

$conn->close();
?>