<?php

require 'class.phpmailer.php';

$mail = new PHPMailer;
// Set PHPMailer to use the sendmail transport
$mail->isSendmail();
//Set who the message is to be sent from
$mail->setFrom('hello@cetb.in', 'CET B');
//Set who the message is to be sent to
$mail->addAddress('rishav.159@gmail.com', 'Rishav Aggarwal');
//Set the subject line
$mail->Subject = 'PHPMailer sendmail test';
//Set the body
$mail->Body = 'Hello Sir, this is just for testing';
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

?>