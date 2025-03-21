<?php
session_start();  

$ddate = date('Y-m-d');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once 'config/MyConnection.php';

$table_leave_status_total = 'vw_leave_total_status';
$data_leave_status_total = array('id' => 'all', 'limit' => '');
$leave_status_total = $gateway->genericFind($table_leave_status_total, $data_leave_status_total);
$table_name = 'vw_study_leave_count';
$data = array('id'=>'all', 'limit'=>'');
$study_leave_count = $gateway->genericFind($table_name, $data);

$table_name_leave = 'staff_on_leave';
$leave_data = array('id'=>'all', 'limit'=>'');
$study_row_count = $gateway->rowCount($table_name_leave, $leave_data);

$table_leave_prog_status = 'vw_leave_prog_status';
$data_leave_prog_status = array('id'=>'all', 'limit'=>'');
$result_leave_prog_status = $gateway->genericFind($table_leave_prog_status, $data_leave_prog_status);

$table_leave_completed = 'staff_on_leave';
$leave_data_completed = array('id'=>'Completed', 'limit'=>'', 'field_name'=>'status');
$study_row_count_completed = $gateway->rowCount($table_leave_completed, $leave_data_completed);

$leave_percent_completed = ($study_row_count_completed['result'] / $study_row_count['result']) * 100;

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
<?php
    if(isset($_SESSION['password_change_success'])){ ?>
        <script>
            Swal.fire({
                title: 'Success!',
                text: '<?php echo $_SESSION['password_change_success'];?>',
                icon: 'success',
                confirmButtonText: 'OK',
                customClass: 'swal-size-sm'
            });
        </script>
    <?php
    unset($_SESSION['password_change_success']);
    }
?>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <!-- end #page-loader -->

    <div id="page-container" class="fade page-with-sidebar page-header-fixed">
        <?php
        include "inc/mega_menu.php";
        include "inc/a_sidebar.php";
        include "content/dash_details.php";
        // include "inc/footer.php";
        include_once 'template/baselevel_js.html';
         ?>
    </div>
</body>
<script>
  const ctx = document.getElementById('myChart');
  new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo "'$array_leave_status_total[onGoing]'" ?>,
                <?php echo "'$array_leave_status_total[completed]'" ?>,
                <?php echo "'$array_leave_status_total[elapsed]'" ?>,
                <?php echo "'$array_leave_status_total[staffIsDeceased]'" ?>
            ],
      datasets: [{
        label: 'number of staff(s)',
        data: [ <?php echo $array_leave_status_total['onGoingTotal'] ?>,
                <?php echo $array_leave_status_total['completedTotal'] ?>,
                <?php echo $array_leave_status_total['elapsedTotal'] ?>,
                <?php echo $array_leave_status_total['staffIsDeceasedTotal'] ?>
              ],
        backgroundColor: ['skyblue', 'lightgreen', 'red', 'black'],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
    }
  });
</script>
<script>
		$(document).ready(function() {
			App.init();
      DashboardV2.init()
      //ChartJs.init();
      //TableManageTableSelect.init();
		});
	</script>

</html>
