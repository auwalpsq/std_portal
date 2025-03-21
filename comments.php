<?php
// if(!isset($_SESSION['ajax'])){
    // unset($_SESSION['email']);
    // unset($_SESSION['usrid']);
    // unset($_SESSION['pwd']);
    // unset($_SESSION['ticket_id']);
    // unset($_SESSION['vtype']);
    // unset($_SESSION['refid']);
// }
// $config = "inc/pdo_class.php";
// // include '../encr_decr.php';
// require_once($config);


     // Form submission logic
    //  $('#frm').on('submit', function(e) {
    //     e.preventDefault(); // Prevent default form submission

    //     var formData = new FormData(this);
    //     $.ajax({
    //             url: ajax/validate.php,
    //             type: 'POST',
    //             data: formData,
    //             contentType: false, // Necessary for FormData
    //             processData: false, // Necessary for FormData
    //             // beforeSend: function() {
    //             //     Swal.showLoading(); // Show loading indicator before request
    //             // },
    //             success: function(response) {
    //                 Swal.close(); // Close the loading indicator
    //                 try {
    //                     const res = JSON.parse(response);

    //                     if (res.status === 'success') {
    //                         // Redirect based on the email type
    //                         var redirectUrl = isNounEmail ? 'dash' : 'form';
    //                         window.location.href = redirectUrl;

    //                     } else if (res.status === 'warning'){
    //                         WarningModal(res.message);

    //                     }else if (res.status === 'invalid'){
    //                         InvalidModal(res.message);

    //                     }else{
    //                         ErrorModal(res.message);
    //                     }
    //                 } catch (e) {
    //                     console.error('Error parsing response:', e);
    //                     console.log('Raw response:', response);
    //                     showErrorModal('Email or Phone Number already exists. Please try again!');
    //                 }
    //             },
    //             error: function(xhr, status, error) {
    //                 console.error('AJAX Error:', status, error);
    //                 showErrorModal('An error occurred. Please try again.');
    //             }
    //         });
    //     //var username = $("#username").val().toLowerCase();
    //     //var isNounEmail = username.indexOf("@noun.edu.ng") >= 0;

    //     // Determine the correct URL based on email type, boolean variable that checks if the email entered by the user ends with @noun.edu.ng

    //     //var ajaxUrl = isNounEmail ? 'ajax/ajax_usr_login.php' : 'ajax/ajax_alum_login.php';

    //     // Common AJAX request function

    //     // Common function to display  modal
    //     function ErrorModal(message) {
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Oops...',
    //             html: message,
    //             customClass: "swal-size-sm",
    //             confirmButtonText: 'Try Again'
    //         });
    //     }
    //     function WarningModal(message) {
    //         Swal.fire({
    //             icon: 'warning',
    //             title: 'Oops...',
    //             html: message,
    //             customClass: "swal-size-sm",
    //             confirmButtonText: 'Try Again'
    //         });
    //     }
    //     function InvalidModal(message) {
    //         Swal.fire({
    //             icon: 'success',
    //             title: 'Change Password!',
    //             html: message,
    //             customClass: 'swal-size-sm',
    //             showCancelButton: true,
    //             confirmButtonText: 'OK',
    //             allowOutsideClick: false,
    //             allowEscapeKey: false
    //         }).then((result) => {
    //         // Only redirect if "OK" button was clicked
    //             if (result.isConfirmed) {
    //                 window.location.href = 'chng_default_pass';
    //             }                    
    //         });
    //     }
    // });

    // $(document).ready(function(){
        // 		function alignModal(){
        // 				var modalDialog = $(this).find(".modal-dialog");
        
        // 				// Applying the top margin on modal dialog to align it vertically center
        // 				modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
        // 		}
        // 		// Align modal when it is displayed
        // 		$(".modal").on("shown.bs.modal", alignModal);
        
        // 		// Align modal when user resize the window
        // 		$(window).on("resize", function(){
        // 				$(".modal:visible").each(alignModal);
        // 		});
        // });

        // $("#bsumit").click(function(){
        //     var username = $('#username').val();
        //     var password = $('#t_pwd').val();

        //     if (username === '' || password === '') {
        //       Swal.fire({
        //         icon: 'warning',
        //         title: 'Input Required',
        //         text: 'User name and password required',
        //         customClass: "swal-size-sm",
        //         confirmButtonText: 'OK'
        //       });
        //       return false; // 
        //   }
        // })

        
    // function myFunction() {
    //     var x = document.getElementById("t_pwd");
    //     //   var r=document.getElementById("");
    //     if (x.type === "password") {
    //         x.type = "text";
    //         $("#togglePassword").removeClass("fa fa-eye pull-right");
    //         $("#togglePassword").addClass("fa fa-eye-slash pull-right");
            
    //     } else {
    //         x.type = "password";
    //         //this.classList.toggle('fa fa-eye');
    //         $("#togglePassword").removeClass("fa fa-eye-slash pull-right");
    //         $("#togglePassword").addClass("fa fa-eye pull-right");
            
    //     }
    // }

    
    //  // Form submission logic
    //  $('#frm').on('submit', function(e) {
    //     e.preventDefault(); // Prevent default form submission

    //     var formData = new FormData(this);
    //     var username = $("#username").val().toLowerCase();
    //     var isNounEmail = username.indexOf("@noun.edu.ng") >= 0;

    //   // Determine the correct URL based on email type, boolean variable that checks if the email entered by the user ends with @noun.edu.ng

    //     var ajaxUrl = isNounEmail ? 'ajax/ajax_usr_login.php' : 'ajax/ajax_alum_login.php';

    //     // Common AJAX request function
    //     function sendAjaxRequest(url, formData) {
    //         $.ajax({
    //             url: url,
    //             type: 'POST',
    //             data: formData,
    //             contentType: false, // Necessary for FormData
    //             processData: false, // Necessary for FormData
    //             // beforeSend: function() {
    //             //     Swal.showLoading(); // Show loading indicator before request
    //             // },
    //             success: function(response) {
    //                 Swal.close(); // Close the loading indicator
    //                 try {
    //                     const res = JSON.parse(response);

    //                     if (res.status === 'success') {
    //                         // Redirect based on the email type
    //                         var redirectUrl = isNounEmail ? 'dash' : 'form';
    //                         window.location.href = redirectUrl;

    //                     } else if (res.status === 'warning'){
    //                         WarningModal(res.message);

    //                     }else if (res.status === 'invalid'){
    //                         InvalidModal(res.message);

    //                     }else{
    //                         ErrorModal(res.message);
    //                     }
    //                 } catch (e) {
    //                     console.error('Error parsing response:', e);
    //                     console.log('Raw response:', response);
    //                     showErrorModal('Email or Phone Number already exists. Please try again!');
    //                 }
    //             },
    //             error: function(xhr, status, error) {
    //                 console.error('AJAX Error:', status, error);
    //                 showErrorModal('An error occurred. Please try again.');
    //             }
    //         });
    //     }

    //     // Common function to display  modal
    // //     function ErrorModal(message) {
    // //         Swal.fire({
    // //             icon: 'error',
    // //             title: 'Oops...',
    // //             html: message,
    // //             customClass: "swal-size-sm",
    // //             confirmButtonText: 'Try Again'
    // //         });
    // //     }
    // //     function WarningModal(message) {
    // //         Swal.fire({
    // //             icon: 'warning',
    // //             title: 'Oops...',
    // //             html: message,
    // //             customClass: "swal-size-sm",
    // //             confirmButtonText: 'Try Again'
    // //         });
    // //     }
    // //     function InvalidModal(message) {
    // //         Swal.fire({
    // //             icon: 'success',
    // //             title: 'Change Password!',
    // //             html: message,
    // //             customClass: 'swal-size-sm',
    // //             showCancelButton: true,
    // //             confirmButtonText: 'OK',
    // //             allowOutsideClick: false,
    // //             allowEscapeKey: false
    // //         }).then((result) => {
    // //         // Only redirect if "OK" button was clicked
    // //             if (result.isConfirmed) {
    // //                 window.location.href = 'chng_default_pass';
    // //             }                    
    // //         });
    // //     }
    // //     // Trigger the AJAX request
    // //     sendAjaxRequest(ajaxUrl, formData);
    // // });
    // <!-- <div class="panel-heading-btn" >
    //                             <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
    //                             <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
    //                             <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
    //                             <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
    //                         </div> -->

    //     // Confirm before deletion
    //     Swal.fire({
    //         title: 'Are you sure?',
    //         text: "This action cannot be undone.",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#008000',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes, delete it!',
    //         cancelButtonText: 'Cancel',
    //         customClass: "swal-size-sm"
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             // Proceed with AJAX if confirmed
    //             var formData = new FormData(this); // Prepare form data

    //             $.ajax({
    //                 url: 'ajax/ajax_delete_user.php', // Ensure this path is correct
    //                 type: 'POST',
    //                 data: formData,
    //                 contentType: false, // Needed for FormData
    //                 processData: false, // Needed for FormData
    //                 cache: false,
    //                 dataType: 'json', // Expect JSON response from server
    //                 success: function(response) {
    //                     if (response.status === 'success') {
    //                         Swal.fire({
    //                             icon: 'success',
    //                             title: 'Successful!',
    //                             text: response.message,
    //                             customClass: "swal-size-sm",
    //                             confirmButtonColor: '#008000',
    //                             showConfirmButton: 'OK'
    //                         }).then(() => {
    //                             window.location.href = 'add_tr_type'; 
    //                         });
    //                     } else if (response.status === 'invalid') {
    //                         Swal.fire({
    //                             icon: 'warning',
    //                             title: 'Invalid!',
    //                             text: response.message,
    //                             customClass: "swal-size-sm",
    //                              confirmButtonColor: '#008000',
    //                             confirmButtonText: 'OK'
    //                         });
    //                     } else {
    //                         Swal.fire({
    //                             icon: 'error',
    //                             title: 'Error!',
    //                             text: response.message,
    //                             customClass: "swal-size-sm",
    //                              confirmButtonColor: '#008000',
    //                             confirmButtonText: 'OK'
    //                         });
    //                     }
    //                 },
    //                 // Uncomment this block for debugging
    //                 // error: function(jqXHR, textStatus, errorThrown) {
    //                 //     console.error('AJAX Error:', textStatus, errorThrown);
    //                 //     console.log('Response Text:', jqXHR.responseText);
    //                 //     Swal.fire({
    //                 //         icon: 'error',
    //                 //         title: 'AJAX Error!',
    //                 //         text: 'An error occurred while processing your request.',
    //                 //         customClass: "swal-size-sm",
    //                 //         confirmButtonText: 'OK'
    //                 //     });
    //                 // }
    //             });
    //         }
    //     });
