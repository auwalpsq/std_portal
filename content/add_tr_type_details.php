
  <style>

.swal-size-sm {
	   width: 650px !important;
       font-size: medium;
	}

</style>
  <!-- begin #content -->
    <div id="content" class="content" style="margin-top:5px;">




			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="dash">Home</a></li>
				<li><a href="add_ben">Add Training Type</a></li>
				<!-- <li class="active">Wizards</li> -->
			</ol>
		
			
			<!-- begin row -->
			<div class="row">
                <!-- begin col-12 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-success" >
    <!-- Your content here -->

                        <div class="panel-heading" style="background-color: #008000;"> 
                            <div class="panel-heading-btn" >
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Add Training Type</h4>
                        </div>
                        <div class="panel-body">
                   <form id="appForm"  class="form-horizontal" method="POST" >     
								      <div id="wizard">
				
									<!-- begin wizard step-2 -->
									<div class="wizard-step-2">
                                         <div class="alert alert-warning fade in m-b-15">
                                                <strong>Warning!</strong>
                                               Ensure you are adding the right Training Type.
                                                <span class="close" data-dismiss="alert">×</span>
                                               </div>
										<fieldset>
                                            <legend class="pull-left width-full">Add Training Type</legend>

                                          
                                                        
                                                <div style="margin-top: 30px;" class="form-group">
                                                <label class="col-md-3 control-label">Name:</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="email" class="form-control input-lg" placeholder="enter Training type" required />
                                                </div>
                                            </div>

                                           
										</fieldset>
                          <div class="form-group">
                              <div class="col-md-4 col-md-offset-4">
                                  <input type="submit" value="Add Training Type" id="save" class="btn-success form-control input-lg"/>
                              </div>
                            </div>
                                        
									</div>
									<!-- end wizard step-2 -->
							</div>
									<!-- end wizard step-4 -->
								</div>
							</form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>
		<!-- end #content -->

       <script>
$(document).ready(function(){
    $("#appForm").on("submit", function(event) { 
        event.preventDefault(); // Prevent the default form submission

        // Confirm before deletion
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#008000',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            customClass: "swal-size-sm"
        }).then((result) => {
            if (result.isConfirmed) {
                // Proceed with AJAX if confirmed
                var formData = new FormData(this); // Prepare form data

                $.ajax({
                    url: 'ajax/ajax_delete_user.php', // Ensure this path is correct
                    type: 'POST',
                    data: formData,
                    contentType: false, // Needed for FormData
                    processData: false, // Needed for FormData
                    cache: false,
                    dataType: 'json', // Expect JSON response from server
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Successful!',
                                text: response.message,
                                customClass: "swal-size-sm",
                                confirmButtonColor: '#008000',
                                showConfirmButton: 'OK'
                            }).then(() => {
                                window.location.href = 'add_tr_type'; 
                            });
                        } else if (response.status === 'invalid') {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Invalid!',
                                text: response.message,
                                customClass: "swal-size-sm",
                                 confirmButtonColor: '#008000',
                                confirmButtonText: 'OK'
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: response.message,
                                customClass: "swal-size-sm",
                                 confirmButtonColor: '#008000',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    // Uncomment this block for debugging
                    // error: function(jqXHR, textStatus, errorThrown) {
                    //     console.error('AJAX Error:', textStatus, errorThrown);
                    //     console.log('Response Text:', jqXHR.responseText);
                    //     Swal.fire({
                    //         icon: 'error',
                    //         title: 'AJAX Error!',
                    //         text: 'An error occurred while processing your request.',
                    //         customClass: "swal-size-sm",
                    //         confirmButtonText: 'OK'
                    //     });
                    // }
                });
            }
        });
    });
});
</script>

