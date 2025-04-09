<?php
    session_start();
    use std_portal\std_gateways\GenericGateway;
    require_once '../std_gateways/GenericGateway.php';
    include_once '../config/DatabaseConfig.php';
    include_once '../config/ConfigureEmail.php';

    $database = new DatabaseConfig();
    $dbConnect = $database->dbConnect();

    $gateway = new GenericGateway($dbConnect);

    $id = $_POST['id'];
    $result_user = $gateway->checkUser($id);

    if($result_user){
        $random_password = generateRandomPassword(8);
        $emsil[] = $result_user['email'];
        $personnel_id = $result_user['staff_id'];
        $data = array('table_name' => 'personnel', 'field_name' => 'personnel_id', 'id' => $personnel_id);
        $personnel = $gateway->find($data);
        $full_name = "$personnel[first_name] $personnel[other_names] $personnel[surname]";
        $message = "Dear $full_name,<br><br>Your password has been reset to: <strong>$random_password</strong><br><br>Please login to your account and change your password.<br><br>Best regards,<br>Admin";
        $subject = 'Password Reset';
        $send_email = sendEmail($emsil, $subject, $message);
        if($send_email === 'Email Notification sent successfully'){
            $update_data = array('table_name' => 'users', 'field_name' => 'user_id', 'id' => $id, 'password' => $random_password, 'activated' => 0);
            $update_result = $gateway->update($update_data);
            if($update_result){
                $_SESSION['password_reset'] = array('message'=>"New password is sent to $personnel[email].<br>Get the new password from your email and login afresh.",
                            'title' => 'Password Reset', 'icon'=>'success');
                header('Location:../login');
            }else{
                $_SESSION['password_reset'] = array('message'=>"Failed to reset password. Please try again.", 
                            'title' => 'Password Reset', 'icon'=>'error');
                header('Location:../request_pass_rst');
            }
    }else{
            $_SESSION['password_reset'] = array('message'=>"Failed to send email notification. Please try again.", 
                            'title' => 'Password Reset', 'icon'=>'error');
            header('Location:../request_pass_rst');
        }
    }else{
        $_SESSION['password_reset'] = array('message'=>"User not found. Please check the user ID.", 
                            'title' => 'Password Reset', 'icon'=>'error');
        header('Location:../request_pass_rst');
    }
    
