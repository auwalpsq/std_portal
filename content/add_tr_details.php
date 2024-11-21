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
				<li><a href="add_usr">Add Training</a></li>
				<!-- <li class="active">Wizards</li> -->
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
		
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row" style="margin-top:-30px">
                <!-- begin col-12 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-success" >
    <!-- Your content here -->

                        <div class="panel-heading"style="background-color: #008000;"  > 
                            <div class="panel-heading-btn" >
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Add Training</h4>
                        </div>
                        <div class="panel-body">
                            
                            <form id="userForm" class="form-horizontal" method="POST" >
                          

                            
								<div id="wizard">
								
									
									<!-- begin wizard step-1 -->
									<div class="wizard-step-1">
                                         <div class="alert alert-warning fade in m-b-15">
                                                <strong>Warning!</strong>
                                              You are about to add a new Training. Please ensure that all required information is entered correctly before proceeding.
                                                <span class="close" data-dismiss="alert">×</span>
                                               </div>
										<fieldset>
											<legend class="pull-left width-full">Add Training</legend>
                                                
                                              

                                                <div style="margin-top: 30px;" class="form-group">
                                                    
                                        <label class="col-md-3 control-label">Training Name:<span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="text" name="name" class="form-control input-lg" placeholder="Training Name" required />
                                        </div>
                                    </div>

                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Location:</label>
                                        <div class="col-md-6">
                                            <input type="text" name="phone" class="form-control input-lg" placeholder="Location" required />
                                        </div>
                                    </div>
                                          
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Host ID:</label>
                                        <div class="col-md-6">
                                             <div>
                                            <select class="form-control input-lg" name="category"  required>
                                                <option value="" disabled selected>--select--</option>
                                                <option value="adm1">option 1</option>
                                                <option value="adm1">option 2</option>
                                            </select>
                                        </div>
                                       </div>
                                    </div>
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Sponsorship ID:</label>
                                        <div class="col-md-6">
                                             <div>
                                            <select class="form-control input-lg" name="category"  required>
                                                <option value="" disabled selected>--select--</option>
                                                <option value="adm1">option 1</option>
                                                <option value="adm1">option 2</option>
                                            </select>
                                        </div>
                                       </div>
                                    </div>
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Training Type ID:</label>
                                        <div class="col-md-6">
                                             <div>
                                            <select class="form-control input-lg" name="category"  required>
                                                <option value="" disabled selected>--select--</option>
                                                <option value="adm1">option 1</option>
                                                <option value="adm1">option 2</option>
                                            </select>
                                        </div>
                                       </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Start Date:</label>
                                        <div class="col-md-6">
                                            <input type="date" name="phone" class="form-control input-lg" placeholder="Location" required />
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-3 control-label">End Date:</label>
                                        <div class="col-md-6">
                                            <input type="date" name="phone" class="form-control input-lg" placeholder="Location" required />
                                        </div>
                                    </div>

										</fieldset>

                                        <div class="form-group">
                                        <div class="col-md-4 col-md-offset-4">
                                           <input type="submit" value="Add Training" id="save" class="btn-success form-control input-lg"/>

                                           </div>
									</div>
									</div>
								 	<!-- end wizard -->
								 </div>
							</form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                
                <!-- end col-12 -->
            </div>
            <!-- end row -->
	

         <script>
    $(document).ready(function(){
        $("#userForm").on("submit", function(event) { 
            event.preventDefault(); // Prevent the default form submission

            var formData = new FormData(this); // Prepare form data

            $.ajax({
                url: 'ajax/ajax_add_user.php', // Ensure this path is correct
                type: 'POST',
                data: formData,
                contentType: false, // Needed for FormData
                processData: false, // Needed for FormData
                cache: false,
                dataType: 'json', 
                 beforeSend: function() {
                        // Show a loading indicator
                        Swal.fire({
                            title: 'Processing...',
                            text: 'Please wait while we add user.',
                            customClass: "swal-size-sm",
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading()
                            }
                        });
                    },
                success: function(response) { 
                     // Close the loading indicator
                    Swal.close();
        
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successful!',
                            text: response.message,
                            customClass: "swal-size-sm",
                            showConfirmButton: 'OK'
                        }).then(() => {
                            window.location.href = 'add_usr'; 
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
