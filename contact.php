<?php
include ("dbconfig.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\DentalCare\PHPMailer\src\Exception.php';
require 'C:\xampp\htdocs\DentalCare\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\DentalCare\PHPMailer\src\SMTP.php';

$name = $_POST['name'];
$emailFromForm = $_POST['emails'];
$phone = $_POST['mobile'];
$msg = $_POST['message'];

$sql = "INSERT INTO `contact` (`name`, `email`, `phone`, `message`) VALUES ('$name', '$emailFromForm', '$phone', '$msg')";

if(mysqli_query($conn, $sql)){
    $mail = new PHPMailer(true);

    $smtpEmail = 'deathr144@gmail.com'; 
    $smtpPassword = 'rzsy rylv ofcm zhfv';

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $smtpEmail; 
        $mail->Password = $smtpPassword;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($smtpEmail, 'DentCare Team'); 
        $mail->addAddress($emailFromForm, $name); 
        $mail->addReplyTo($smtpEmail, 'DentCare Team'); 

        $mail->isHTML(true);
        $mail->Subject = 'Thank You for Contacting DentCare';
        $mail->Body = "Dear $name, <br>
        <br>

        Thank you for reaching out to DentCare. We have received your message and will get back to you as soon as possible.
        <br><br>

        Here are the details you provided:<br>

        - Name: $name<br>
        - Email: $emailFromForm<br>
        - Mobile Number: $phone<br>
        Your Message:<br>
        $msg <br>
        <br>

        We appreciate your interest in DentCare and look forward to assisting you.<br>
        <br>
        Best Regards,<br>
        DentCare Team";
        
        // Send email
        $mail->send();
        header("Location: contact.html");
    } catch (Exception $e) {
        echo 'Failed to send email: ', $mail->ErrorInfo;
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
