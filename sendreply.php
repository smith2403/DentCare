<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\DentalCare\PHPMailer\src\Exception.php';
require 'C:\xampp\htdocs\DentalCare\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\DentalCare\PHPMailer\src\SMTP.php';

// Form data
$id = $_POST['id'];
$emailFromForm = $_POST['email'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$reply = $_POST['reply'];

$mail = new PHPMailer(true);

// SMTP configuration
$smtpEmail = 'deathr144@gmail.com';
$smtpPassword = 'rzsy rylv ofcm zhfv';

try {
    // Configure SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $smtpEmail;
    $mail->Password = $smtpPassword;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipient information
    $mail->setFrom($smtpEmail, 'DentCare Team');
    $mail->addAddress($emailFromForm, $name);
    $mail->addReplyTo($smtpEmail, 'DentCare Team');

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Your Reply from DentCare Team';
    $mail->Body = "Dear $name, <br>
    <br>
    Thank you for reaching out to DentCare. Here is our reply to your message:<br>
    <br>
    Original Message:<br>
    $message <br>
    <br>
    DentCare Team's Reply:<br>
    $reply <br>
    <br>
    We appreciate your interest in DentCare and look forward to assisting you further.<br>
    <br>
    Best Regards,<br>
    DentCare Team";

    // Send email
    $mail->send();
    echo 'Email sent successfully.';
} catch (Exception $e) {
    echo 'Failed to send email: ', $mail->ErrorInfo;
}
?>
