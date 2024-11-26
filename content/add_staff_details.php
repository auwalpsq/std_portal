
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
				<li><a href="add_staff">Add Staff</a></li>
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
                            <h4 class="panel-title">Add Staff</h4>
                        </div>
                        <div class="panel-body">
                   <form id="new_staff"  class="form-horizontal" method="POST" >  
                        <input type="hidden" name="type" value="staff" />
                        <input type="hidden" name="operation" value="cr" />   
						<div id="wizard">
				
									<!-- begin wizard step-2 -->
									<div class="wizard-step-2">
                                         <div class="alert alert-warning fade in m-b-15">
                                                <strong>Warning!</strong>
                                               Ensure you are adding the right Staff.
                                                <span class="close" data-dismiss="alert">×</span>
                                               </div>
										<fieldset>
                                            <legend class="pull-left width-full">Add Staff</legend>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">First Name</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="first_name" class="form-control input-lg" placeholder="enter first name" required />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Surname</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="surname" class="form-control input-lg" placeholder="enter surname" required />
                                                </div>
                                            </div>  

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Other Names</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="other_names" class="form-control input-lg" placeholder="enter other names"/>
                                                </div>
                                            </div>  
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Department</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="department" class="form-control input-lg" placeholder="enter department"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Date of Birth</label>
                                                <div class="col-md-6">
                                                    <input type="date" name="date_of_birth" class="form-control input-lg" placeholder="date of birth"/>
                                                </div>
                                            </div>
										</fieldset>
                          <div class="form-group">
                              <div class="col-md-4 col-md-offset-4">
                                  <input type="submit" value="Add Staff" id="save" class="btn-success form-control input-lg"/>
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
    $("#new_staff").on("submit", function(event) { 
        event.preventDefault(); // Prevent the default form submission

        var formData = new FormData(this); // Prepare form data

        $.ajax({
            url: 'ajax/crud.php', // Ensure this path is correct
            type: 'POST',
            data: formData,
            contentType: false, // Needed for FormData
            processData: false, // Needed for FormData
            cache: false,
            dataType: 'json', 
               
            success: function(response) { 
                  
    
                if (response.message === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Successful!',
                        text: response.result.message,
                        customClass: "swal-size-sm",
                        showConfirmButton: 'OK'
                    }).then(() => {
                        window.location.href = 'add_staff'; 
                    });
                } else if(response.message === 'failed'){
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: response.result.message,
                        customClass: "swal-size-sm",
                        confirmButtonText: 'OK'
                    });
                }
            },
            // error: function(jqXHR, textStatus, errorThrown) {
            //     console.error('AJAX Error:', textStatus, errorThrown); // Debugging
            //     console.log('Response Text:', jqXHR.responseText); // Debugging
            //     Swal.fire({
            //         icon: 'error',
            //         title: 'AJAX Error!',
            //         text: 'An error occurred while processing your request.',
            //         customClass: "swal-size-sm",
            //         confirmButtonText: 'OK'
            //     });
            // }
        });
        });
    });
</script>

