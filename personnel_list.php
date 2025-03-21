<?php
session_start();  

$ddate = date('Y-m-d');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once 'config/MyConnection.php';

$table_faculty = 'faculty';
$data_faculty = array('id'=> 'all', 'limit' => '');
$result_faculty = $gateway->genericFind($table_faculty, $data_faculty);

$table_directorate = 'directorate';
$data_directorate = array('id'=> 'all', 'limit' => '');
$result_directorate = $gateway->genericFind($table_directorate, $data_directorate);

$table_personnel = 'personnel';
$data_personnel = array('id'=> 'all', 'limit' => '');
$result_personnel = $gateway->genericFind($table_personnel, $data_personnel);
if(!isset($_SESSION['username']) || empty($_SESSION['username']) || !isset($_SESSION['password']) || empty($_SESSION['password'])){
    $_SESSION['login_error'] = 'Please login first';
    header('Location: login');
    exit();
}
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

    <div id="page-container" class="fade page-with-sidebar page-header-fixed">
   

        <?php
        include "inc/mega_menu.php";
        include "inc/a_sidebar.php";
        include "content/personnel_list_details.php";
        // include "inc/footer.php";

        include_once 'template/baselevel_js.html';
         ?>
    <script>
    
    </script>

    </div>
</body>
<script>
		$(document).ready(function() {
			App.init();
		});
	</script>

</html>
