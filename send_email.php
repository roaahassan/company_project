<?php 
require 'vendor/autoload.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $msg = htmlspecialchars(trim($_POST['message']));

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Set the SMTP server to send through
        $mail->SMTPAuth = true;           // Enable SMTP authentication
        $mail->Username = 'rowahhassan888@gmail.com'; // my Gmail address
        $mail->Password = 'RinoIT@@2018';   // my  Gmail password
        $mail->SMTPSecure = 'tls';        // Enable TLS encryption
        $mail->Port = 587;                // TCP port to connect to

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('rowahhassan888@gmail.com'); // Add a recipient

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New message from the website';
        $mail->Body = "<h2>A new message has been sent from the website</h2>
                       <p><strong>Name:</strong> {$name}</p>
                       <p><strong>Email:</strong> {$email}</p>
                       <p><strong>Message:</strong> {$msg}</p>";

        $mail->send();
        echo "Your message has been sent successfully!";
    } catch (Exception $e) {
        echo "An error occurred while sending the message: {$mail->ErrorInfo}";
    }
}
?>
