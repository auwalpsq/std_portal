<?php
   
?>



<?php
  session_start();  

$ddate = date('Y-m-d');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL); require_once 'config/MyConnection.php';

$tableName = "trainingregister";
$data = array('id'=>'all', 'limit'=>'');
$trainings = $gateway->genericFind($tableName, $data);




 ?>
<!DOCTYPE html>

<html lang="en">
<!--<![endif]-->
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
        include "content/ben_details.php";
      ?>
      <!-- <p>
          <a href="javascript:history.back(-1);" class="btn btn-success">
              <i class="fa fa-arrow-circle-left"></i> Back to previous page
          </a>
      </p> -->
	
	<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
</div>

<?php 
    include_once 'template/baselevel_js.html';
?>
 



<!-- Initialize App Scripts -->
<script>
		$(document).ready(function() {
			App.init();
			TableManageTableSelect.init();
		});

  
</script>
</body>
</html>
