<?php
  session_start();  
    if (!isset($_SESSION['id'])) {
    header("Location: login"); 
    exit(); 
}
//include "encr_decr_api.php";
$ddate = date('Y-m-d');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);



use alumni\TableGateways\AlumniGraduateGateway;


require_once 'TableGateways/AlumniGraduateGateway.php';

include_once 'config/DBConnection.php'; 
$database = new DBConnection();      
$dbConnection = $database->dbConnect();




$grad=new AlumniGraduateGateway($dbConnection);// AlumniGraduateGateway($dbConnection); 




// Fetch the record for the current session ID
$tableName = 'graduates';
$field = 'vMatricno';	
$id = $_SESSION['matric'];

$resp = $grad->genericFind($tableName, $field, $id);
$records = !empty($resp) ? $resp[0] : null;  // Get the first record if it exists

if ($records) {
    $records['list'][] = $records;  }




$rcnt = $records ? 1 : 0;  // Set $rcnt to 1 if a record exists, otherwise 0

 ?>
 
<!DOCTYPE html>

<html lang="en">

<?php 
 include_once 'template/header.html';
 include_once 'template/custom_style.html';
?>



<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="fade page-with-sidebar page-header-fixed">

      <?php
        include "inc/mega_menu.php";		
        include "inc/a_sidebar.php";	
        include "content/stud_info_details.php";
      ?>
      <p>
          <a href="javascript:history.back(-1);" class="btn btn-success">
              <i class="fa fa-arrow-circle-left"></i> Back to previous page
          </a>
      </p>
	
	<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
</div>

<?php 
    include_once 'template/baselevel_js.html';
?>
<script>
  $(document).ready(function () {
    App.init();
   
  });
</script>
</body>
</html>
