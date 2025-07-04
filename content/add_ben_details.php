
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
				<li><a href="add_ben">Add Beneficiary</a></li>
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
                                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
                            </div>
                            <h4 class="panel-title">Add Beneficiary</h4>
                        </div>
                        <div class="panel-body">
                   <form id="new_beneficiary"  class="form-horizontal" method="POST" >
                        <input type="hidden" name="type" value="beneficiary" />
                        <input type="hidden" name="operation" value="cr" />
						<div>
				
									<!-- begin wizard step-2 -->
									<div class="wizard-step-2">
                                         <div class="alert alert-warning fade in m-b-15">
                                                <strong>Warning!</strong>
                                               Ensure you are adding the right Beneficiary.
                                                <span class="close" data-dismiss="alert">×</span>
                                               </div>
										<fieldset>
                                            <legend class="pull-left width-full">Add Beneficiary</legend>
                                                        
                                            <div style="margin-top: 30px;" class="form-group">
                                               <div class="form-group">
                                                     <label class="col-md-3 control-label">Staff ID:</label>
                                                    <div class="col-md-8">
                                                    <div class="form-inline">
                                                    <input type="text" id="staff_id" style="width:54%" name="staff_id" class=" form-control input-lg" placeholder="staff id" required />
                                                   <button type="button" id="search_staff" class="btn-success form-control input-lg"><i class="fa fa-search"></i> Search Staff</button>

                                                     </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Staff information:</label>
                                                      <div class="col-md-6">
                                                        <div class="form-inline">
                                                        <input type="text" id="full_name" style="width:40%;font-size:small !important;font-weight:bold;" name="full_name" class="form-control input-lg" placeholder="fullname" required disabled />
                                                         <input type="text" id="department" name="department" style="width:40%;font-size:small !important;font-weight:bold;" class="form-control input-lg" placeholder="department" required disabled/>
                                                      <input type="text" id="date_of_birth" style="width:18%;font-size:small !important;font-weight:bold;" name="date_of_birth" class="form-control input-lg" placeholder="dob" disabled />

                                                        </div>
                                                      </div>
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin-top:-10px" >
                                                <label class="col-md-3 control-label">Training:</label>
                                                <div class="col-md-6">
                                                    <select class="form-control input-lg" name="training">
                                                        <option value="" required disabled selected>--Select</option>
                                                        <?php
                                                            $tableName = 'trainingregister';
                                                            $data = array('id'=>'all', 'limit'=>'');

                                                            $trainings = $gateway->genericFind($tableName, $data);
                                                            foreach($trainings['result'] as $training){
                                                                echo "<option value=\"{$training['ctcode']}\">{$training['vtname']}</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Cadre:</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="cadre" class="form-control input-lg" placeholder="enter cadre" required />
                                                </div>
                                            </div>  

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Evaluation:</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="evaluation" class="form-control input-lg" placeholder="enter evaluation" required />
                                                </div>
                                            </div>  
                                          
										</fieldset>
                          <div class="form-group">
                              <div class="col-md-4 col-md-offset-4">
                                  <input type="submit" value="Add Beneficiary" id="save" class="btn-success form-control input-lg"/>
                              </div>
                            </div>
                                        
									</div>
									<!-- end wizard step-2 -->
							</div>
                            </form>
									<!-- end wizard step-4 -->
								</div>
							
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
        $("#new_beneficiary").on("submit", function(event) { 
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
                            $('#new_beneficiary')[0].reset();
                            //window.location.href = 'add_usr'; 
                        });
                    } else{
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
        $('#search_staff').on('click', function(){
            let staff_id = $('#staff_id').val();
            if(staff_id.length > 0){
                let type = 'staff';
                let operation = 'find';
                $.ajax({
                    url: 'ajax/crud.php',
                    type: 'POST',
                    data: {staff_id: staff_id, type: type, operation: operation},

                    success: function(response){
                      
                        let data = JSON.parse(response);
                        if(data['message'] == 'success'){
                            let fullName = data[0]['first_name'] + " " + data[0]['surname'] + " " + data[0]['other_names']
                            $('#full_name').val(fullName);
                            $('#department').val(data[0]['department']);
                            $('#date_of_birth').val(data[0]['dob']);
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: data['message'],
                                text: data['result']['message'],
                                customClass: "swal-size-sm",
                                confirmButtonText: 'OK'
                            });
                        }
                    }
                });
            }else{
                Swal.fire({
                    icon: 'warning',
                    title: 'warning',
                    text: 'Staff ID cannot be empty',
                    customClass: "swal-size-sm",
                    confirmButtonText: 'OK'
                });
            }
        });
    });
</script>

