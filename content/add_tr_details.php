
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
                            
                            <form id="add_training" class="form-horizontal" method="POST" >
                                <input type="hidden" name="type" value="register_training" />
                                <input type="hidden" name="operation" value="cr" />

                            
								<div>
								
									
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
                                            <input type="text" name="training_name" class="form-control input-lg" placeholder="Training Name" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Location:</label>
                                        <div class="col-md-6">
                                            <input type="text" name="training_location" class="form-control input-lg" placeholder="Location" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Slots:</label>
                                        <div class="col-md-6">
                                            <input type="text" name="training_slots" class="form-control input-lg" placeholder="Enter maximum number of beneficiaries" required />
                                        </div>
                                    </div>
                                          
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Host</label>
                                        <div class="col-md-6">
                                             <div>
                                            <select class="form-control input-lg" name="training_host"  required>
                                                <option value="" disabled selected>--select--</option>
                                                <?php
                                                    $tableName = 'traininghost';
                                                    $data = array('id'=>'all', 'limit'=>'');

                                                    $response = $gateway->genericFind($tableName, $data);
                                                    if($response['message'] === 'success'){
                                                        $results = $response['result'];
                                                        foreach($results as $result){
                                                            echo "<option value=\"{$result['cthostid']}\">{$result['vthostname']}</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                       </div>
                                    </div>
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Sponsorship</label>
                                        <div class="col-md-6">
                                             <div>
                                            <select class="form-control input-lg" name="training_sponsor"  required>
                                                <option value="" disabled selected>--select--</option>
                                                <?php
                                                    $tableName = 'sponsorshiptype';
                                                    $data = array('id'=>'all', 'limit'=>'');

                                                    $response = $gateway->genericFind($tableName, $data);
                                                    if($response['message'] === 'success'){
                                                        $results = $response['result'];
                                                        foreach($results as $result){
                                                            echo "<option value=\"{$result['cspshipid']}\">{$result['vspshipname']}</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                       </div>
                                    </div>
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Training Type</label>
                                        <div class="col-md-6">
                                            <select class="form-control input-lg" name="training_type"  required>
                                                <option value="" disabled selected>--select--</option>
                                                <?php
                                                    $tableName = 'trainingtype';
                                                    $data = array('id'=>'all', 'limit'=>'');

                                                    $response = $gateway->genericFind($tableName, $data);
                                                    if($response['message'] === 'success'){
                                                        $results = $response['result'];
                                                        foreach($results as $result){
                                                            echo "<option value=\"{$result['cttypeid']}\">{$result['vttypename']}</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                       </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Start Date:</label>
                                        <div class="col-md-6">
                                            <input type="date" name="start_date" class="form-control input-lg" placeholder="Location" required />
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-3 control-label">End Date:</label>
                                        <div class="col-md-6">
                                            <input type="date" name="end_date" class="form-control input-lg" placeholder="Location" required />
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
                                     </form>
								 </div>
							
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                
                <!-- end col-12 -->
            </div>
            <!-- end row -->
	

<script>
    $(document).ready(function(){
        $("#add_training").on("submit", function(event) { 
            event.preventDefault(); // Prevent the default form submission

            var formData = new FormData(this); // Prepare form data

            $.ajax({
                url: 'ajax/crud.php', // Ensure this path is correct
                type: 'POST',
                data: formData,
                contentType: false, // Needed for FormData
                processData: false, // Needed for FormData
                dataType: 'json', 
                success: function(response) { 
                    if (response.message === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successful!',
                            text: response.result.message,
                            customClass: "swal-size-sm",
                            showConfirmButton: 'OK'
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
            });
        });
    });
</script>