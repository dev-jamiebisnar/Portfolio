<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if running on localhost
$isLocalhost = in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']);

if ($isLocalhost) {
    // Configure PHP to use MailHog
    ini_set('SMTP', 'localhost');
    ini_set('smtp_port', '1025');
}

$response = ['success' => false, 'message' => 'Failed to send message.'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = $isLocalhost ? "mailhog@email.com" : "bisnarjamie76@gmail.com";
    $subject = $isLocalhost ? "TEST New Contact Form Submission" : "$name wants work with you! style='text-transform: uppercase;'";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        $response['success'] = true;
        $response['message'] = "Message sent successfully!";
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
