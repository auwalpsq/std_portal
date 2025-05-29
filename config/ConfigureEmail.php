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
        $mail->Password   = 'hhdh dyhs hweo bjch';                               // SMTP password
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
        return 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        //error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        //return 'fail to send email notification';
    }
}
function generateRandomPassword($length = 8) {
    // Define the character sets to use
    $upperCase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $lowerCase = 'abcdefghijklmnopqrstuvwxyz';
    $digits = '0123456789';
    $specialChars = '!@#$%^&*-_?';

    // Combine all character sets
    $allCharacters = $upperCase . $lowerCase . $digits . $specialChars;

    // Shuffle characters and pick random characters from the combined set
    $password = '';
    $allLength = strlen($allCharacters);

    for ($i = 0; $i < $length; $i++) {
        $password .= $allCharacters[random_int(0, $allLength - 1)];
    }

    return $password;
}
