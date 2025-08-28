<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'admin/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['website'])) { exit; }

    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $stmt = $conn->prepare("SELECT email, app_password FROM mail_credentials LIMIT 1");
    $stmt->execute();
    $stmt->bind_result($db_email, $db_password);
    $stmt->fetch();
    $stmt->close();

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = $db_email;      
        $mail->Password   = $db_password; 
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom($email, 'Portfolio Contact Form');
        $mail->addAddress('sheldoncoop456@gmail.com'); 

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
