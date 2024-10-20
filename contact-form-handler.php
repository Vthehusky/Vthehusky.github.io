<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize input
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $countryCode = htmlspecialchars($_POST['country-code']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // Set recipient email (replace with your email)
    $to = "vinaypra@mtu.edu";

    // Subject of the email
    $subject = "New Message from Contact Form";

    // Email body
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $countryCode $phone\n";
    $body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $email";

    // Send the email using the mail() function
    if (mail($to, $subject, $body, $headers)) {
        // Redirect to a thank you page after successful submission
        header("Location: thankyou.html");
        exit;
    } else {
        // If there was an error sending the email, show an error message
        echo "Error: Message could not be sent.";
    }
} else {
    // If the form is accessed directly without a POST request, show an error
    echo "Error: Invalid request.";
}
?>
