<?php
    use std_portal\std_gateways\GenericGateway;
    require_once '../std_gateways/GenericGateway.php';
    require_once '../config/DatabaseConfig.php';

    $database = new DatabaseConfig();
    $dbConnect = $database->dbConnect();

    $gateway = new GenericGateway($dbConnect);

    $vw_staff_on_leave = 'vw_staff_on_leave';
    $data_staff_on_leave = array('id'=>'all', 'limit'=>'');

    $response_staff_on_leave = $gateway->genericFind($vw_staff_on_leave, $data_staff_on_leave);
    $response = [];
    $emails = "";
    $count = 0;
    foreach($response_staff_on_leave['result'] as $staff_on_leave){
        $interval = date_diff(date_create($staff_on_leave['start_date']), date_create($staff_on_leave['end_date']));
        $days = (int)$interval->format('%a');
        $months = (int)$interval->format('%m');
        $years = (int)$interval->format('%y');
        if($years == 0 && $months <= 3){
            $emails .= "$staff_on_leave[email]<br>";
            $count++;
        }
    }
    $response['count'] = $count;
    $response['emails'] = $emails;
    echo json_encode($response);
?>