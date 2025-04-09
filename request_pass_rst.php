<?php
session_start();
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>ST&D Portal | Password Request</title>
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

 <!-- SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  	<!-- ================== END BASE JS ================== -->

  <link href="assets/plugins/bootstrap-sweetalert/dist/sweetalert.css" rel="stylesheet" />
  <script src="assets/plugins/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
	<!-- ================== BEGIN BASE JS ================== -->


    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
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
<?php
    if(isset($_SESSION['password_reset'])){ ?>
        <script>
            Swal.fire({
                title: '<?php echo $_SESSION['password_reset']['title'];?>',
                html: '<?php echo $_SESSION['password_reset']['message'];?>',
                icon:'<?php echo $_SESSION['password_reset']['icon'];?>',
                confirmButtonText: 'Okay',
                customClass:'swal-size-sm'
            });
        </script>
<?php 
    }
    unset($_SESSION['password_reset']);
?>
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
                    <!--<img src="assets/img/login-bg/bg-8.jpg" data-id="login-cover-image" alt="" />-->
                     <video loop="loop" autoplay="" playsinline="" muted="" id="mejs_04978300085092657_html5" preload="none" src="assets/img/login-bg/NOUN-AT-A-GLANCE-3.mp4">
						<source type="video/mp4" src="assets/img/login-bg/NOUN-AT-A-GLANCE-3.mp4">
					</video>
					<!--<div id ="watermark" class ="bg-grey"><img class="watermark" src ="img/noubg.png" style="width:60%;height:100vh"> </div>-->
                </div>
                <div class="news-caption">                    
                   <h3 class="caption-title" style="font-size: 36px;"><i class="fa fa-check-square-o"></i> NOUN-Staff Training Portal...</h3>
                    <p class ="text-white" style="width:750px; font-size:20px" >
                       <strong>Staff Training and Development (ST&D)...</strong>
                        
                    </p>
                    
                </div>
            </div>
	
            <!-- end news-feed -->
            <!-- begin right-content -->
    <div class="right-content">
    <!-- begin login-header -->
    <div class="login-header ">
        <div class="brand text-inverse">
            <span class="" >Password Reset Request</span>
            <small class="text-inverse">Request password reset with valid email or id</small>
        </div>
        <div class="icon">
                <i class="fa fa-sign-in"></i>
        </div>
    </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content" >
                    <form method="POST" id="frm" action="ajax/process_pass_rst.php" enctype="multipart/form-data" >
                        <div class="form-group m-b-15">
                            <input type="text" name="id" id="id" class="form-control input-lg text-inverse" placeholder="Enter email or id" required />
                        </div>
                        <!-- <div class="form-group m-b-15">
                            <input type="password" name="password" id="t_pwd" class="form-control input-lg text-inverse" placeholder="Password" required />
                            <i class="fa fa-eye pull-right" id="togglePassword" style="margin-right:15px;margin-top:-30px; cursor: pointer;" onclick="myFunction()"></i>
                        </div>
                        <div class="checkbox m-b-30 ">
                            <label class="text-inverse">
                                <input type="checkbox"/> Remember Me
                            </label>
                        </div> -->
                        <div class="login-buttons">
                            <button  class="btn btn-success btn-block btn-lg" type="submit" id="bsumit">Submit Request</button>
                        </div> 
                        <!-- <div class="m-t-20 m-b-20 p-b-10 text-inverse">
                            <p>Don't have an account yet? Click <a href="register" class="text-success">register</a> to verify and create an account.</p>
                        </div> -->
                          <!-- <div class="m-t-20 m-b-20 p-b-10 login-buttons">
                              <a class="btn btn-success btn-block btn-lg" href="validate2" ></i>Validate e-token</a>
                                      </div> -->
                       
                        
                         <div class="">
							<a class="btn btn-primary btn-block btn-lg m-t-20" id="pwd_btn" href="login">Go to login</a>
                        </div>
                       
                        <hr />
                    
                        <div class="text-center">
                            <img src="assets/img/login-bg/nou_logo.png" width="70%"  style="height:60px;margin-top:-10px;vertical-align: bottom" alt="">
                        </div>
                        <br><br>
                        <p class="text-center" style="font-size:12px">
                            &copy; 2024 NOUN Software Development Unit. <small> All Rights Reserved</small>
                        </p>
                  </form> 
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->


	</div>
	<!-- end page container -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<!-- <script src="assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script> -->
	<script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
    <!-- SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  	<!-- ================== END BASE JS ================== -->

  <link href="assets/plugins/bootstrap-sweetalert/dist/sweetalert.css" rel="stylesheet" />
  <script src="assets/plugins/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
	<!-- ================== BEGIN BASE JS ================== -->


    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/js/apps.min.js"></script>
  <!-- <script src="inc/cdal.js"></script> -->
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
        });

	    </script>
    </body>
</html>