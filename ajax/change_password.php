<?php
    session_start();
    use std_portal\std_gateways\GenericGateway;

    $userName = $_SESSION['username'];
    $password = $_SESSION['password'];
    
    $passwordNew = $_POST['password'];
    $passwordConfirm = $_POST['confirm_password'];
    if(isset($userName) && isset($password) && $passwordNew === $passwordConfirm){
        require_once '../std_gateways/GenericGateway.php';
        include_once '../config/DatabaseConfig.php';

        $database = new DatabaseConfig();
        $dbConnect = $database->dbConnect();

        $gateway = new GenericGateway($dbConnect);

        $tableName = 'users';
        $data = array('id'=>$userName, 'field_name'=>'user_id', 'password'=>$passwordNew, 'activated'=>1);

        $result = $gateway->genericUpdate($tableName, $data);
        if($result['message'] === 'success'){
            $_SESSION['password'] = $passwordNew;
            $_SESSION['password_change_success'] = 'Password changed successfully.';
            header('Location:../dash.php');
            exit;
    }else{
        $_SESSION['login_error'] = 'Please login first.';
        header('Location: ../login.php');
        exit;
    }
}else{
    $_SESSION['login_error'] = 'Password change failed.';
    header('Location: ../login.php');
    exit;
}