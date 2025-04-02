<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function sendEmail($to, $subject, $message) {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'auwalpsq@gmail.com';
        $mail->Password   = 'ymtx fuot xwgz xoxp';                               // SMTP password
        $mail->Port=587;
        $mail->SMTPSecure = 'tls';        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged

        $mail->setFrom('auwalpsq@gmail.com', 'Auwal Usman');
        foreach($to as $email){
            $mail->addAddress($email); // Add a recipient
        }
        //$mail->addAddress($to, "Jibril Abubakar");  // Add a recipient
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->send();
        return 'Email Notification sent successfully';
    }catch(Exception $e){
        //error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        return 'fail to send email notification';
    }
}