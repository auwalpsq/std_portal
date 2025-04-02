<?php
  session_start();  

// Turn on error reporting
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);       

set_error_handler(function($error, $message, $file, $line) {
    $logMessage = "[" . date("Y-m-d H:i:s") . "] error: [$error] - $message in $file on line $line";
    error_log($logMessage . PHP_EOL . PHP_EOL, 3, "error_log.txt"); 
});


require_once 'config/MyConnection.php';

$tableName = "trainingregister";
$data = array('id'=>'all', 'limit'=>'');
$trainings = $gateway->genericFind($tableName, $data);

if(!isset($_SESSION['username']) || empty($_SESSION['username']) || !isset($_SESSION['password']) || empty($_SESSION['password'])){
  $_SESSION['login_error'] = 'Please login first';
  header('Location: login');
  exit();
}
?>
<!DOCTYPE html>

<html lang="en">
<!--<![endif]-->
<?php
 //include_once 'config/ConfigureEmail.php';
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
        include "content/study_leave_details.php";
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

      $.ajax({
        url: 'ajax/email_notification.php',
        type: 'POST',
        dataType: 'json',
        success: function(response){
          if(response.count > 0){
            //alert(response.emails);
            Swal.fire({
              title: 'Email Notification',
              html: "There are " + response.count + " staff, whose study leave will elapse in 3 months.<br>" + response.emails + "Do you want to send email notification?",
              icon: 'info',
              showCancelButton: true,
              confirmButtonColor: '#008000',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, send it!',
              cancelButtonText: 'Cancel',
              customClass: "swal-size-sm",
              position: 'top'
            }).then((result) => {
              if(result.isConfirmed) {
                $.ajax({
                    url: 'ajax/send_email_notification.php',
                    type: 'POST',
                    data: {emails: response.emails},
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Sending Email...',
                            text: 'Please wait...',
                            allowOutsideClick: false,
                            customClass: 'swal-size-sm',
                            didOpen: () => {
                                Swal.showLoading()
                            }
                        });
                    },
                    success: function(response){
                        Swal.close();
                        alert(response);
                    }
                });
              }
            });
          }
        }
      });

      $('#data-table').on('click', '.btn-edit-leave', function () {
        let id = $(this).data('id');
        let type = 'study_leave';
        let operation = 'find';
        $.post('ajax/crud.php', {id: id, type: type, operation: operation}, function(response){
            //alert(response);
            let data = JSON.parse(response);
            //alert(data['result'][0]['email'])
            if(data['message'] == 'success'){
                $('#form_study_leave')[0].reset();
                $('#type').val('study_leave');
                $('#operation').val('u');
                $('#leave_id').val(data['leave_id']);
                $('#personnel_id').val(data['personnel_id']);
                $('#full_name').val(data['first_name'] +' '+ data['surname'] +' '+ data['other_names']);
                $('#email').val(data['email']);
                $('#directorate').val(data['directorate']);
                $('#unit').val(data['unit']);
                $('#institution').val(data['institution']);
                $('#programme').val(data['programme']);
                $('#discipline').val(data['discipline']);
                $('#sponsor').val(data['sponsor']);
                $('#start_date').val(data['start_date']);
                $('#end_date').val(data['end_date']);
                $('#remark').val(data['remark']);
                $('#status').val(data['status']);
                $('#email').prop('disabled', true);
                $('#search_staff').prop('disabled', true);
                $('#modal-leave-title').text('Edit Leave');
                $('#modal-form-st-leave').modal('show');
            }
        });
    }); 

    // Attach click event to dynamically added delete buttons
    $('#data-table').on('click', '.btn-delete-leave', function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#008000',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            customClass: "swal-size-sm"
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $(this).data('id');
                let type = 'study_leave';
                let operation = 'de';
                $.ajax({
                    url: 'ajax/crud.php',
                    type: 'POST',
                    data: {id: id, type: type, operation: operation},
                    success: function(response){
                        let data = JSON.parse(response);
                        if(data['message'] == 'success'){
                            Swal.fire({
                                icon: 'success',
                                title: data['message'],
                                text: data['result']['message'],
                                customClass: "swal-size-sm",
                                confirmButtonText: 'OK'
                            });
                            location.reload();
                        }
                    }
                });
            }
        });
        
    });
    $('#form_study_leave').on('submit', function(event){
        event.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            url: 'ajax/crud.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                //alert(response);
                let data = JSON.parse(response);
                if(data.message == 'success'){
                    Swal.fire({
                        icon:'success',
                        title: data.message,
                        text: data.result.message,
                        customClass: "swal-size-sm",
                        confirmButtonText: 'OK'
                    });
                    location.reload();
                }else if(data.message == 'failed'){
                    Swal.fire({
                        icon: 'error',
                        title: data.message,
                        text: data.result.message,
                        customClass: "swal-size-sm",
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });
    $('#new_study_leave').on('click', function(){
        $('#form_study_leave')[0].reset();
        $('#personnel_id').prop('disabled', false);
        $('#search_staff').prop('disabled', false);
        $('#type').val('study_leave');
        $('#operation').val('cr');
        $('#myModalLongTitle').text('New Study Leave');
        $('#modal-form-st-leave').modal('show');
    });
    $('#search_staff').on('click', function(){
        let id = $('#personnel_id').val();
        if(id.length > 0){
            let type = 'personnel';
            let operation = 'find';
            $.post('ajax/crud.php', {personnel_id: id, type: type, operation: operation}, function(response){
                let data = JSON.parse(response);
                if(data['message'] == 'success'){
                    $('#id').val(data['result']['personnel_id']);
                    $('#full_name').val(data['result']['first_name'] + " " + data['result']['surname'] + " " + data['result']['other_names']);
                    $('#directorate').val(data['result']['directorate']);
                    $('#unit').val(data['result']['unit']);
                }else{
                    alert('Staff not found');
                }
            });
        }else{
            alert('Please enter a staff ID or Email');
        }
    });
  }); 
</script>
</body>
</html>
