<?php

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$messageContent = $_POST['message']; // Renommé pour éviter la confusion

// Construction du message
$message = "Nom: " . $name . "\n" .
           "Email: " . $email . "\n" .
           "Téléphone: " . $phone . "\n" .
           "Message: " . $messageContent;

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';  
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'nagueuleo@gmail.com';                     // SMTP username
    $mail->Password   = 'atcz jayg deeh iwxp';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable implicit TLS encryption
    $mail->Port       = 465;                                    // TCP port to connect to

    // Recipients
    $mail->setFrom($email, $name);                             // Utiliser l'email et le nom de l'expéditeur
    $mail->addAddress('nagueuleo@gmail.com');                  // Add a recipient

    // Content
    $mail->isHTML(false);                                      // Set email format to plain text
    $mail->Subject = 'Nouveau message de contact';
    $mail->Body    = $message;                                 // Corps du message
    $mail->AltBody = 'Ceci est le corps en texte brut pour les clients de messagerie non-HTML';

    $mail->send();
    echo 'Message has been sent';
    
    // Redirection vers contact.php
    header('Location: contact.php');
    exit(); // Assurez-vous de sortir du script après la redirection
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>