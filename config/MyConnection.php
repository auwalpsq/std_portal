<?php
    use std_portal\std_gateways\GenericGateway;
    require_once 'std_gateways/GenericGateway.php';
    require_once 'config/DatabaseConfig.php';

    $database = new DatabaseConfig();
    $dbConnect = $database->dbConnect();

    $gateway = new GenericGateway($dbConnect);
?>