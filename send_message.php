<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simple spam prevention
    if (!empty($_POST['website'])) { exit; } // honeypot trap

    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';  // SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'arapusharma45@gmail.com';      // your Gmail
        $mail->Password   = 'ftiivxgllumougwx';        // Gmail App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom($email, 'Portfolio Contact Form');
        $mail->addAddress('sheldoncoop456@gmail.com');       // where you want to receive messages

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Message';
        $mail->Body    = "Email: $email <br><br> Message:<br>$message";

        $mail->send();
        header("Location: index.php?status=success");
        exit;
    } catch (Exception $e) {
        header("Location: index.php?status=error");
        exit;    
    }
}
?>
