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
$dbConnection = $database->dbConnect();

$grad =new GenericGateway($dbConnect);




// $resp=$grad->findAll_limit(30);

$req_results=$resp;



$records=array();
$records['list'] =array();
if(!empty($req_results) && count($req_results)>0){
  $rcnt =count($req_results);
  for($i=0;$i<=$rcnt-1;$i++){
  array_push($records["list"], $req_results[$i]);
  }
}

// $prog=$grad->findByProg();



// var_dump($prog);
// exit;
  
$title="Graduate List ";
$json_data = array();
$_SESSION['title']="ST&D Portal Management System";

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
        include "content/stf_list_details.php";
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
 <!-- <script>
    $(window).load(function() {
    $(".loader").fadeOut("slow");
    $(".loading").hide();
  });
		$(document).ready(function() {
			App.init();

			 var _delay = 3000;
            function checkLoginStatus(){
             $.get("checkStatus.php", function(data){
                if(data!=="1") {
                    window.location = "./";
                }
                setTimeout(function(){  checkLoginStatus(); }, _delay);
                });
            }
            checkLoginStatus();
            
            for (i = 1; i <=<?php echo json_encode($pn); ?>; i++) {
                $(".page" + i).hide();
            }
            var page ="page1";
            $("." + page).show();
            
            $("#search-grid").keyup ( function (){
                var txt =  $("#search-grid").val();
                if (txt==""){
                $('.page').hide();
                $(".page1").show();
                }else{
                $('.page').hide();
                $('.page').each(function(){
                    if($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1){
                        $(this).show();
                    }
                });
                }
            })

            function alignModal(){
                        var modalDialog = $(this).find(".modal-dialog");
                        // Applying the top margin on modal dialog to align it vertically center
                        modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
                }
                // Align modal when it is displayed
                $(".modal").on("shown.bs.modal", alignModal);
                // Align modal when user resize the window
                $(window).on("resize", function(){
                        $(".modal:visible").each(alignModal);
                });
		});

    $('#page-selection').bootpag({
            total: <?php echo json_encode($pn); ?>,
            page: 1,
            maxVisible: 10,
            leaps: true,
            firstLastUse: true,
            first: '←',
            last: '→',
            wrapClass: 'pagination',
            activeClass: 'active',
            disabledClass: 'disabled',
            nextClass: 'next',
            prevClass: 'prev',
            lastClass: 'last',
            firstClass: 'first'
        }).on("page", function(event, num){
          for (i = 1; i <=<?php echo json_encode($pn); ?>; i++) {
              //text = "page"+num;
              $(".page" + i).hide();
          }
          var page ="page"+num;         
          $("." + page).show();
      });
    
  $(function(){
  $("a.hidelink").each(function (index, element){
      var href = $(this).attr("href");
      $(this).attr("hiddenhref", href);
      $(this).removeAttr("href");
  });
  $("a.hidelink").click(function(){
      url = $(this).attr("hiddenhref");
      window.open(url, '_self');
  })
});
    </script> -->




<!-- Initialize App Scripts -->
<script>
  $(document).ready(function () {
    App.init();
   
  });
</script>
    <script>
    $(window).on('load', function() {
        $('#page-loader').fadeOut();
    });
</script>
</body>
</html>
