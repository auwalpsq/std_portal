<?php
    session_start();
    use std_portal\std_gateways\GenericGateway;
    require_once '../std_gateways/GenericGateway.php';
    include_once '../config/DatabaseConfig.php';

    $database = new DatabaseConfig();
    $dbConnect = $database->dbConnect();

    $gateway = new GenericGateway($dbConnect);

    $id = $_POST['id'];
    $result_user = $gateway->checkUser($id);

    echo $result_user;
