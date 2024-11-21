<?php
session_start();
  if (!isset($_SESSION['id'])) {
    header("Location: login"); 
    exit(); 
}

error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);       

set_error_handler(function($error, $message, $file, $line) {
    $logMessage = "[" . date("Y-m-d H:i:s") . "] error: [$error] - $message in $file on line $line";
    error_log($logMessage . PHP_EOL . PHP_EOL, 3, "error_log.txt"); 
});

use alumni\TableGateways\AlumniGraduateGateway;

require_once 'TableGateways/AlumniGraduateGateway.php';
include_once 'config/DBConnection.php';

// Connect to the database and initialize the gateway class
$database = new DBConnection();
$dbConnection = $database->dbConnect();

$grad = new AlumniGraduateGateway($dbConnection);

// Initialize records array
$records = array();
$records['list'] = array();

// Check if form is submitted
if (isset($_POST['studycentre']) || isset($_POST['year'])) {
    // Form submitted: Get the program and year from the form submission
    $column = 'cstudycenterid';
    $Id = isset($_POST['studycentre']) ? $_POST['studycentre'] : null;
    $year = isset($_POST['year']) ? $_POST['year'] : null;

    // Fetch graduates by program and year
    $req_results = $grad->generalFind($column, $Id, $year);
    if (!empty($req_results) && count($req_results) > 0) {
        foreach ($req_results as $result) {
            $records['list'][] = $result;
        }
    }

    // Fetch the program name based on the program ID
    $centreName = "";
    $centre = $grad->findByCentre();
    foreach ($centre as $value) {
        if ($value['cstudycenterid'] == $Id) {
            $centreName = $value['vcityname'];
            break;
        }
    }

    // Set session variables
    $_SESSION['searched_studyCentre'] = $centreName;
    $_SESSION['searched_year'] = $year;
    $_SESSION['title'] = "Search results for graduates in $centreName, Year: $year";
} else {
    // No form submission: Fetch the initial limited records
  
    $req_results = $grad->findAll_rand(100);
    if (!empty($req_results) && count($req_results) > 0) {
        foreach ($req_results as $result) {
            $records['list'][] = $result;
        }
    }

    // Set a default title or session variables if needed
    $_SESSION['title'] = "Alumni Graduates";
}
$rcnt=0;
// Fetch all years and programs
$years = $grad->findByYear();
$centre = $grad->findByCentre();

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
        include "content/search_centre_details.php";
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
  $(document).ready(function () {
   
   
  });
</script> -->
     <script>
        
        $(document).ready(function() {
             App.init();

            // Pagination setup
            $('#page-selection').bootpag({
                total: <?php echo $pn; ?>,
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
            }).on("page", function(event, num) {
                $('.page').hide(); // Hide all pages
                $('.page' + num).show(); // Show the selected page
            });



                    for (i = 1; i <=<?php echo json_encode($pn); ?>; i++) {
                $(".page" + i).hide();
            }
            var page ="page1";
            $("." + page).show();

            // Search functionality
            $("#search-div").keyup(function() {
                var txt = $("#search-div").val();
                if (txt == "") {
                    $('.page').hide();
                    $(".page1").show(); // Show the first page
                } else {
                    $('.page').hide();
                    $('.page').each(function() {
                        if ($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1) {
                            $(this).show(); // Show matched items
                        }
                    });
                }
            });

          
        });
    </script>
</body>
</html>
