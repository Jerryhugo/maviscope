<?php
require './vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendMail($userEmail, $recipientName, $subject, $msgBody) {
    try {
        $mail = new PHPMailer(true);
    
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'okpujeremiah@gmail.com';
        $mail->Password = 'ofdq objl csxg rcpl';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
    
        $mail->setFrom('okpujeremiah@gmail.com', 'Sterno');
        $mail->addAddress($userEmail, $recipientName);
        $mail->Subject = $subject;
        $mail->Body = $msgBody;
    
        // Add attachments if needed
        // $mail->addAttachment('path/to/file.pdf');
    
        $mail->send();
        
    } catch (Exception $e) {
        echo 'Mailer Error: ' . $e->getMessage();
    }
}


?>
