<?php
  session_start();  

$ddate = date('Y-m-d');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use std_portal\std_gateways\GenericGateway;
require_once 'std_gateways/GenericGateway.php';
include_once 'config/DatabaseConfig.php';
$database = new DatabaseConfig();      
$dbConnect = $database->dbConnect();

$gateway =new GenericGateway($dbConnect);

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
]    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <!-- end #page-loader -->

    <div id="page-container" class="fade page-with-sidebar page-header-fixed">
   

        <?php
        include "inc/mega_menu.php";
        include "inc/a_sidebar.php";
        include "content/tr_type_list_details.php";
        include "inc/footer.php";

        include_once 'template/baselevel_js.html';
         ?>
    <script>

    
    
    </script>

    </div>
</body>
<script>
		$(document).ready(function() {
			App.init();
      $('#data-table').DataTable();
      // new DataTable('#data-table', {
      //   layout: {
      //     topStart: 'pageLength',
      //     topEnd: 'search'
      //   },
      // });
      // TableManageTableSelect.init();
			// FormWizardValidation.init();
		});
	</script>

</html>
