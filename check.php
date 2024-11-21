<?php
session_start();
// if(!isset($_SESSION['ajax'])){
    // unset($_SESSION['email']);
    // unset($_SESSION['pwd']);
    // unset($_SESSION['ticket_id']);
  
// }




// include '../encr_decr.php';

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Alumni Portal | verify Page</title>
	<link rel="icon" type="image/png" href="assets/img/login-bg/nou.png" />
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

<!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">-->
	<link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="assets/css/animate.min.css" rel="stylesheet" />
	<link href="assets/css/style.min.css" rel="stylesheet" />
	<link href="assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


  <link href="assets/plugins/bootstrap-sweetalert/dist/sweetalert.css" rel="stylesheet" />
	<script src="assets/plugins/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
	<!-- ================== END BASE JS ================== -->


</head>

<style>
.news-caption {
    background: linear-gradient(45deg, black, transparent)!important;
    /*background: linear-gradient(58deg, #006400c7, transparent)!important;*/
    max-width: 100%;
}
.bg-grey {
   background: linear-gradient(267deg, darkgreen, #000000db)!important;
    /*background: linear-gradient(58deg, #006400c7, transparent)!important;*/
}
.input-lg {
    height: 46px;
    padding: 10px 16px;
    font-size: 18px!important;
    line-height: 1.3333333;
    border-radius: 6px!important;
    background-color: #ffffffab;
}
.input-lg:focus {
    height: 46px;
    padding: 10px 16px;
    font-size: 18px!important;
    line-height: 1.3333333;
    border-radius: 6px!important;
    background-color: #ffffff;
}
.logins_box{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  /* background-color: lightgrey; */
  color: #000000;

}
.logins_box:focus{
  background-color: white;
  color: #000000;
}
::placeholder {
  color: grey!important;
  opacity: 1
}

.modal-centered{
position: sticky;
}
.modal.left .modal-dialog,
.modal.right .modal-dialog {
position: fixed;
margin: auto;
width: 820px;
height: 100%;
-webkit-transform: translate3d(0%, 0, 0);
		-ms-transform: translate3d(0%, 0, 0);
		 -o-transform: translate3d(0%, 0, 0);
				transform: translate3d(0%, 0, 0);
}

.modal.left .modal-content,
.modal.right .modal-content {
height: 100%;
overflow-y: auto;
}
.modal.left .modal-body,
.modal.right .modal-body {
padding: 15px 15px 80px;
}

/*Left*/
.modal.left.fade .modal-dialog{
left: 0px;
-webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
	 -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
		 -o-transition: opacity 0.3s linear, left 0.3s ease-out;
				transition: opacity 0.3s linear, left 0.3s ease-out;
}

.modal.left.fade.in .modal-dialog{
left: 0;
}

/*Right*/
.modal.right.fade .modal-dialog {
right: -0px;
-webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
	 -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
		 -o-transition: opacity 0.3s linear, right 0.3s ease-out;
				transition: opacity 0.3s linear, right 0.3s ease-out;
}

.modal.right.fade.in .modal-dialog {
right: 0;
}

.swal-size-sm
{
   width: 650px !important;
   font-size: medium;
}

.swal-size-lg
{
   width: 950px !important;
}

.swal-wide{
    width:550px !important;
}
.bg-grey {
   background: linear-gradient(267deg, darkgreen, #000000db)!important;
    /*background: linear-gradient(58deg, #006400c7, transparent)!important;*/
}

#mejs_04978300085092657_html5 {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
}
</style>
<body class="pace-top bg-white">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	<?php
// 	include 'modal/modal_ticket.php';
	 ?>
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login login-with-news-feed" >
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image">
                     <video loop="loop" autoplay="" playsinline="" muted="" id="mejs_04978300085092657_html5" preload="none" src="assets/img/login-bg/NOUN-AT-A-GLANCE-3.mp4">
						<source type="video/mp4" src="assets/img/login-bg/NOUN-AT-A-GLANCE-3.mp4">
					</video>
				
                </div>
                <div class="news-caption">
               
                    <h3 class="caption-title" style="font-size: 36px;"><img src="assets/img/svg/icon_color.svg"  style="height:60px;margin-top:-10px;" alt=""> NOUN Alumni...</h3>
                    <p class ="text-white" style="width:750px; font-size:20px" >
                       <strong> Alumni Information Management system (AIMS)...</strong>
                        
                    </p>
                    
                </div>
            </div>
	
            <!-- end news-feed -->
            <!-- begin right-content -->
    <div class="right-content">
    <!-- begin check-header -->
    <div class="login-header ">


    
        <h3 class="register-header " style="margin-top: -15%">Graduate Verification <br>
          <small class="text-inverse" style="font-size: 15px;">Verify Your Details/Records.</small>
        </h3>
        <div class="icon pull-right" style="margin-top: -15%">
<i class="fa-regular fa-square-check"></i>
      </div>
					
						
                </div>
                <!-- end check-header -->
                <!-- begin check-content -->
                <div class="login-content" >
                 

                        
   <div class="search-d">
  <form id="appfrm" method="post" action="check">
    <label class="form-label" for="matric" style="font-size:16px">Matric Number: <span class="text-danger">*</span></label>
      <div class="form-group" style="margin-top:-5px; display: flex; align-items: center;">
         <input type="text" name="matric" id="matric" class="form-control input-lg text-black" style="font-size:4px;  flex-grow: 1;"  placeholder="Enter your Matric Number"  oninput="this.value = this.value.toUpperCase();" required/>

      <button type="button" name="search" id="search" class="btn btn-success input-lg" style="margin-left: 10px;"> <i class="fa fa-search"></i> Verify </button>
    </div>
  </form>
</div>
                   
                            Do you already have an account? Click <a href="./login">here</a> to login.
                     



                  <form id="frm" method="POST" enctype="multipart/form-data" >
                        <div class="form-group" style="margin-top:-5px">
                            <input type="hidden" name="matricno" id="matricno"/>
                        </div>

                        <label class="form-label" style="font-size:16px">Full Name</label>
                        <div class="form-group" style="margin-top:-5px">
                            <input type="text" name="app_name" id="app_name" class="form-control input-lg text-black" style="font-size:20px;font-weight:bold" placeholder="Full Name" readonly />
                        </div>

                        <label class="form-label"  style="font-size:16px">Programme</label>
                        <div class="form-group" style="margin-top:-5px">
                            <input type="text" name="program" id="program" class="form-control input-lg text-black" style="font-size:20px;font-weight:bold" placeholder="Programme" " readonly />
                        </div>

                        <label class="form-label" for="program" style="font-size:16px">Email:<span class="text-danger">*</span></label>
                        <div class="form-group" style="margin-top:-5px">
                            <input type="text" id="email" name="email" class="form-control input-lg text-black" style="font-size:20px;" placeholder="Current email" />
                        </div>

                          <div class="form-group" style="margin-top:5px">
                            <label class="form-label" for="phone" style="font-size:16px">Phone number:<span class="text-danger">*</span></label>
                            <div class="form-group" style="margin-top:-5px">
                                <input type="tel" id="phoneno" name="phoneno" class="form-control input-lg text-black" style="font-size:20px;" placeholder="Current number" /> 
                            </div>
                        </div>


                        <div id="more">
                            <div class="alert alert-warning fade in text-center" style="font-size:15px;margin-top:20px">
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <p style="text-align: justify;text-justify: inter-word;font-style:italic">
                                    <i>NOTE: <br>You MUST ensure that you're updating the right information to the above-named graduate.</i>
                                </p>
                            </div>

                            
                            
                             <div class="login-buttons">
                            <button  id="update_btns" type="submit" name="update_st" class="btn btn-success btn-block btn-lg" >Submit</button>
                        </div> 
                        </div>
                    </form>


                    <!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Include SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(document).ready(function() {
    App.init();
    $("#update_btns").hide();

    // Search button click event
    $('#search').on('click', function() {
      var matric = $('#matric').val();

      if (matric === '') {
        Swal.fire({
          icon: 'warning',
          title: 'Input Required',
          text: 'Matric number is required',
          customClass: "swal-size-sm",
          confirmButtonText: 'OK'
        });
        return false; // Stop further execution if no input
      }

      $.ajax({
        url: 'ajax/ajax_check_matric.php',
        type: 'POST',
        data: { matric: matric },
        success: function(response) {
          try {
            const result = JSON.parse(response);
            let status = result.status;

            if (status === "failed") {
              Swal.fire({
                icon: 'warning',
                title: 'Failed',
                html: `Matric number '${matric}' not found`,
                customClass: "swal-size-sm",
                confirmButtonText: 'OK'
              });
            } else if (status === "success") {
              $("#matricno").val(result.matric);
              $('#app_name').val(result.name);
              $("#program").val(result.program);
              $("#update_btns").show();  // Show update button on success
            }
          } catch (e) {
            console.error('Error parsing response:', e);
            console.log('Raw response:', response);
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'Invalid response from server. Please try again!',
              customClass: "swal-size-sm",
              confirmButtonText: 'OK'
            });
          }
        },
        error: function(xhr, status, error) {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            customClass: "swal-size-sm",
            text: 'Something went wrong. Please try again!',
            confirmButtonText: 'OK'
          });
          console.log(xhr.responseText);
        }
      });
    });

    // Form submission logic
    $('#frm').on('submit', function(e) {
      e.preventDefault(); // Prevent default form submission

      var formData = new FormData(this);

      $.ajax({
        url: 'ajax/ajax_insert.php', // The server-side PHP file
        type: 'POST',
        data: formData,
        contentType: false, // These two options are necessary for FormData to work
        processData: false,
        beforeSend: function() {
          // Show a loading indicator
          Swal.fire({
            title: 'Processing...',
            text: 'Please wait while we process your request.',
            customClass: "swal-size-sm",
            allowOutsideClick: false,
            didOpen: () => {
              Swal.showLoading();
            }
          });
        },
        success: function(response) {
          Swal.close(); // Close the loading indicator
          try {
            const res = JSON.parse(response);

            if (res.status === 'success') {
              Swal.fire({
                icon: 'success',
                title: 'Successful!',
                html: res.message,
                customClass: "swal-size-sm",
                confirmButtonText: 'OK'
              }).then(() => {
                window.location.href = 'validate'; // Redirect after success
              });
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: res.message,
                customClass: "swal-size-sm",
                confirmButtonText: 'Try Again'
              });
            }
          } catch (e) {
            console.error('Error parsing response:', e);
            console.log('Raw response:', response);
            Swal.fire({
              icon: 'warning',
              title: 'Warning',
              text: 'Email or Phone Number already exist. Please try again!',
              customClass: "swal-size-sm",
              confirmButtonText: 'OK'
              
            });
          }
        },
        error: function(xhr, status, error) {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Something went wrong. Please try again!',
            customClass: "swal-size-sm",
            confirmButtonText: 'OK'
          });
          console.log(xhr.responseText);
        }
      });
    });
  });
</script>



    


    
					   
                        <!-- <div class="register-buttons" style="margin-top:-15px">
                            <button id="btn_signup" class="btn btn-success btn-block btn-lg">Sign Up</button>
                        </div> -->
                       
												<!-- <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                            Note:
                        </div> -->
                      
                        <hr />
						<p class="text-center" style="font-size:12px">
                            &copy; National Open University of Nigeria. All Right Reserved 2022
                        </p>
                    <!-- </form> -->
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        
        <!-- end login -->


	</div>
	<!-- end page container -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<!-- <script src="assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script> -->
	<script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/js/apps.min.js"></script>
  <script src="inc/cdal.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->


</body>
</html>
