<style>
.swal-size-sm {
    width: 650px !important;
    font-size: medium;
}
</style>
<div id="modal_form_personnel" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success" >
                <h5 class="modal-title"></h5>
                <button type="button" class="pull-right" data-dismiss="modal" aria-label="Close" aria-hidden="true">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="form_personnel"  class="form-horizontal" method="POST" >  
                        <input type="hidden" name="type" id="type" value="personnel" />
                        <input type="hidden" name="operation" id="operation" value="cr" />  
                        <input type="hidden" name="personnel_id" id="personnel_id" value="" /> 
                            <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">First Name</label>
                                        <div class="col-md-6">
                                            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="enter first name" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Surname</label>
                                        <div class="col-md-6">
                                            <input type="text" id="surname" name="surname" class="form-control" placeholder="enter surname" required />
                                        </div>
                                    </div>  

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Other Names</label>
                                        <div class="col-md-6">
                                            <input type="text" id="other_names" name="other_names" class="form-control" placeholder="enter other names"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Email Address</label>
                                        <div class="col-md-6">
                                            <input type="email" id="email" name="email" class="form-control" placeholder="enter email address" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Date of Birth</label>
                                        <div class="col-md-6">
                                            <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" placeholder="date of birth" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Gender</label>
                                        <div class="col-md-6">
                                            <label class="radio-inline">
                                                <input type="radio" class="gender" name="gender" id = "male" class="gender" value="male" required> Male
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" class="gender" name="gender" id="female" class="gender" value="female" required> Female
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Category</label>
                                        <div class="col-md-6">
                                            <label class="radio-inline">
                                                <input type="radio" name="category" class="category" value="academic" required> Academic
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="category" class="category" value="nonacademic" required> Non Academic
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group div-category">
                                        <label class="col-md-3 control-label">Faculty/Directorate</label>
                                        <div class="col-md-6">
                                            <select id="directorate" name="directorate" class="form-control" required>
                                                <option value="">--Select Directorate--</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group div-category">
                                        <label class="col-md-3 control-label">Department/Unit</label>
                                        <div class="col-md-6">
                                            <select class="form-control" id="unit" name="unit" required>
                                                <option value="">--Select Unit--</option>
                                            </select>
                                        </div>
                                    </div>
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-4">
                            <input type="submit" value="Add Personnel" id="save" class="btn-success form-control"/>
                        </div>
                    </div>
                    </form>            
                            </div>
                            <!-- end wizard step-2 -->
                        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
