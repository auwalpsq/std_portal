<style>
.swal-size-sm {
	   width: 650px !important;
       font-size: medium;
}
.modal.right .modal-dialog {
    position: fixed;
    margin: auto;
    width: 30%; /* Adjust width as needed */
    height: 100%;
    right: 0;
    top: 0;
    transform: translateX(0);
}

.modal.right .modal-content {
    height: 100%;
    overflow-y: auto;
}

.modal.right .modal-body {
    padding: 20px;
}

</style>

<div class="modal fade right" id="new_beneficiary_modal" tabindex="-1" role="dialog" aria-labelledby="myModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLongTitle"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="new_beneficiary" class="form-horizontal" method="POST" >
                        <input type="hidden" name="type" value="beneficiary" />
                        <input type="hidden" name="operation" value="cr" />
                        <input type="hidden" name="training_id" value="<?php echo $_POST['id']  ?>">
                        <input type="hidden" name="id" id="id">
						<div>
                            		<!-- begin wizard step-2 -->
									<div class="wizard-step-2">
                                         <div class="alert alert-warning fade in m-b-15">
                                                <strong>Warning!</strong>
                                               Ensure you are adding the right Beneficiary.
                                                <span class="close" data-dismiss="alert">×</span>
                                               </div>
										<fieldset>
                                            <legend class="pull-left width-full">New Beneficiary</legend>
                                                        
                                            <div style="margin-top: 30px;" class="form-group">
                                               <div class="row">
                                                    <div class="col-md-10 p-r-0">
                                                        <input type="text" id="personnel_id" name="personnel_id" class="form-control input-lg" placeholder="enter staff id or email" required />
                                                    </div>
                                                    <div class="col-md-2 p-l-0">
                                                        <button type="button" id="search_beneficiary" class="btn-success form-control input-lg"><i class="fa fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12 p-l-0">
                                                    <input type="text" id="full_name" name="full_name" class="form-control input-lg" placeholder="fullname" required disabled />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12 p-l-0">
                                                    <input type="text" id="date_of_birth" name="date_of_birth" class="form-control input-lg" placeholder="dob" disabled required/>
                                                </div>
                                            </div>  
                                          
										</fieldset>
                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <input type="submit" value="Add Beneficiary" id="save" class="btn-success form-control input-lg"/>
                              </div>
                            </div>
                                        
									</div>
									<!-- end wizard step-2 -->
							</div>
                            </form>
            </div>
            
        </div>
    </div>
</div>
<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">Beneficiary</a></li>
				<li><a href="javascript:;">Beneficiary List</a></li>
			
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"><?php echo $training_name ?></h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-10 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse" >
                        <div class="panel-heading" style="background-color: #008000;">
                            <h4 class="panel-title">Beneficiary List</h4>
                        </div>
                        
                        <div class="panel-body">
                        <div class="row m-b-10" >
                            <button id="add_beneficiary" class="pull-right btn btn-success"><i class="fa fa-plus m-r-5"></i>New Beneficiary</button>
                        </div>
                        <div class = "responsive">
                            <table id="data-table" class="table table-striped table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Beneficiary Name</th>
                                        <th>Date of Birth</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $tableName = 'vw_beneficiary_list';
                                        $id = $_POST['id'];
                                        $data = array('id'=>$id, 'limit'=>'', 'field_name'=>'training_id');

                                        $beneficiaries = $gateway->genericFind($tableName, $data);
                                        if($beneficiaries['message'] === 'success'){
                                            foreach($beneficiaries['result'] as $beneficiary){
                                            ?>
                                                <tr>
                                                    <td><?php echo $beneficiary['id'];?></td>
                                                    <td style="font-size:14px">
                                                        <div class = "view_result">
                                                        <a><?php echo $beneficiary['first_name'] ." ".$beneficiary['surname'] ." ". $beneficiary['other_names'];?></a>
                                                    <div class ="pull-bottom">
                                                        <!-- <button type="button" class = "viewresult btn btn-success btn-xs" data-toggle="modal" data-target="#myModal" >Edit</button> -->

                                                        <button
                                                            data-training_id="<?php echo $beneficiary['training_id'] ?>"
                                                            data-personnel_id="<?php echo $beneficiary['id'] ?>"
                                                            class = "viewresult btn btn-danger remove-btn btn-xs"  >Remove
                                                        </button>
                                                        
                                                    </div>
                                                    </div>
                                                    </td> 
                                                    <td><?php echo $beneficiary['date_of_birth'] ?></td> 
                                                </tr>
                                                <?php
                                            }
                                        }else{ ?>
                                            <tr>
                                                <td colspan="7" style="text-align: center">No Record Available</td>
                                            </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
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
    $('#data-table').on('click', '.remove-btn', function () {
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
                let type = 'beneficiary';
                let operation = 'de';
                let personnel_id = $(this).data('personnel_id');
                let training_id = $(this).data('training_id');

                $.ajax({
                    url: 'ajax/crud.php',
                    type: 'POST',
                    data: {
                        personnel_id: personnel_id,
                        training_id: training_id,
                        type: type,
                        operation: operation
                    },
                    dataType: 'json',
                    success: function(response){
                        if(response.message == 'success'){
                            Swal.fire({
                                icon: 'success',
                                text: response.result.message,
                                customClass: "swal-size-sm",
                                showConfirmButton: 'OK'  
                            }).then(() => {
                                location.reload();
                            });
                        }
                    }
                })
            }
        });        
    });
    $('#add_beneficiary').on('click', function(){
        $('#new_beneficiary_modal').modal('show');
    });
    $('#search_beneficiary').on('click', function(){
            let personnel_id = $('#personnel_id').val();
            if(personnel_id.length > 0){
                let type = 'personnel';
                let operation = 'find';
                $.ajax({
                    url: 'ajax/crud.php',
                    type: 'POST',
                    data: {id: personnel_id, type: type, operation: operation},

                    success: function(response){
                        let data = JSON.parse(response);
                        if(data['message'] == 'success'){
                            let fullName = data['result']['first_name'] + " " + data['result']['surname'] + " " + data['result']['other_names']
                            $('#id').val(data['result']['personnel_id']);
                            $('#full_name').val(fullName);
                            $('#date_of_birth').val(data['result']['date_of_birth']);
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
                   //alert(response);
                    if (response.message === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successful!',
                            text: response.result.message,
                            customClass: "swal-size-sm",
                            showConfirmButton: 'OK'
                        }).then(() => {
                            location.reload();
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
            });
        });
    $('.modal-header .close').on('click', function(event){
        $('#new_beneficiary')[0].reset();
    });
});
</script>