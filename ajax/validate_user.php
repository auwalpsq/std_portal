<?php
session_start();
use std_portal\std_gateways\GenericGateway;
require_once '../std_gateways/GenericGateway.php';
include_once '../config/DatabaseConfig.php';

$database = new DatabaseConfig();
$dbConnect = $database->dbConnect();

$gateway = new GenericGateway($dbConnect);

$userName = $_POST['username'];
$password = $_POST['password'];

$isValidUser = $gateway->validateUser($userName, $password);
if($isValidUser){
    $_SESSION['username'] = $userName;
    $_SESSION['password'] = $password;
    if(filter_var($userName, FILTER_VALIDATE_EMAIL)){
        $_SESSION['field_name'] = 'email';
    }else{
        $_SESSION['field_name'] = 'user_id';
    }
    $tableName = 'users';
    $data = array('id'=>$userName, 'field_name'=>$_SESSION['field_name']);
    $result = $gateway->genericFind($tableName, $data);
    $activated = $result['result'][0]['activated'];
    $user_type = $result['result'][0]['user_type'];
    $_SESSION['user_type'] = $user_type;
    $_SESSION['user_id'] = $result['result'][0]['user_id'];
    if($activated === 1){
             header('Location: ../dash');
    }else{
            header('Location: ../pass_rst');
    }
}else{
    $_SESSION['login_error'] = "Invalid username or password";
    header('Location: ../login');
}