</div>
  <!-- begin #content -->
    <div id="content" class="content" style="margin-top:5px;">




			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="dash">Home</a></li>
				<li><a href="add_personnel">personnel List</a></li>
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
                            <h4 class="panel-title">Personnel List</h4>
                        </div>
                        <div class="panel-body">
                    <div class="pull-right">
                        <button id="btn_new_personnel" class="btn btn-primary"><i class="fa fa-plus m-r-5"></i>Add New Personnel</button>
                    </div>
                <table id="data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Faculty/Directorate</th>
                            <th>Department/Unit</th>
                            <th>Date of Birth</th>
                            <th>Date Created</th>
                            <th>Last Modified</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $table_name = 'vw_personnel_details';
                            $data = array('id'=>'all', 'limit'=>'');
                            $personnel_list = $gateway->genericFind($table_name, $data);
                            if($personnel_list['message'] === 'success'){
                                $sn = 1;
                                foreach($personnel_list['result'] as $personnel){?>
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td>
                                            <div class="view_result">
                                                <a><?php echo "$personnel[first_name] $personnel[surname] $personnel[other_names]" ?></a><br>
                                                <div class="viewresult pull-bottom">
                                                    <button type="button" data-id="<?php echo $personnel['personnel_id'] ?>" class="btn btn-success btn-xs btn-edit">Edit</button>
                                                    <button type="button" data-id="<?php echo $personnel['personnel_id'] ?>" class="btn btn-danger btn-xs btn-delete">Delete</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo $personnel['email'] ?></td>
                                        <td><?php echo $personnel['directorate'] ?></td>
                                        <td><?php echo $personnel['unit'] ?></td>
                                        <td><?php echo $personnel['date_of_birth'] ?></td>
                                        <td><?php echo $personnel['date_created'] ?></td>
                                        <td><?php echo $personnel['last_modified'] ?></td>
                                    </tr>
                        <?php   }
                        } ?>
                    </tbody>
                </table>
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
    $("#form_personnel").on("submit", function(event) { 
        event.preventDefault(); // Prevent the default form submission

        let formData = new FormData(this);

        $.ajax({
            url: 'ajax/crud.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            beforeSend: function(){
                Swal.fire({
                    title: 'Processing',
                    text: 'Please wait...',
                    showConfirmButton: false,
                    customClass: "swal-size-sm",
                });
                Swal.showLoading();
            },
            success: function(response){
                Swal.close();
                if(response.message == 'success'){
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.result.message,
                        customClass: "swal-size-sm"
                    }).then((result) => {
                        if(result.isConfirmed){
                            location.reload();
                        }
                    });
                }else if(response.message == 'failed'){
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Update failed',
                        customClass: "swal-size-sm",
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });
    $('#btn_new_personnel').on('click', function(){
        $('#form_personnel')[0].reset();
        $('#directorate').html('<option value="">--Faculty/Directorate--</option>');
        $('#unit').html('<option value="">--Unit/Department--</option>');
        $('#type').val('personnel');
        $('#operation').val('cr');
        $('#modal_form_personnel .modal-title').text("New personnel")
        $('#modal_form_personnel').modal('show');
    });
    $('.btn-edit').on('click', function(){
        let id = $(this).data('id');
        let type = 'personnel_details';
        let operation = 'find';
        //alert(id);
        $.ajax({
            url: 'ajax/crud.php',
            type: 'POST',
            data: {
                type: type,
                operation: operation,
                personnel_id: id
            },
            dataType: 'json',
            success: function(response){
                //alert(response);
                if(response.personnel.message == 'success'){
                    $('#modal_form_personnel .modal-title').text('Edit personnel');
                    $('#personnel_id').val(response['personnel'][0].personnel_id);
                    $('#operation').val('u');
                    $('#type').val('personnel');
                    $('#first_name').val(response['personnel'][0].first_name);
                    $('#surname').val(response['personnel'][0].surname);
                    $('#other_names').val(response['personnel'][0].other_names);
                    $('#email').val(response['personnel'][0].email);
                    $('#date_of_birth').val(response['personnel'][0].dob);
                    let gender = response['personnel'][0].gender;
                    if(gender =='male'){
                        $('#male').prop('checked', true);
                    }else if(gender =='female'){
                        $('#female').prop('checked', true);
                    }
                    let category = response['personnel'][0].category;
                    if(category == 'academic'){
                        $('.category[value="academic"]').prop('checked', true);
                    }else if(category == 'nonacademic'){
                        $('.category[value="nonacademic"]').prop('checked', true);
                    }
                    $('#directorate').html(response['response_category']);
                    $('#unit').html(response['response_unit']);
                    $('#modal_form_personnel').modal('show');
                }
            }
        });
    });
    $('.btn-delete').on('click', function(){
        Swal.fire({
            title: 'Delete Action',
            icon: 'warning',
            text: 'This action cannot be undone',
            showCancelButton: true,
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, Delete',
            customClass: 'swal-size-sm'
        }).then((result) => {
            if(result.isConfirmed){
                let id = $(this).data('id');
                let type = 'personnel';
                let operation = 'de';
                $.ajax({
                    url: 'ajax/crud.php',
                    type: 'POST',
                    data: {personnel_id:id, type:type, operation:operation},
                    dataType: 'json',
                    success: function(response){
                        if(response.message == 'success'){
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Deleted Successfully',
                                customClass: 'swal-size-sm'
                            }).then(() => {
                                location.reload();
                            });
                        }
                    }
                });
            }
        });
    });
});
</script>

