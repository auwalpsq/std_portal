		<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLongTitle">Edit Beneficiary</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add_beneficiary" class="form-horizontal" method="POST" >
                                <input type="hidden" name="type" value="register_beneficiary" />
                                <input type="hidden" name="operation" value="cr" />

                            
								<div>
								
									
									<!-- begin wizard step-1 -->
									<div class="wizard-step-1">
                                         <div class="alert alert-warning fade in m-b-15">
                                                <strong>Warning!</strong>
                                              You are about to edit a Beneficiary. Please ensure that all required information is entered correctly before proceeding.
                                                <span class="close" data-dismiss="alert">×</span>
                                               </div>
										<fieldset>
											
                                                
                                              

                                                <div style="margin-top: 30px;" class="form-group">
                                                    
                                        <label class="col-md-3 control-label">Beneficiary Name:<span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <input type="text" name="beneficiary_name" class="form-control input-lg" placeholder="Beneficiary Name" required />
                                        </div>
                                    </div>

                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Location:</label>
                                        <div class="col-md-8">
                                            <input type="text" name="beneficiary_location" class="form-control input-lg" placeholder="Location" required />
                                        </div>
                                    </div>
                                          
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Host</label>
                                        <div class="col-md-8">
                                             <div>
                                            <select class="form-control input-lg" name="beneficiary_host"  required>
                                                <option value="" disabled selected>--select--</option>
                                                <?php
                                                    $tableName = 'beneficiary';
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
                                        <div class="col-md-8">
                                             <div>
                                            <select class="form-control input-lg" name="beneficiary_sponsor"  required>
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
                                        <label class="col-md-3 control-label">Beneficiary Type</label>
                                        <div class="col-md-8">
                                            <select class="form-control input-lg" name="beneficiary_type"  required>
                                                <option value="" disabled selected>--select--</option>
                                                <?php
                                                    $tableName = 'beneficiarytype';
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
                                        <div class="col-md-8">
                                            <input type="date" name="start_date" class="form-control input-lg" placeholder="Location" required />
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-3 control-label">End Date:</label>
                                        <div class="col-md-8">
                                            <input type="date" name="end_date" class="form-control input-lg" placeholder="Location" required />
                                        </div>
                                    </div>

										</fieldset>

                                       
									</div>
								 	<!-- end wizard -->
                                     </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Save changes</button>
            </div>
        </div>
    </div>
</div>

        <!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">Beneficiary</a></li>
				<li><a href="javascript:;">Beneficiary List</a></li>
			
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">put name of training here <small>header small text goes here...</small></h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-10 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse" >
                        <div class="panel-heading" style="background-color: #008000;">
                            <!-- <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div> -->
                            <h4 class="panel-title">Beneficiary List</h4>
                        </div>
                        
                        <!-- <div class="alert alert-info fade in">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Select adds item selection capabilities to a DataTable. Items can be rows, columns or cells, which can be selected independently, or together. Item selection can be particularly useful in interactive tables where users can perform some action on the table, such as editing rows or marking items to perform an action on.
                        </div> -->
                        
                        
                        <div class="panel-body">
                            <table id="data-table" class="table table-striped table-bordered" width="100%">
                                 <div class=" pull-right" style="margin-bottom: 10px;"> <a href="add_ben" class="btn btn-success btn-sm "><i class="fa fa-plus m-r-5"></i>Create New Beneficiary</a></div>

                           
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Beneficiary Name</th>
                                        <th>Host</th>
                                        <th>Location</th>
                                       
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $tableName = 'beneficiary';
                                        $data = array('id'=>'all', 'limit'=>'');

                                        $beneficiaries = $gateway->genericFind($tableName, $data);
                                        foreach($beneficiaries['result'] as $beneficiary){
                                           ?>
                                            <tr>
                                                 <td><?php echo $beneficiary['vfileno'];?></td>
                                                <td style="font-size:14px">
                                                     <div class = "view_result">
                                                    <a><?php echo $beneficiary['ctcode'];?></a>
                                                <div class ="pull-bottom">
                                                    <!-- <button type="button" class = "viewresult btn btn-success btn-xs" data-toggle="modal" data-target="#myModal" >Edit</button> -->

                                                    <button  class = "viewresult btn btn-danger delete-btn btn-xs"  >Delete</button>

                                                    
                                                </div>
                                                </div>
                                                </td>
                                               
                                                <td><?php echo $beneficiary['icadre'];?></td>
                                                <td><?php echo $beneficiary['ftevaluation'];?></td>
                                               
                                               
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-10 -->
            </div>
            <!-- end row -->
		</div>
		<!-- end #content -->


        <script>
  $(document).ready(function () {

      
    $('#data-table').on('click', '.edit-btn', function () {
       
        $('#myModal').modal('show');
    }); 

    // Attach click event to dynamically added delete buttons
    $('#data-table').on('click', '.delete-btn', function () {
        // Remove the row containing the clicked button
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
               $(this).closest('tr').remove();

               
            }
        });
        
    });
});
</script>