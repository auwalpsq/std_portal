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