?>
    <!-- <div class="form-group div-academic" style="display: none;">
                                        <label class="col-md-3 control-label">Faculty</label>
                                        <div class="col-md-6">
                                            <select id="faculty" name="faculty" class="form-control">
                                                <option value="">--Select Faculty--</option>
                                                <?php
                                                    if($result_faculty['message'] === 'success'){
                                                        foreach($result_faculty['result'] as $faculty){?>
                                                            <option value="<?php echo $faculty['faculty_id'] ?>"><?php echo $faculty['name'] ?></option>
                                                <?php   }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group div-academic" style="display: none;">
                                        <label class="col-md-3 control-label">Department</label>
                                        <div class="col-md-6">
                                            <select id="department" name="department" class="form-control">
                                                <option value="">--Select Department--</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group div-nonacademic" style="display: none;">
                                        <label class="col-md-3 control-label">Directorate</label>
                                        <div class="col-md-6">
                                            <select id="directorate" name="directorate" class="form-control">
                                                <option value="">--Select Directorate--</option>
                                                <?php
                                                    if($result_directorate['message'] === 'success'){
                                                        foreach($result_directorate['result'] as $directorate){?>
                                                            <option value="<?php echo $directorate['directorate_id'] ?>"><?php echo $directorate['name'] ?></option>
                                                <?php   }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group div-nonacademic" style="display: none;">
                                        <label class="col-md-3 control-label">Unit</label>
                                        <div class="col-md-6">
                                            <select class="form-control" id="unit" name="unit">
                                                <option value="">--Select Unit--</option>
                                            </select>
                                        </div>
                                    </div> -->