<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = "your-email@example.com";
    $subject = "New Contact Form Submission";
    $headers = "From: " . $email;

    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message: $message\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for contacting us!";
    } else {
        echo "An error occurred. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>