<?php
session_start();

// Generate CSRF token if not already set
// if (empty($_SESSION['csrf_token'])) {
//     $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
// }

// use alumni\TableGateways\AlumniGraduateGateway;

// require_once 'TableGateways/AlumniGraduateGateway.php';
// include_once 'config/DBConnection.php'; 

// $database = new DBConnection();      
// $dbConnection = $database->dbConnect();
// $personnel = new AlumniGraduateGateway($dbConnection);
// $state = $personnel->findByState();  
// $local = $personnel->findByLocal(); 
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Alumni Portal | Registration Page</title>
	<link rel="icon" type="image/png" href="assets/img/login-bg/nou.png" />
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- CSS Includes -->
	<link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="assets/css/animate.min.css" rel="stylesheet" />
	<link href="assets/css/style.min.css" rel="stylesheet" />
	<link href="assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="assets/css/theme/default.css" rel="stylesheet" id="theme" />

	<!-- jQuery (Only one version) -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<!-- SweetAlert2 -->
	<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!-- jQuery UI -->
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.min.css">

	<!-- Other CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

	<!-- Custom Styles -->
	<style>
	.news-caption {
		background: linear-gradient(45deg, black, transparent)!important;
		max-width: 100%;
	}
	.bg-grey {
	   background: linear-gradient(267deg, darkgreen, #000000db)!important;
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
	.swal-size-sm {
	   width: 650px !important;
       font-size: medium;
	}
	.swal-size-lg {
	   width: 950px !important;
	}
	.swal-wide{
		width:550px !important;
	}
	.bg-grey {
	   background: linear-gradient(267deg, darkgreen, #000000db)!important;
	}
	#mejs_04978300085092657_html5 {
	  position: fixed;
	  right: 0;
	  bottom: 0;
	  min-width: 100%;
	  min-height: 100%;
	}



     .result-price {
            font-size: 15px;
            margin-top: -30px;
            margin-bottom: 15px;
        }
        .image img {
            width: 180px; /* Adjust the width as needed */
            height: 200px;
            border: 1px solid #ddd;
            padding: 5px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 50px;
            
        }
      
        .image strong {
            display: block;
            margin-top: 5px;
        }

        
input[type="file"] {
    display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    /* display: inline-block; */
    padding: 6px 12px;
    cursor: pointer;
}

     
	</style>
</head>

<body class="pace-top bg-white">
	<!-- Page Loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>

	<!-- Page Container -->
	<div id="page-container" class="fade">
	    <!-- Login Section -->
        <div class="login login-with-news-feed">
            <!-- News Feed -->
            <div class="news-feed">
                <div class="news-image">
                    <video loop autoplay playsinline muted id="mejs_04978300085092657_html5" preload="none" src="assets/img/login-bg/NOUN-AT-A-GLANCE-3.mp4">
						<source type="video/mp4" src="assets/img/login-bg/NOUN-AT-A-GLANCE-3.mp4">
					</video>
                </div>
                <div class="news-caption">
                    <h3 class="caption-title" style="font-size: 36px;"><i class="fa fa-check-square-o"></i> NOUN Alumni...</h3>
                    <p class="text-white" style="width:750px; font-size:20px">
                       <strong>Alumni Information Management system (AIMS)..</strong>
                    </p>
                </div>
            </div>
            <!-- End News Feed -->

            <!-- Right Content -->
            <div class="right-content">
                <!-- Login Header -->
                <div class="login-header ">
                    <h2 class="register-header" style="margin-top: -15%">Profile Update  <br>
                      <small style="font-size: 15px; margin-top:-5px !important" >Update Your Profile and create Password.</small>
                    </h2>
                    
                </div>
                <!-- End Login Header -->

                <!-- Login Content -->
                <div class="login-content">
                   
                    <form id="studentUpdateForm" method="POST" enctype="multipart/form-data">


                            <div class=" result-price pull-right form-group">
                                <!-- Display student image -->
                                <div class=" text-center">
                                    <div class="image">
                                    
                                    <a href="javascript:;">
                                        <img id="userImage" name ="userImage" src="assets/img/user.png" alt="Default Image"> <!-- Default image displayed -->
                                    </a>
                                   <div> 
                                       <label for="file-upload" class="custom-file-upload" style="width:55%; border-radius:2em; margin-top:5px">
                                    <i class="fa fa-upload"></i> Choose Passport
                                </label>
                                <!-- File input for choosing image -->
                                <input type="file" name="image" id="file-upload" accept="image/*" required>
                                   </div>
                                </div>
                            </div>
                              
                            


                        <!-- Hidden Fields -->
                        <!-- <div class="form-group" style="margin-top:-5px"> -->
                            <input type="hidden" name="matricno" id="matricno" class="form-control input-lg text-black" style="font-size:24px;font-weight:bold;width: 200px;" value="<?php echo htmlspecialchars($_SESSION['id']); ?>" />
                            
                            <!-- <input type="hidden" name="csrf_token" value=" <?php //echo htmlspecialchars($_SESSION['csrf_token']); ?>"> -->
                       

                        <!-- Date of Birth and Gender -->
                        <div class="form-group" >
                           <label class="form-label" for="dob" style="font-size:16px">Date of Birth<span class="text-danger">*</span></label>
                            <div class="input-group">
                                 
                                <input type="date" name="dob" id="dob" class="form-control input-lg text-black" required />
                                <label class="input-group-addon" style="font-size:16px"><b>Gender:</b></label>
                                <select name="gender" class="form-control input-lg text-black" style="font-size:16px;font-weight:bold" required>
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>
                        </div>

                        <!-- State of Origin -->
                        <label class="form-label" for="states" style="font-size:16px">State of Origin:<span class="text-danger">*</span></label>
                        <div class="form-group" style="margin-top:-5px">
                             <select name="states" id="states" class="form-control input-lg text-black" style="font-size:20px;font-weight:bold" required>
                                    <option value="" disabled selected>State of Origin</option>
                                    <?php
                                        foreach ($state as $value) {
                                            $id = htmlspecialchars($value['cstateid']);
                                            $name = htmlspecialchars($value['vstatename']);
                                            echo "<option value=\"{$id}\">{$name}</option>";
                                        }
                                    ?>
                                </select>
                        </div>

                        <!-- Local Government -->
                        <div class="form-group" style="margin-top:5px">
                            <label class="form-label" for="local" style="font-size:16px">Local Government:<span class="text-danger">*</span></label>
                            <div class="form-group" style="margin-top:-5px">
                                <select name="local" id="local" class="form-control input-lg text-black" style="font-size:20px;font-weight:bold" required>
                                    <option value="" disabled selected>Local Government</option>
                                  
                                </select>
                            </div>
                        </div> 

                        <!-- Password -->
                        <label class="control-label text-black" for="t_pswd" style="font-size:16px">Password: <span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input type="password" id="t_pswd" name="password" class="form-control input-lg text-black" placeholder="Password" style="font-size:20px;font-weight:bold" required />
                                <i class="fa fa-eye pull-right" id="togglePassword" style="margin-right:15px;margin-top:-30px; cursor: pointer;" onclick="togglePasswordVisibility('t_pswd', 'togglePassword')"></i>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <label class="control-label text-black" for="t_cpswd" style="font-size:16px">Confirm Password: <span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input type="password" id="t_cpswd" name="t_cpassword" class="form-control input-lg text-black" placeholder="Confirm Password" style="font-size:20px;font-weight:bold" required />
                                <i class="fa fa-eye pull-right" id="ctogglePassword" style="margin-right:15px;margin-top:-30px; cursor: pointer;" onclick="togglePasswordVisibility('t_cpswd', 'ctogglePassword')"></i>
                            </div>
                        </div>

                        <!-- Confirmation Checkbox -->
                        <div id="more">
                            <div class="checkbox m-b-30">
                                <input id="agree" type="checkbox" data-theme="default" onclick="toggleSubmitButton()" />
                                <span class="text-black m-l-5" style="font-size: 14px; font-style:bold">I read and agreed with the <a href="data_pol" target="_blank" id="pol"> NOUN Data Policy</a></span> 
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="register-buttons" style="margin-top:-15px">
                            <button id="update_btns" type="submit" name="update_student" style="display: none;" class="btn btn-success btn-block btn-lg">Update Records</button>
                        </div>

                        <!-- Login Redirect -->
                        <!-- <div class="m-t-20 m-b-40 p-b-40 text-inverse" style="margin-top:-15px">
                            Do you already have an account? Click <a href="./login">here</a> to login.
                        </div> -->

                    </form>

                    <hr />
                    <p class="text-center" style="font-size:12px">
                        &copy; National Open University of Nigeria. All Right Reserved 2022
                    </p>
                </div>
                <!-- End Login Content -->
            </div>
            <!-- End Right Content -->
        </div>
        <!-- End Login Section -->
	</div>
    </div>
	<!-- End Page Container -->

	<!-- Base JS -->
	<script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/jquery-cookie/jquery.cookie.js"></script>

	<!-- Page Level JS -->
	<script src="assets/js/apps.min.js"></script>
	<script src="inc/cdal.js"></script>

	<!-- Custom JavaScript -->
	<script>
        // Initialize the app (if necessary)
		$(document).ready(function() {
			App.init();			
		});

        // Function to toggle password visibility
        function togglePasswordVisibility(inputId, toggleIconId) {
            var x = document.getElementById(inputId);        
            var icon = $("#" + toggleIconId);
            if (x.type === "password") {
                x.type = "text";
                icon.removeClass("fa-eye");
                icon.addClass("fa-eye-slash");
            } else {
                x.type = "password";
                icon.removeClass("fa-eye-slash");
                icon.addClass("fa-eye");
            }
        }

        // Function to toggle the submit button based on the checkbox state
        function toggleSubmitButton() {
            var checkbox = document.getElementById("agree");
            var submitButton = document.getElementById("update_btns");

            // Toggle the submit button based on the checkbox state
            if (checkbox.checked) {
                submitButton.style.display = "inline-block"; // Show the button
            } else {
                submitButton.style.display = "none"; // Hide the button
            }
        }

        // Prevent pasting in certain fields
        window.onload = () => {
            const myInput = document.getElementById('matricno');
            myInput.onpaste = e => e.preventDefault();
            const myPwd = document.getElementById('t_cpswd');
            myPwd.onpaste = e => e.preventDefault();
        }

        // AJAX Form Submission
        $(document).ready(function() {
            $('#studentUpdateForm').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission
                
                // Retrieve the CSRF token from the hidden input
                // const csrfToken = $('input[name="csrf_token"]').val();
                // if (!csrfToken) {
                //     Swal.fire({
                //         icon: 'error',
                //         title: 'Security Error!',
                //         text: 'CSRF token missing.',
                //         customClass: "swal-size-sm",
                //         confirmButtonText: 'OK'
                //     });
                //     return;
                // }
               

                // Prepare form data
                var formData = new FormData(this);
                 

                // Client-side image size validation
                var fileInput = document.getElementById('file-upload');
                var file = fileInput.files[0];
                if (file && file.size > 2 * 1024 * 1024) { // 2MB
                    Swal.fire({
                        icon: 'error',
                        title: 'File Too Large',
                        text: 'Please upload an image smaller than 2MB.',
                        customClass: "swal-size-sm",
                        confirmButtonText: 'OK'
                    });
                    return; 
                }
               



                 // Password integrity check and confirmation validation
                var password = $('#t_pswd').val();
                var confirmPassword = $('#t_cpswd').val();

                // Regex pattern for password validation
                const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;

                // Check for password integrity
                if (!passwordPattern.test(password)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid Password',
                        text: 'Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character.',
                        customClass: "swal-size-sm",
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                // Password confirmation validation
                if (password !== confirmPassword) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Password Mismatch',
                        text: 'Passwords do not match. Please re-enter.',
                        customClass: "swal-size-sm",
                        confirmButtonText: 'OK'
                    });
                    return;
                }
                


                // Make AJAX call
                $.ajax({
                    url: 'ajax/ajax_register.php', // Your PHP script path
                    type: 'POST',
                    data: formData,
                    contentType: false, // Needed for FormData
                    processData: false, // Needed for FormData
                    cache: false,
                    dataType: 'json', // Expect JSON response from server
                    beforeSend: function() {
                        // Show a loading indicator
                        Swal.fire({
                            title: 'Updating...',
                            text: 'Please wait while we update your record.',
                            customClass: "swal-size-sm",
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading()
                            }
                        });
                    },
                    success: function(response) {
                       
                        Swal.close(); // Close the loading indicator

                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Successful!',
                                text: response.message,
                                customClass: "swal-size-sm",
                                timer: 3000,
                                showConfirmButton: false
                            }).then(() => {
                                window.location.href = 'form'; 
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: response.message,
                                customClass: "swal-size-sm",
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    
                });
            });

            $("#states").on("change", function(){
                let id = $(this).val();
                $.post("ajax/ajax_select_lga", {id:id}, function(response){
                    const lgas = JSON.parse(response);
                    $("#local").empty(); // Clear the previous options
                    for(let i = 0; i < lgas.length; i++){
                        
                        $("#local").append(`<option value="${lgas[i].local_id}">${lgas[i].local_name}</option>`);
                    }
                });
             });
        });


        document.getElementById('file-upload').addEventListener('change', function(event) {
        const file = event.target.files[0]; // Get the selected file
            // file.display
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                // Update the image source with the selected image
                document.getElementById('userImage').src = e.target.result;
            };

            // Read the file as a data URL (used for images)
            reader.readAsDataURL(file);
        } else {
            // If no file is selected, fall back to the default image
            document.getElementById('userImage').src = 'assets/img/user.png';
        }
    });
    </script>

</body>
</html>
