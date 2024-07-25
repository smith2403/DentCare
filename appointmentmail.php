<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\DentalCare\PHPMailer\src\Exception.php';
require 'C:\xampp\htdocs\DentalCare\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\DentalCare\PHPMailer\src\SMTP.php';

// Form data
$id = $_POST['id'];
$service = $_POST['service'];
$name = $_POST['name'];
$emailFromForm = $_POST['emails'];
$date = $_POST['date'];
$time = $_POST['time'];

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
    $mail->Subject = 'Appointment Confirmation - DentCare';
    $mail->Body = "Dear $name, <br>
    <br>
    Thank you for scheduling an appointment with DentCare. We have received your appointment details and will be ready to assist you on the following schedule:<br>
    <br>
    - Service: $service<br>
    - Date: $date<br>
    - Time: $time<br>
    <br>
    We look forward to serving you.<br>
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
