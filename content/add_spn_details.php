
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
				<li><a href="add_ben">Add Sponsorship</a></li>
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
                            <!-- <div class="panel-heading-btn" >
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div> -->
                            <h4 class="panel-title">Add Sponsorship</h4>
                        </div>
        <div class="panel-body">
                   <form id="form_sponsorship"  class="form-horizontal" method="POST" >     
						<input type="hidden" name="type" value="sponsorship" />
                        <input type="hidden" name="operation" value="cr">
                        <div>
									<!-- begin wizard step-2 -->
									<div class="">
                                         <div class="alert alert-warning fade in m-b-15">
                                                <strong>Warning!</strong>
                                               Ensure you are adding the right Sponsorship.
                                                <span class="close" data-dismiss="alert">×</span>
                                               </div>
										<fieldset>
                                            <legend class="pull-left width-full">Add Sponsorship</legend>

                                          
                                                        
                                                <div style="margin-top: 30px;" class="form-group">
                                                <label class="col-md-3 control-label">Sponsor Name</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="sponsor_name" class="form-control input-lg" placeholder="enter Sponsor" required />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Email:</label>
                                                <div class="col-md-6">
                                                    <input type="email" name="sponsor_email" class="form-control input-lg" placeholder="name@example.com" required />
                                                </div>
                                            </div>  

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Phone:</label>
                                                <div class="col-md-6">
                                                    <input type="tel" name="sponsor_phone" class="form-control input-lg" placeholder="+2348012345678" required />
                                                </div>
                                            </div>  
                                          
										</fieldset>
                          <div class="form-group">
                              <div class="col-md-4 col-md-offset-4">
                                  <input type="submit" value="Add Sponsorship" id="save" class="btn-success form-control input-lg"/>
                              </div>
                            </div>
                                        
									</div>
									<!-- end wizard step-2 -->
							</div>
									<!-- end wizard step-4 -->
                                    </form>
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
    $("#form_sponsorship").on("submit", function(event) { 
        event.preventDefault(); // Prevent the default form submission

        let formData = new FormData(this);

        $.ajax({
            url: 'ajax/crud.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response){
                if(response.message == 'success'){
                    Swal.fire({
                        icon: 'success',
                        
                    });
                }
            }
        });
        
    });
});
</script>

