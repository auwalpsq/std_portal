<?php
    use std_portal\std_gateways\GenericGateway;
    require_once '../std_gateways/GenericGateway.php';
    include_once '../config/DatabaseConfig.php';

    $database = new DatabaseConfig();
    $dbConnect = $database->dbConnect();

    $gateway = new GenericGateway($dbConnect);

    $operation = $_POST['operation'];
    $type = $_POST['type'];
    switch([$type, $operation]){
        case ['host_training', 'cr']:
            $tableName = 'traininghost';
            $host_name = $_POST['host_name'];
            
            $data = array('vthostname' => $host_name);

            $response = $gateway->genericInsert($tableName,$data);
            break;
        case ['register_training', 'cr']:
            $tableName = 'trainingregister';

            $training_name = $_POST['training_name'];
            $training_host = $_POST['training_host'];
            $training_location = $_POST['training_location'];
            $training_sponsor = $_POST['training_sponsor'];
            $training_type = $_POST['training_type'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];

            $data = array(  'vtname'=>$training_name,
                            'cthostid'=>$training_host,
                            'vtlocation'=>$training_location,
                            'cspshipid'=>$training_sponsor,
                            'cttypeid'=>$training_type,
                            'dedc'=>$start_date,
                            'deed'=>$end_date
                        );
            $response = $gateway->genericInsert($tableName,$data);
            break;
        case ['beneficiary', 'cr']:
            $tableName = 'beneficiary';

            $beneficiary = $_POST['beneficiary'];
            $training = $_POST['training'];
            $cadre = $_POST['cadre'];
            $evaluation = $_POST['evaluation'];

            $data = array(  'vfileno'=>$beneficiary,
                            'ctcode'=>$training,
                            'icadre'=>$cadre,
                            'ftevaluation'=>$evaluation
                        );
            $response = $gateway->genericInsert($tableName,$data);
            echo json_encode($response);
            break;
        case ['sponsorship', 'cr']:
            $tableName = 'sponsorshiptype';

            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $sponsor = $_POST['sponsor'];

            $data = array(  'vspshipemailid'=>$email,
                            'vspshiphone'=>$phone,
                            'vspshipname'=>$sponsor
                        );
            $response = $gateway->genericInsert($tableName,$data);
            echo json_encode($response);
            break;
        case ['training_type', 'cr']:
            $tableName = 'trainingtype';

            $typeName = $_POST['type_name'];
            $data = array(  'vttypename'=>$typeName);

            $response = $gateway->genericInsert($tableName,$data);
            echo json_encode($response);
            break;

        case['host_training', 'u']: 
            $tableName = 'traininghost';
            $host_name = $_POST['host_name'];
            //$id = $_SESSION['host_training_id'];
            $id = 2;

            $data = array(
                            'id_name'=>'cthostid',
                            'id_value'=>$id,
                            'vthostname'=>$host_name
                        );
            $response = $gateway->genericUpdate($tableName, $data);
            echo json_encode($response);
            break;

        case['register_training', 'u']:
            $tableName = 'trainingregister';
            $id = $_SESSION['register_training_id'];

            $training_name = $_POST['training_name'];
            $training_host = $_POST['training_host'];
            $training_location = $_POST['training_location'];
            $training_sponsor = $_POST['training_sponsor'];
            $training_type = $_POST['training_type'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];

            $data = array(  'id_name'=>'ctcode',
                            'id_value'=>$id,
                            'vtname'=>$training_name,
                            'cthostid'=>$training_host,
                            'vtlocation'=>$training_location,
                            'cspshipid'=>$training_sponsor,
                            'cttypeid'=>$training_type,
                            'dedc'=>$start_date,
                            'deed'=>$end_date
                        );
            $response = $gateway->genericUpdate($tableName, $data);
            break;
            
        case ['beneficiary', 'u']:
            $tableName = 'beneficiary';
            $id = $_SESSION['beneficiary_id'];
            $beneficiary = $_POST['beneficiary'];

            $data = array(  'id_name'=>'vtfileno',
                            'id_value'=>$id,
                            'vtfileno'=>$beneficiary
                        );
            $response = $gateway->genericUpdate($tableName, $data);
            break;
        
        case['sponsorhip', 'u']:
            $tableName = 'sponsorshiptype';

            $id = $_SESSION['sponsorship_id'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $sponsor = $_POST['sponsor'];
            
            $data = array(  'id_name'=>'vspshipemailid',
                            'id_value'=>$id,
                            'vspshipemailid'=>$email,
                            'vspshiphone'=>$phone,
                            'vspshipname'=>$sponsor
                        );
            $response = $gateway->genericUpdate($tableName, $data);
            break;
            
        case ['training_type', 'u']:
            $tableName = 'trainingtype';
            $id = $_SESSION['training_type_id'];
            $typeName = $_POST['type_name'];
            
            $data = array(  'id_name'=>'vttypename',
                            'id_value'=>$id,
                            'vttypename'=>$typeName
                        );
                        
            $response = $gateway->genericUpdate($tableName, $data);
        
        case['host_training', 'de']:
            $tableName = 'traininghost';
            //$id = $_SESSION['host_training_id'];
            $id = 'all';
            $data = array('id_name'=>'cthostid', 'id_value' => $id);

            $response = $gateway->genericDelete($tableName, $data);
            break;
            
        case ['register_training', 'de']:
            $tableName = 'trainingregister';
            $id = $_SESSION['register_training_id'];
            
            $data = array('id_name'=>'ctcode', 'id_value' => $id);
            
            $response = $gateway->genericDelete($tableName, $data);
            break;
            
        case ['beneficiary', 'de']:
            $tableName = 'beneficiary';
            $id = $_SESSION['beneficiary_id'];
            
            $data = array('id_name'=>'vtfileno', 'id_value' => $id);
            
            $response = $gateway->genericDelete($tableName, $data);
            break;
            
        case ['sponsorship', 'de']:
            $tableName = 'sponsorshiptype';
            $id = $_SESSION['sponsorship_id'];
            
            $data = array('id_name'=>'vspshipemailid', 'id_value' => $id);
            
            $response = $gateway->genericDelete($tableName, $data);
            break;
            
        case ['training_type', 'de']:
            $tableName = 'trainingtype';
            $id = $_SESSION['training_type_id'];
            
            $data = array('id_name'=>'vttypename', 'id_value' => $id);
            
            $result = $gateway->genericDelete($tableName, $data);
            if($result > 0){
                $response = array('message'=>'success');
            }else{
                $response = array('message'=>'failed');
            }
            echo json_encode($response);
            break;
        
        case ['host_training', 'find']:
            $tableName = 'traininghost';
            $id = 2;
            //$host_name = $_POST['host_name'];
            $data = array('all' => false, 'limit' => '', 'id_name'=>'cthostid', 'id_value'=>$id);
            
            $result = $gateway->genericFind($tableName, $data);
            echo json_encode($result);
            break;
            
        case ['register_training', 'find']:
            $tableName = 'trainingregister';
            $id = $_SESSION['register_training_id'];
            $training_name = $_POST['training_name'];
            $data = array('all' => false, 'limit' => '', 'id_name'=>'ctcode', 'id_value'=>$id);
            
            $result = $gateway->genericFind($tableName, $data);
            echo json_encode($result);
            break;
            
        case ['beneficiary', 'find']:
            $tableName = 'beneficiary';
            $id = $_SESSION['beneficiary_id'];
            $beneficiary = $_POST['beneficiary'];
            $data = array('all' => false, 'limit' => '', 'id_name'=>'vtfileno', 'id_value'=>$id);
            
            $result = $gateway->genericFind($tableName, $data);
            echo json_encode($result);
            break;
            
        case ['sponsorship', 'find']:
            $tableName = 'sponsorshiptype';
            $id = $_SESSION['sponsorship_id'];
            $email = $_POST['email'];
            $data = array('all' => false, 'limit' => '', 'id_name'=>'vspshipemailid', 'id_value'=>$id);
            
            $result = $gateway->genericFind($tableName, $data);
            echo json_encode($result);
            break;
            
        case ['training_type', 'find']:
            $tableName = 'trainingtype';
            $id = $_SESSION['training_type_id'];
            $typeName = $_POST['type_name'];
            $data = array('all' => false, 'limit' => '', 'id_name'=>'vttypename', 'id_value'=>$id);
            
            $result = $gateway->genericFind($tableName, $data);
            echo json_encode($result);
            break;
            
        default:
        $response = array('error'=>true,'message'=>'Invalid action');
            
    }
        