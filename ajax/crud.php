<?php
session_start();
    use std_portal\std_gateways\GenericGateway;
    require_once '../std_gateways/GenericGateway.php';
    require_once '../config/DatabaseConfig.php';
    require_once '../config/ConfigureEmail.php';

    $database = new DatabaseConfig();
    $dbConnect = $database->dbConnect();

    $gateway = new GenericGateway($dbConnect);

    $operation = $_POST['operation'];
    $type = $_POST['type'];
    switch([$type, $operation]){
        case ['institution', 'cr']:{
            $table_institution = 'institution';
            $name = $_POST['institution_name'];
            $code = $_POST['institution_code'];
            $email = $_POST['institution_email'];
            $phone = $_POST['institution_phone'];
            $address = $_POST['institution_address'];
            $data_institution = array('instname'=>$name, 'instcode'=>$code, 'email'=>$email, 'phone'=>$phone, 'address'=>$address);
            $response_institution = $gateway->genericInsert($table_institution, $data_institution);
            echo json_encode($response_institution);
            break;
        }
        case ['institution', 'u']:{
            $table_institution = 'institution';
            $inst_id = $_POST['institution_id'];
            $name = $_POST['institution_name'];
            $code = $_POST['institution_code'];
            $email = $_POST['institution_email'];
            $phone = $_POST['institution_phone'];
            $address = $_POST['institution_address'];
            $data_institution = array('id'=>$inst_id, 'field_name'=>'institutionId', 'instname'=>$name, 'instcode'=>$code, 'email'=>$email, 'phone'=>$phone, 'address'=>$address);
            
            $response_institution = $gateway->genericUpdate($table_institution, $data_institution);
            echo json_encode($response_institution);
            break;
        }
        case ['institution', 'de']:{
            $table_institution = 'institution';
            $inst_id = $_POST['id'];
            $data_institution = array('all'=>'', 'institutionId'=>$inst_id, 'condition'=>'');
            
            $response_institution = $gateway->genericDelete($table_institution, $data_institution);
            echo json_encode($response_institution);
            break;
        }
        case ['institution', 'find']:{
            $table_institution = 'institution';
            $inst_id = $_POST['id'];
            $data_institution = array('field_name'=>'institutionId', 'id'=>$inst_id);
            
            $response_institution = $gateway->findOne($table_institution, $data_institution);
            if($response_institution['message'] === 'success'){
                $institution = array('message'=>$response_institution['message'],
                                    'id' => $response_institution['result']['institutionId'],
                                    'name' => $response_institution['result']['instname'],
                                    'code' => $response_institution['result']['instcode'],
                                    'email' => $response_institution['result']['email'],
                                    'phone' => $response_institution['result']['phone'],
                                    'address' => $response_institution['result']['address']
                                );
            }else{
                $institution = array('message'=>$response_institution['message'], 'result'=>'No Record Available');
            }
            echo json_encode($institution);
            break;
        }
        case ['category', 'fetch']:{
            $category = $_POST['category'];
            $table_category = 'directorate';
            $data_category = array('limit'=>'', 'field_name'=>'category', 'id'=>$category);
            
            $response_category = $gateway->genericFind($table_category, $data_category);
            if($response_category['message'] === 'success'){
                $categories = $category === 'academic' ? "<option value=''>--Select Faculty--</option>" : "<option value=''>--Select Directorate--</option>";
                foreach($response_category['result'] as $category){
                    $categories .= "<option value='$category[directorate_id]'>$category[name]</option>";
                }
            }else{
                $categories = "<option value=''>No Record Available</option>";
            }
            echo $categories;
            break;

        }
        case ['department', 'fetch']:{
            $table_department = 'department';
            $faculty_id = $_POST['faculty_id'];
            $data_department = array('id'=>$faculty_id, 'limit'=>'', 'field_name'=>'faculty_id');
            
            $response_department = $gateway->genericFind($table_department, $data_department);
            if($response_department['message'] === 'success'){
                $departments = "";
                foreach($response_department['result'] as $department){
                    $departments .= "<option value='$department[department_id]'>$department[name]</option>";
                }
            }else{
                $departments = "<option value=''>No Record Available</option>";
            }
            echo $departments;
            break;
        }
        case ['unit', 'fetch']: {
            $table_unit = 'unit';
            $directorate_id = $_POST['directorate_id'];
            $data_unit = array('id'=>$directorate_id, 'limit'=>'', 'field_name'=>'directorate_id');
            
            $response_unit = $gateway->genericFind($table_unit, $data_unit);
            if($response_unit['message'] ==='success'){
                $units = "";
                foreach($response_unit['result'] as $unit){
                    $units.= "<option value='$unit[unit_id]'>$unit[name]</option>";
                }
            }else{
                $units = "<option value=''>No Record Available</option>";
            }
            echo $units;
            break;
        }
        case ['unit', 'cr']:{
            $table_unit = 'unit';
            $unit_name = $_POST['unit_name'];
            $directorate_id = $_POST['directorate'];
            $data_unit = array('name'=>$unit_name, 'directorate_id'=>$directorate_id, 'user_id'=>$_SESSION['user_id']);
            
            $response_unit = $gateway->genericInsert($table_unit, $data_unit);
            echo json_encode($response_unit);
            break;
        }
        case ['unit', 'u']:{
            $table_unit = 'unit';
            $unit_id = $_POST['unit_id'];
            $data_unit = array('id'=>$unit_id, 'name'=>$_POST['unit_name'], 'directorate_id'=>$_POST['directorate'], 'field_name'=>'unit_id');
            
            $response_unit = $gateway->genericUpdate($table_unit, $data_unit);
            echo json_encode($response_unit);
            break;
        }
        case ['unit', 'de']:{
            $table_unit = 'unit';
            $unit_id = $_POST['unit_id'];
            $data_unit = array('all'=>'', 'unit_id'=>$unit_id, 'condition'=>'');
            
            $response_unit = $gateway->genericDelete($table_unit, $data_unit);
            echo json_encode($response_unit);
            break;
        }
        case ['unit', 'find']:{
            $table_unit = 'unit';
            $unit_id = $_POST['unit_id'];
            $data_unit = array('field_name'=>'unit_id', 'id'=>$unit_id);
            
            $response_unit = $gateway->findOne($table_unit, $data_unit);
            $unit = array('message'=>$response_unit['message'], 'id' => $response_unit['result']['unit_id'], 'unit_name' => $response_unit['result']['name'], 'directorate_id' => $response_unit['result']['directorate_id']);
            echo json_encode($unit);
            break;
        }
        case ['directorate', 'cr']:{
            $table_directorate = 'directorate';
            $directorate = $_POST['directorate_name'];
            $category = $_POST['category'];
            $data_directorate = array('name'=>$directorate, 'category'=>$category);
            
            $response_directorate = $gateway->genericInsert($table_directorate, $data_directorate);
            echo json_encode($response_directorate);
            break;
        }
        case ['directorate', 'find']:{
            $table_directorate = 'directorate';
            $directorate_id = $_POST['directorate_id'];
            $data_directorate = array('field_name'=>'directorate_id', 'id'=>$directorate_id);
            
            $response_directorate = $gateway->findOne($table_directorate, $data_directorate);
            $directorate = array('message'=>$response_directorate['message'],
                                'id' => $response_directorate['result']['directorate_id'],
                                'directorate_name' => $response_directorate['result']['name'],
                                'category' => $response_directorate['result']['category']);
            echo json_encode($directorate);
            break;
        }
        case ['directorate', 'u']:{
            $table_directorate = 'directorate';
            $directorate_id = $_POST['directorate_id'];
            $data_directorate = array('id'=>$directorate_id, 'name'=>$_POST['directorate_name'], 'category'=>$_POST['category'], 'field_name'=>'directorate_id');
            
            $response_directorate = $gateway->genericUpdate($table_directorate, $data_directorate);
            echo json_encode($response_directorate);
            break;
        }
        case ['directorate', 'de']:{
            $table_directorate = 'directorate';
            $directorate_id = $_POST['directorate_id'];
            $data_directorate = array('all'=>'', 'directorate_id'=>$directorate_id, 'condition'=>'');
            
            $response_directorate = $gateway->genericDelete($table_directorate, $data_directorate);
            echo json_encode($response_directorate);
            break;
        }
        case ['department', 'find']:{
            $table_department = 'department';
            $department_id = $_POST['department_id'];
            $data_department = array('field_name'=>'department_id', 'id'=>$department_id);
            
            $response_department = $gateway->findOne($table_department, $data_department);
            $department = array('message'=>$response_department['message'], 'id' => $response_department['result']['department_id'], 'department_name' => $response_department['result']['name'], 'faculty_id' => $response_department['result']['faculty_id']);
            echo json_encode($department);
            break;
        }
        case ['department', 'cr']:{
            $table_department = 'department';
            $department = $_POST['department_name'];
            $faculty_id = $_POST['faculty'];
            $data_department = array('faculty_id'=>$faculty_id, 'name'=>$department);
            
            $response_department = $gateway->genericInsert($table_department, $data_department);
            echo json_encode($response_department);
            break;
        }
        case['department', 'u']:{
            $table_department = 'department';
            $department_id = $_POST['department_id'];
            $faculty_id = $_POST['faculty'];
            $data_department = array('id'=>$department_id, 'faculty_id'=>$faculty_id, 'name'=>$_POST['department_name'], 'field_name'=>'department_id');
            
            $response_department = $gateway->genericUpdate($table_department, $data_department);
            echo json_encode($response_department);
            break;
        }
        case ['department', 'de']:{
            $table_department = 'department';
            $department_id = $_POST['department_id'];
            $data_department = array('all'=>'', 'department_id'=>$department_id, 'condition'=>'');
            
            $response_department = $gateway->genericDelete($table_department, $data_department);
            echo json_encode($response_department);
            break;
        }
        case ['faculty', 'cr']:{
            $table_faculty = 'directorate';
            $data_faculty = array('name' => $_POST['faculty_name'], 'category' => $_POST['category']);

            $response_faculty = $gateway->genericInsert($table_faculty, $data_faculty);
            echo json_encode($response_faculty);
            break;
        }
        case ['faculty', 'u']:{
            $table_faculty = 'faculty';
            $faculty_id = $_POST['faculty_id'];
            $data_faculty = array('id' => $faculty_id, 'name' => $_POST['faculty_name'], 'category'=>$_POST['category'], 'field_name' => 'faculty_id');

            $response_faculty = $gateway->genericUpdate($table_faculty, $data_faculty);
            echo json_encode($response_faculty);
            break;
        }
        case ['faculty', 'de']:{
            $table_faculty = 'faculty';
            $faculty_id = $_POST['faculty_id'];
            $data_faculty = array('all'=>'', 'faculty_id' => $faculty_id, 'condition' => '');

            $response_faculty = $gateway->genericDelete($table_faculty, $data_faculty);
            echo json_encode($response_faculty);
            break;
        }
        case ['faculty', 'find']:{
            $table_faculty = 'faculty';
            $faculty_id = $_POST['faculty_id'];
            $data_faculty = array('field_name' => 'faculty_id', 'id' => $faculty_id);

            $response_faculty = $gateway->findOne($table_faculty, $data_faculty);
            $faculty = array('message'=>$response_faculty['message'], 'id' => $response_faculty['result']['faculty_id'], 'faculty_name' => $response_faculty['result']['name']);
            echo json_encode($faculty);
            break;
        }     
        case['study_leave', 'cr']:{
            $tableName = 'staff_on_leave';
            $data = array(
                'personnel_id'=> $_POST['personnel_id'],
                'inst_id'=> $_POST['institution'],
                'programme'=> $_POST['programme'],
                'discipline'=> $_POST['discipline'],
                'cspshipid'=> $_POST['sponsor'],
                'sdate'=> $_POST['start_date'],
                'edate'=> $_POST['end_date'],
                'remarks'=> $_POST['remark'],
                'status'=> $_POST['status']
            );
            $response = $gateway->genericInsert($tableName, $data);
            echo json_encode($response);
            break;
        }
        case['study_leave','u']:{
            $tableName = 'staff_on_leave';
            $leave_id = $_POST['leave_id'];

            $data = array(
                'id'=>$leave_id,
                'field_name'=>'leave_id',
                'personnel_id'=> $_POST['personnel_id'],
                'inst_id'=> $_POST['institution'],
                'programme'=> $_POST['programme'],
                'discipline'=> $_POST['discipline'],
                'cspshipid'=> $_POST['sponsor'],
                'sdate'=> $_POST['start_date'],
                'edate'=> $_POST['end_date'],
                'remarks'=> $_POST['remark'],
                'status'=> $_POST['status']
            );
            $response = $gateway->genericUpdate($tableName, $data);
            echo json_encode($response);
            break;
        }
        case['study_leave','find']:{
            $leave = $gateway->findOne('staff_on_leave', array('id'=>$_POST['id'], 'field_name'=>'leave_id'));
            if($leave['message'] === 'success'){
                $personnel_id = $leave['result']['personnel_id'];
                $personnel = $gateway->findOne('vw_personnel_details', array('id'=>$personnel_id, 'field_name'=>'personnel_id'));
                
                $response = array(
                                    'message'=>'success',
                                    'personnel_id'=>$leave['result']['personnel_id'],
                                    'first_name'=> $personnel['result']['first_name'],
                                    'surname'=> $personnel['result']['surname'],
                                    'other_names'=> $personnel['result']['other_names'],
                                    'email'=> $personnel['result']['email'],
                                    'directorate'=> $personnel['result']['directorate'],
                                    'unit'=> $personnel['result']['unit'],
                                    'leave_id'=> $leave['result']['leave_id'],
                                    'institution'=> $leave['result']['inst_id'],
                                    'programme'=> $leave['result']['programme'],
                                    'discipline'=> $leave['result']['discipline'],
                                    'sponsor'=> $leave['result']['cspshipid'],
                                   'start_date'=> $leave['result']['sdate'],
                                   'end_date'=> $leave['result']['edate'],
                                   'remark'=> $leave['result']['remarks'],
                                   'status'=> $leave['result']['status']
                                );
            }else{
                $response = array('message'=>'failed', 'result'=>'No Record Available');
            }
            echo json_encode($response);
            break;
        }
        case['study_leave','de']:{
            $tableName = 'staff_on_leave';
            $leave_id = $_POST['id'];
            
            $data = array('all'=>'no', 'condition'=>'', 'leave_id'=>$leave_id);
            
            $response = $gateway->genericDelete($tableName, $data);
            echo json_encode($response);
            break;
        }
        case['user', 'u']:{
            $tableName = 'users';
            $user_id = $_POST['user_id'];

            $data = array('id'=>$user_id, 'password'=>'default', 'activated'=>0, 'field_name'=>'user_id');

            $response = $gateway->genericUpdate($tableName, $data);
            echo json_encode($response);
            break;
        }
        case['user', 'de']:{
            $tableName = 'users';
            $user_id = $_POST['user_id'];

            $data = array('all'=>'', 'condition'=>'', 'user_id'=>$user_id);
            
            $response = $gateway->genericDelete($tableName, $data);
            echo json_encode($response);
            break;
        }
        case['user', 'cr']:{
            $tableName = 'users';
            $personnel_id = $_POST['personnel_id'];
            $user_type = $_POST['user_type'];
            $email = $_POST['email'];
            
            $data = array('staff_id'=>$personnel_id, 'email'=>$email, 'user_type'=>$user_type);

            $response = $gateway->genericInsert($tableName,$data);
            echo json_encode($response);
            break;
        }
        case ['host_training', 'cr']:
            $tableName = 'traininghost';
            $host_name = $_POST['host_name'];
            
            $data = array('name' => $host_name);

            $response = $gateway->genericInsert($tableName,$data);
            echo json_encode($response);
            break;
        case ['register_training', 'cr']:
            $tableName = 'trainingregister';

            $training_name = $_POST['training_name'];
            $training_host = $_POST['training_host'];
            $training_location = $_POST['training_location'];
            $training_slot = $_POST['training_slot'];
            $training_sponsor = $_POST['training_sponsor'];
            $training_type = $_POST['training_type'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];

            $data = array(  'name'=>$training_name,
                            'host_id'=>$training_host,
                            'location'=>$training_location,
                            'slot'=>$training_slot,
                            'sponsor_id'=>$training_sponsor,
                            'type_id'=>$training_type,
                            'start_date'=>$start_date,
                            'end_date'=>$end_date
                        );
            $response = $gateway->genericInsert($tableName,$data);
            echo json_encode($response);
            break;
        case ['beneficiary', 'cr']:
            $tableName = 'beneficiary';

            $beneficiary = $_POST['id'];
            $training = $_POST['training_id'];

            $data = array(  'personnel_id'=>$beneficiary,
                            'training_id'=>$training
                        );
            $response = $gateway->genericInsert($tableName,$data);
            echo json_encode($response);
            break;
        case ['sponsorship', 'cr']:
            $tableName = 'sponsorshiptype';

            $email = $_POST['sponsor_email'];
            $phone = $_POST['sponsor_phone'];
            $sponsor = $_POST['sponsor_name'];

            $data = array(  'vspshipemailid'=>$email,
                            'vspshiphone'=>$phone,
                            'vspshipname'=>$sponsor
                        );
            $response = $gateway->genericInsert($tableName,$data);
            $response['email_response'] = '';
            if($response['message'] === 'success'){
                $response['result']['message'] = "$sponsor has been added as sponsor";
                $to[] = $email;
                $subject = 'New Sponsorship';
                $message = "Hello <strong>$sponsor,</strong> <br> This is to inform you that, you have been added as sponsor. <br> Regards, <br> NOUN personnel Development and Training (ST&D)";
                $email_response = sendEmail($to, $subject, $message);
                $response['email_response'] = $email_response;
            }
            echo json_encode($response);
            break;
        case ['personnel', 'cr']:
            $tableName = 'personnel';

            $firstName = $_POST['first_name'];
            $surname = $_POST['surname'];
            $otherNames = $_POST['other_names'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $category = $_POST['category'];
            $directorate_id = $_POST['directorate'];
            $unit_id = $_POST['unit'];
            $dateOfBirth = $_POST['date_of_birth'];
            
            $data = array(  'first_name'=>$firstName, 
                            'surname'=>$surname, 
                            'other_names'=>$otherNames, 
                            'email'=>$email,
                            'gender'=>$gender,
                            'category'=>$category,
                            'directorate_id'=>$directorate_id,
                            'unit_id'=>$unit_id,  // this is the department_id in our system, not the unit_id in the table.
                            'date_of_birth'=>$dateOfBirth
                        );
            $response = $gateway->genericInsert($tableName,$data);
            echo json_encode($response);
            break;
        case ['beneficiary', 'cr']:
            $tableName = 'beneficiary';

            $beneficiary = $_POST['personnel_id'];
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
        case['training_type', 'cr']:
            $tableName = 'trainingtype';

            $trainingName = $_POST['tr_type_name'];

            $data = array('vttypename' => $trainingName);

            $response = $gateway->genericInsert($tableName,$data);
            echo json_encode($response);
            break;
        case['host_training', 'u']: 
            $tableName = 'traininghost';
            $host_name = $_POST['host_name'];
            $id = $_POST['id'];

            $data = array(
                            'field_name'=>'host_id',
                            'id'=>$id,
                            'name'=>$host_name
                        );
            $response = $gateway->genericUpdate($tableName, $data);
            echo json_encode($response);
            break;

        case['register_training', 'u']:
            $tableName = 'trainingregister';
            $id = $_POST['id'];

            $training_name = $_POST['training_name'];
            $training_host = $_POST['training_host'];
            $training_location = $_POST['training_location'];
            $training_sponsor = $_POST['training_sponsor'];
            $training_type = $_POST['training_type'];
            $training_slot = $_POST['training_slot'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];

            $data = array(  'field_name'=>'training_id',
                            'id'=>$id,
                            'name'=>$training_name,
                            'host_id'=>$training_host,
                            'location'=>$training_location,
                            'sponsor_id'=>$training_sponsor,
                            'type_id'=>$training_type,
                            'slot'=>$training_slot,
                            'start_date'=>$start_date,
                            'end_date'=>$end_date
                        );
            $response = $gateway->genericUpdate($tableName, $data);
            echo json_encode($response);
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
        
        case['sponsorship', 'u']:
            $tableName = 'sponsorshiptype';

            $id = $_POST['sponsor_id'];
            $email = $_POST['sponsor_email'];
            $phone = $_POST['sponsor_phone'];
            $sponsor = $_POST['sponsor_name'];
            
            $data = array(  'field_name'=>'cspshipid',
                            'id'=>$id,
                            'vspshipemailid'=>$email,
                            'vspshiphone'=>$phone,
                            'vspshipname'=>$sponsor
                        );
            $response = $gateway->genericUpdate($tableName, $data);
            $response['email_response'] = '';
            echo json_encode($response);
            break;
            
        case ['training_type', 'u']:
            $tableName = 'trainingtype';
            $id = $_POST['tr_type_id'];
            $typeName = $_POST['tr_type_name'];
            
            $data = array(  'field_name'=>'cttypeid',
                            'id'=>$id,
                            'vttypename'=>$typeName
                        );
                        
            $response = $gateway->genericUpdate($tableName, $data);
            echo json_encode($response);
            break;
            
        case ['personnel', 'u']:
            $tableName = 'personnel';
            $id = $_POST['personnel_id'];
            $firstName = $_POST['first_name'];
            $surname = $_POST['surname'];
            $otherNames = $_POST['other_names'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $dateOfBirth = $_POST['date_of_birth'];
            $category = $_POST['category'];
            $directorate = $_POST['directorate'];
            $unit = $_POST['unit'];
            
            $data = array(  'id'=>$id,
                            'field_name'=>'personnel_id',
                            'first_name'=>$firstName,
                            'surname'=>$surname,
                            'other_names'=>$otherNames,
                            'gender'=>$gender,
                            'email'=>$email,
                            'category'=>$category,
                            'directorate_id'=>$directorate,
                            'unit_id'=>$unit,
                            'date_of_birth'=>$dateOfBirth
                        );
            $response = $gateway->genericUpdate($tableName, $data);
            echo json_encode($response);
            break;
        case['personnel', 'de']:
            $tableName = 'personnel';
            $id = $_POST['personnel_id'];
            $data = array('all'=>'', 'condition'=>'', 'personnel_id'=>$id);

            $result = $gateway->genericDelete($tableName, $data);
            echo json_encode($result);
            break;
        case['host_training', 'de']:
            $tableName = 'traininghost';
            $id = $_POST['id'];
            $data = array('all'=>'', 'condition'=>'', 'host_id'=>$id);

            $result = $gateway->genericDelete($tableName, $data);
            
            echo json_encode($result);
            break;
            
        case ['register_training', 'de']:
            $tableName = 'trainingregister';
            $id = $_POST['id'];
            
            $data = array('all'=>'', 'condition'=>'', 'training_id'=>$id);
            
            $result = $gateway->genericDelete($tableName, $data);
            
            echo json_encode($result);
            break;
            
        case ['beneficiary', 'de']:
            $tableName = 'beneficiary';
            $training_id = $_POST['training_id'];
            $personnel_id = $_POST['personnel_id'];
            
            $data = array('all'=>'', 'condition'=>'and', 'personnel_id'=>$personnel_id, 'training_id'=>$training_id);
            
            $result = $gateway->genericDelete($tableName, $data);
            // echo $result;
            // exit();
            echo json_encode($result);
            break;
            
        case ['sponsorship', 'de']:
            $tableName = 'sponsorshiptype';
            $id = $_POST['id'];
            
            $data = array('all'=>'', 'condition'=>'', 'cspshipid'=>$id);
            
            $result = $gateway->genericDelete($tableName, $data);
            
            echo json_encode($result);
            break;
            
        case ['training_type', 'de']:
            $tableName = 'trainingtype';
            $id = $_POST['id'];
            
            $data = array('all'=>'', 'condition' =>'', 'cttypeid'=>$id);
            
            $result = $gateway->genericDelete($tableName, $data);
            
            echo json_encode($result);
            break;
        
        case ['host_training', 'find']:
            $tableName = 'traininghost';
            $id = $_POST['id'];
            
            $data = array('id' => $id, 'limit' => '', 'field_name'=>'host_id');
            
            $results = $gateway->genericFind($tableName, $data);
            if($results['message'] === 'success'){
                $clientresult = ['message'=>'success'];
                foreach($results['result'] as $result){
                    $clientresult[] = array(
                        'id'=>$result['host_id'],
                        'host_name'=>$result['name']
                    );
                }
                echo json_encode($clientresult);
            }else{
                echo json_encode($results);
            }
            
            break;
            
        case ['register_training', 'find']:
            $tableName = 'trainingregister';
            $id = $_POST['id'];
            $data = array('id' => $id, 'limit' => '', 'field_name'=>'training_id');
            
            $raw_results = $gateway->genericFind($tableName, $data);
            if($raw_results['message'] === 'success'){
                $result = ['message'=>'success'];
                foreach($raw_results['result'] as $raw_result){
                    $result[] = array(
                                        'id'=>$raw_result['training_id'],
                                        'training_name'=>$raw_result['name'],
                                        'training_host'=>$raw_result['host_id'],
                                        'training_location'=>$raw_result['location'],
                                        'training_sponsor'=>$raw_result['sponsor_id'],
                                        'training_type'=>$raw_result['type_id'],
                                        'training_slot'=>$raw_result['slot'],
                                        'training_start_date'=>$raw_result['start_date'],
                                        'training_end_date'=>$raw_result['end_date']
                    );
                }
            }
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
            $id = $_POST['id'];
            
            $data = array('id' => $id, 'limit' => '', 'field_name'=>'cspshipid');
            
            $results = $gateway->genericFind($tableName, $data);
            $response = ['message'=>$results['message']];
            foreach($results['result'] as $result){
                $response[] = array(
                                'sponsor_id'=>$result['cspshipid'],
                                'sponsor_name'=>$result['vspshipname'],
                                'sponsor_email'=>$result['vspshipemailid'],
                                'sponsor_phone'=>$result['vspshiphone']
                            );
            }
            echo json_encode($response);
            break;
            
        case ['training_type', 'find']:
            $tableName = 'trainingtype';
            $id = $_POST['id'];
            $data = array('id' => $id, 'limit' => '', 'field_name'=>'cttypeid');
            
            $result = $gateway->genericFind($tableName, $data);
            $response = ['message'=>$result['message']];
            foreach($result['result'] as $result){
                $response[] = array(
                                'tr_type_id'=>$result['cttypeid'],
                                'tr_type_name'=>$result['vttypename']
                            );
            }
            echo json_encode($response);
            break;
        case ['personnel_details', 'find']:
            $tableName = 'personnel';
            $id = $_POST['personnel_id'];
            $fieldName ='personnel_id';
            if(filter_var($id, FILTER_VALIDATE_EMAIL)){
                $fieldName = 'email';
            }
            $data = array('id' => $id, 'limit' => '', 'field_name'=>$fieldName);
            
            $result_personnel = $gateway->genericFind($tableName, $data);
            if($result_personnel['message'] === 'success'){
                $response_personnel = ['message'=>'success'];
                foreach($result_personnel['result'] as $personnel){
                    $response_personnel[] = array(
                                        'personnel_id'=>$personnel['personnel_id'],
                                        'first_name'=>$personnel['first_name'],
                                        'surname'=>$personnel['surname'],
                                        'other_names'=>$personnel['other_names'],
                                        'email'=>$personnel['email'],
                                        'dob'=>$personnel['date_of_birth'],
                                        'directorate'=>$personnel['directorate_id'],
                                        'unit'=>$personnel['unit_id'],
                                        'gender'=>$personnel['gender'],
                                        'category'=>$personnel['category']
                                    );
                }
                $category = $result_personnel['result'][0]['category'];
                $table_category = 'directorate';
                $data_category = array('limit'=>'', 'field_name'=>'category', 'id'=>$category);
                $result_category = $gateway->genericFind($table_category, $data_category);
                if($result_category['message'] ==='success'){
                    $response_category = "";
                    foreach($result_category['result'] as $category){
                        $response_category .= "<option value='$category[directorate_id]'>$category[name]</option>";
                    }
                }else{
                    $response_category = "<option value=''>No Record Available</option>";
                }
                $directorate_id = $result_personnel['result'][0]['directorate_id'];
                $table_unit = 'unit';
                $data_unit = array('id'=>$directorate_id, 'limit'=>'', 'field_name'=>'directorate_id');
                $result_unit = $gateway->genericFind($table_unit, $data_unit);
                if($result_unit['message'] ==='success'){
                    $response_unit = "";
                    foreach($result_unit['result'] as $unit){
                        $response_unit .= "<option value='$unit[unit_id]'>$unit[name]</option>";
                    }
                }else{
                    $response_unit = "<option value=''>No Record Available</option>";
                }
                echo json_encode(array('personnel'=>$response_personnel, 'response_unit'=>$response_unit, 'response_category'=>$response_category));   
            }else{
                echo json_encode($result_personnel);
            }
            break;
        case ['personnel', 'find']:
            $personnel_id = $_POST['id'];
            $field_name = 'personnel_id';
            if(filter_var($personnel_id, FILTER_VALIDATE_EMAIL)){
                $field_name = 'email';
            }
            $table_personnel = 'vw_personnel_details';
            $data_personnel = array('id' => $personnel_id, 'field_name' => $field_name);

            $response_personnel = $gateway->findOne($table_personnel, $data_personnel);
            
            echo json_encode($response_personnel);
            break;
        default:
        $response = array('error'=>true,'message'=>'Invalid action');
            
    }
?>
     