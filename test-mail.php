<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 3;
    $mail->isSMTP();
    $mail->Host = 'smtp.titan.email';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@patchmakerusa.com';
    $mail->Password = 'admin@123';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('info@patchmakerusa.com', 'Test');
    $mail->addAddress('info@patchmakerusa.com');

    $mail->Subject = 'SMTP TEST';
    $mail->Body = 'Titan SMTP test email';

    $mail->send();
    echo 'EMAIL SENT';
} catch (Exception $e) {
    echo $mail->ErrorInfo;
}
