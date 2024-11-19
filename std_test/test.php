<?php 
use std_portal\std_gateways\GenericGateway;
require_once '../std_gateways/GenericGateway.php';
include_once '../config/DatabaseConfig.php';

$database = new DatabaseConfig();
$dbConnect = $database->dbConnect();

$gateway = new GenericGateway($dbConnect);

$tableName = 'beneficiary';

$data = array('all'=>false, 'id_name'=>'vfileno', 'id_value'=>'12345');

// $result = $gateway->genericUpdate($tableName, $data);

// if($result > 0){
//     echo "Data updated successfully";
// } else {
//     echo "Failed to update data";
// }

// $data = array('id_name'=>'vfileno', 'id_value'=>'123456');

// $result = $gateway->genericDelete($tableName, $data);

// if($result > 0){
//     echo "Data inserted successfully";
// } else {
//     echo "Failed to insert data";
// }
// $values = array('cspshipid'=>'1234', 'vspshipname'=>'Just a training', 'vspshiphone'=>'+2348033447744', 'vspshipemailid'=>'555');

// $result = $gateway->genericInsert($tableName, $values);

// if($result > 0){
//     echo "Data inserted successfully";
// } else {
//     echo "Failed to insert data";
// }

$result = $gateway->genericFind($tableName, $data);
echo json_encode($result);