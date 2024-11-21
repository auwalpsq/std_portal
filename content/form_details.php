<style>

.swal-size-sm {
	   width: 650px !important;
       font-size: medium;
	}

</style>

<!-- begin #content -->
    <div id="content" class="content" style="margin-top:30px;">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="student_info">Home</a></li>
				<li><a href="javascript:;">Survey Form</a></li>
				<!-- <li class="active">Wizards</li> -->
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
		
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
                <!-- begin col-12 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-success" style="margin-top:10px;">
    <!-- Your content here -->

                        <div class="panel-heading"style="background-color: #008000;"> 
                            <div class="panel-heading-btn" >
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Additional information</h4>
                        </div>
                        <div class="panel-body">
                            <form id="appForm"  method="POST" name="form-wizard">

                            <input type="hidden" name="matric" value="<?php echo $matric ?>" />
                          

                            
								<div id="wizard">
								
									
									<!-- begin wizard step-2 -->
									<div class="wizard-step-2">
                                         <div class="alert alert-warning fade in m-b-15">
                                                <strong>Warning!</strong>
                                               Ensure all required fields are completed, and provide honest feedback. Once finished, proceed to the "Submit" section at the to submit your responses.
                                                <span class="close" data-dismiss="alert">×</span>
                                               </div>
										<fieldset>
											<legend class="pull-left width-full">Additional Information</legend>
                                            
                                            <!-- begin row -->
                                            <div class="row">
                                                <!-- begin col-4 -->
                                                <!-- <div class="col-md-4">
													<label>Age range</label> <br>
                                                    <div class="form-group">
                                                        <select class="form-control"name="age_range" id="age_range" data-parsley-group="wizard-step-2" required >
                                                            <option value="" disabled selected>--select--</option>
                                                            <option value="below24">Below 24 years</option>
                                                            <option value="25-34years">25-34 years</option>
                                                            <option value="35-44years">35-44 years</option>
                                                            <option value="45yearsabove">45 years and above</option>
                                                        </select>
                                                    </div>
                                              </div> -->
                                                <!-- end col-4 -->
                                                
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
													<label>Nationality</label> <br>
                                                    <div class="form-group">
                                                        <select class="form-control  input-lg" name="nationality" id="nationality" data-parsley-group="wizard-step-2" required>
                                                           <option value=""selected disabled>--select--</option>
                                                            <option value="NG">Nigerian</option>
                                                            <option value="NN"> Non Nigerian</option>
                                                         </select>
                                                    </div>
                                              </div>
                                                <!-- end col-4 -->
                                                  <!-- begin col-4 -->
                                                <div class="col-md-4 " >
													<label>State of residence</label> <br>
                                                    <div class="form-group">
                                                        <select class="form-control  input-lg" name="state_of_residence" id="state_of_residence" data-parsley-group="wizard-step-2" required>
                                                            <option value="" disabled selected>--select--</option>
                                                            <?php
                                                                $states = $grad->findByState();

                                                                foreach($states as $state){
                                                                    $state_id = $state['cstateid'];
                                                                    $state_name = $state['vstatename'];
                                                                    echo "<option value=\"$state_id\">$state_name</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                              </div>
                                                 <!-- end col-4 -->
                                                  
                                                <!-- begin col-4 -->
                                                <div class="col-md-4" id="physical_challenge">
													<label>Are you physically challenged?</label> <br>
                                                    <div class="form-group input-lg">
                                                    <div class="physical_challenge_option" >
                                                    Yes <input class="physical_challenge" type="radio" id="physical_challenge_yes" name="physical_challenge" value="1" required>
                                                  &nbsp;   No <input class="physical_challenge" type="radio" checked id="physical_challenge_no" name="physical_challenge" value="0">
                                                </div>
                                               </div>
                                              </div>
                                                <!-- end col-4 -->
                                            </div>
                                             <!-- end row -->

                                           
                                            
                                              <!-- begin row -->
                                            <div class="row">
                                                
                                              
                                                <!-- begin col-4 -->
                                                <div class="col-md-4" id="options" style="display: none">
													<label>If yes. Tick as applicable</label> <br>
                                                    <div class="form-group  input-lg">
                                                    <div>
                                                    &nbsp;  None <input checked class="option" type="radio" id="none" name="challenge" value="none"/>      
                                                 &nbsp;   Deaf <input class="option" type="radio" id="deaf" name="challenge" value="deaf"/>
                                                  &nbsp;   Dump <input class="option" type="radio" id="dump" name="challenge" value="dump"/>
                                                 &nbsp;    Blind <input class="option" type="radio" id="blind" name="challenge" value="blind"/>
                                                 &nbsp;    Others <input class="option" type="radio" id="others" name="challenge" value="others"/>
                                                </div>
                                               </div>
                                              </div>
                                                <!-- end col-4 -->
                                                  <!-- begin col-4 -->
                                                <div class="col-md-4" id="specify"  style="display: none">
                                                    <div class="form-group  ">
                                                        <label>If other, Specify</label>
                                                        <div class="controls ">
                                                            <input type="text"  class="form-control input-lg" name="other_challenge" id="other_challenge"  data-parsley-group="wizard-step-2" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col-4 -->

                                                 <!-- begin col-4 -->
                                                        <div class="col-md-4">
                                                            <label>Are you currently running a postgraduate programme?</label> <br>
                                                            <div class="form-group  input-lg">
                                                               <div class="postgraduate_div">
                                                                    Yes <input class="postgraduate_radio " type="radio" id="postgraduate_yes" name="postgraduate" value="yes"/>
                                                                  &nbsp;  No <input class="postgraduate_radio" type="radio" checked id="postgraduate_no" name="postgraduate" value="no"/>
                                                                </div>
                                                             </div>
                                                        </div>
                                                        <!-- end col-4 -->
                                            </div>
                                            <!-- end row -->
                                             
                                             <!-- begin row -->
                                              <div class="row">
                                                   
                                                          <!-- begin col-4 -->
                                                            <div class="col-md-4 postgraduate_div_data"  id="postgraduate_details1" style="display: none">
                                                                <div class="form-group">
                                                                    <label>Programme Name</label>
                                                                     <div class="controls">
                                                                        <input type="text" name="program" placeholder="Programme"  data-parsley-group="wizard-step-2" class="form-control input-lg postgraduate_data" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end col-4 -->
                                                          <!-- begin col-4 -->
                                                            <div class="col-md-4 postgraduate_div_data"  id="postgraduate_details2" style="display: none">
                                                                <div class="form-group" >
                                                                    <label>Institution</label>
                                                                     <div class="controls">
                                                                        <input type="text" name="school" placeholder="Name of Institution"  data-parsley-group="wizard-step-2" class="form-control input-lg postgraduate_data" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end col-4 -->

                                                            <!-- begin col-4 -->
                                                        <div class="col-md-4" id="employer_div_id" class="employer_div_class" >
                                                            <label for="status">Employed?</label> <br>
                                                            <div class="form-group  input-lg">
                                                               <div class="employment_status">
                                                                    Yes <input class="employment_status_option  " type="radio" id="yes" name="employment_status" value="1"/>
                                                                    &nbsp; No <input class="employment_status_option" type="radio" checked id="no" name="employment_status" value="0"/>
                                                                </div>
                                                             </div>
                                                        </div>
                                                        <!-- end col-4 -->
                                             </div>
                                                 <!-- end row -->
                                                  
                                              <!-- begin row -->
                                              <div class="row">

                                                          <!-- begin col-4 -->
                                                            <div class="col-md-4 employer_details_class" id="employer_details1" style="display: none">
                                                                <div class="form-group" id="postgraduate_details">
                                                                    <label>Organization Name</label>
                                                                     <div class="controls">
                                                                       <input type="text" name="organization_name" placeholder=" Name of Organization" class="form-control input-lg employment_data_fields" data-parsley-group="wizard-step-2"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end col-4 -->
                                                          <!-- begin col-4 -->
                                                            <div class="col-md-4 employer_details_class" id="employer_details2" style="display: none">
                                                                <div class="form-group" id="postgraduate_details">
                                                                    <label>Phone Number</label>
                                                                     <div class="controls">
                                                                        <input type="tel" name="organization_phone" placeholder="123-456-7890" class="form-control employment_data_fields input-lg" data-parsley-type="number" data-parsley-group="wizard-step-2" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end col-4 -->
                                            
                                                            <!-- begin col-4 -->
                                                            <div class="col-md-4 employer_details_class" id="employer_details3" style="display: none">
                                                                <div class="form-group">
                                                                    <label>Physical Address</label>
                                                                    <div class="controls">
                                                                        <input type="text" name="organization_address" placeholder="Organization's address" class="form-control  input-lg employment_data_fields" data-parsley-group="wizard-step-2" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end col-4 -->
                                                            <!-- begin col-4 -->
                                                            <div class="col-md-4 employer_details_class" id="employer_details4" style="display: none">
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <div class="controls">
                                                                        <input type="email" name="organization_email" placeholder="someone@example.com" class="form-control input-lg employment_data_fields" data-parsley-group="wizard-step-2"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end col-4 -->

                                                             <!-- begin col-4 -->
                                                        <div class="col-md-4">
                                                            <label>How do tou prefer to receive information from NOUN?</label> <br>
                                                            <div class="form-group input-lg">
                                                               <div class="recieve_info">
                                                                    Email  <input class="channel_option" type="radio" checked id="channel_email" name="channel" value="email"/>
                                                                    &nbsp; SMS <input class="channel_option" type="radio" id="channel_sms" name="channel" value="sms"/>
                                                                    &nbsp; Telephone <input class="channel_option" type="radio" id="channel_tel" name="channel" value="telephone"/>
                                                                    &nbsp; Others  <input class="channel_option" type="radio" id="channel_others" name="channel" value="others"/>
                                                                </div>
                                                             </div>
                                                        </div>
                                                        <!-- end col-4 -->
                                                         <!-- begin col-4 -->
                                                            <div class="col-md-4">
                                                                <div class="form-group " id="div_others" style="display:none">
                                                                    <label for="channel_info_others">If other, specify</label>
                                                                     <div class="controls">
                                                                       <input type="text" placeholder="Specify" class="form-control input-lg specify1" id="channel_info_others" name="channel_info_others" data-parsley-group="wizard-step-2"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end col-4 -->
                                               
                                            </div>
                                            <!-- end row -->
										</fieldset>
                                        <div>
                                            <input type="submit" value="Submit" id="save" class="btn-success input-lg form-control"/>
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
            $(".employment_status_option").on("click", function(){
                var value = jQuery.trim($(this).val());
                
                if(value === "0"){
                    $(".employer_details_class").css("display", "none");
                    $(".employment_data_fields").val([]).prop("required", false);
                }else if(value === "1"){
                    $(".employer_details_class").css("display", "block");
                    $(".employment_data_fields").prop("required", true);
                }
            });
            $(".physical_challenge").on("click", function(){
                var value = $(this).val();

                if(value === "1"){
                    $("#options").css("display", "block")
                }else if(value === "0"){
                    $("#options").css("display", "none");
                    $(".option").val([]);
                }
                $("#none").prop("checked", true);
                $("#specify").css("display", "none");
                $("#other_challenge").val('');
                $("#other_challenge").prop("required", false);
            });
            $(".option").on("click", function(){
                var value = $(this).val();

                if(value === "others"){
                    $("#specify").css("display", "block");
                    $("#other_challenge").prop("required", true);
                }else{
                    $("#specify").css("display", "none");
                    $('#other_challenge').val('');
                    $("#other_challenge").prop("required", false);
                }
                $("#others").val("others");
            });
            $(".postgraduate_radio").on("click", function(){
                var value = $(this).val();
                if(value === "yes"){
                    $(".postgraduate_div_data").css("display", "block");
                    $(".postgraduate_data").prop("required", true);
                } else if(value === "no"){
                    $(".postgraduate_div_data").css("display", "none");
                    $('.postgraduate_data').val('').prop("required", false);
                }
            });
            $(".channel_option").on("click", function(){
                var value = $(this).val();
                if(value === "others"){
                    $("#div_others").css("display", "block");
                    $("#channel_info_others").prop("required", true);
                } else{
                    $("#div_others").css("display", "none");
                    $('#channel_info_others').val('').prop("required", false);
                }
                $("#channel_others").val("others");
            });
            $("#other_challenge").on("focusout", function(){
                var value = jQuery.trim($(this).val());
                if(value.length > 0){
                    $("#others").val(value);
                }
            });
            $("#channel_info_others").on("focusout", function(){
                var value = jQuery.trim($(this).val());
                if(value.length > 0){
                    $("#channel_others").val(value);
                }
            });

            $("#appForm").on("submit", function(event) { 
                // Prevent the default form submission behavior
                event.preventDefault();
                
                // Serialize form data into an array of objects
                var formData = $(this).serializeArray();
                const formDataObj = {};

                // Convert serialized array into a key-value object
                formData.forEach(item => {
                    formDataObj[item.name] = item.value;
                });

                // Make an AJAX POST request with the serialized data
                $.post("ajax/ajax_update_grad", { json_obj: JSON.stringify(formDataObj) }, function(response) {
                    const resp = JSON.parse(response);

                    // Handle success response
                    if (resp.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successful!',
                            text: resp.message,
                            customClass: "swal-size-sm",
                            // timer: 3000,
                             confirmButtonColor: '#008000',
                            showConfirmButton: 'OK'
                        }).then(() => {
                            window.location.href = 'student_info'; 
                        });
                    }
                    // Handle warning response
                    else if (resp.status === 'warning') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Warning!',
                            text: resp.message,
                            customClass: "swal-size-sm",
                             confirmButtonColor: '#008000',
                            confirmButtonText: 'OK'

                        });
                    }
                });
            });

        });
    </script>