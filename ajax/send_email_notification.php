<?php
    include_once '../config/ConfigureEmail.php';

    $to = explode("<br>",rtrim($_POST['emails'], '<br>'));
    $subject = "Study Leave Notification";
    $message = "Dear Staff,<br><br>We would like to remind you that your leave elapse in 3 months time:<br><br>";

    echo json_encode(array('message'=>sendEmail($to, $subject, $message)));
?>