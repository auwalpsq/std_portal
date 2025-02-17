<style>
.swal-size-sm {
    width: 650px !important;
    font-size: medium;
}
</style>
<div id="modal_form_staff" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success" >
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="form_staff"  class="form-horizontal" method="POST" >  
                        <input type="hidden" name="type" value="staff" />
                        <input type="hidden" name="operation" id="operation" value="cr" />  
                        <input type="hidden" name="staff_id" id="staff_id" value="" /> 
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
                                            <input type="email" id="email" name="email" class="form-control" placeholder="enter email address"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Department</label>
                                        <div class="col-md-6">
                                            <input type="text" id="department" name="department" class="form-control" placeholder="enter department"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Date of Birth</label>
                                        <div class="col-md-6">
                                            <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" placeholder="date of birth"/>
                                        </div>
                                    </div>
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-4">
                            <input type="submit" value="Add Staff" id="save" class="btn-success form-control"/>
                        </div>
                    </div>
                                
                            </div>
                            <!-- end wizard step-2 -->
                        </div>
                    </form>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
  <!-- begin #content -->
    <div id="content" class="content" style="margin-top:5px;">




			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="dash">Home</a></li>
				<li><a href="add_staff">Staff List</a></li>
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
                            <h4 class="panel-title">Staff List</h4>
                        </div>
                        <div class="panel-body">
                    <div class="pull-right">
                        <button id="btn_new_staff" class="btn btn-primary"><i class="fa fa-plus m-r-5"></i>Add New Staff</button>
                    </div>
                <table id="data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Department</th>
                            <th>Email</th>
                            <th>Date of Birth</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $table_name = 'staff';
                            $data = array('id'=>'all', 'limit'=>'');
                            $staff_list = $gateway->genericFind($table_name, $data);
                            if($staff_list['message'] === 'success'){
                                foreach($staff_list['result'] as $staff){?>
                                    <tr>
                                        <td><?php echo $staff['staff_id'] ?></td>
                                        <td>
                                            <div class="view_result">
                                                <a><?php echo "$staff[first_name] $staff[surname] $staff[other_names]" ?></a><br>
                                                <div class="viewresult pull-bottom">
                                                    <button type="button" data-id="<?php echo $staff['staff_id'] ?>" class="btn btn-success btn-xs btn-edit">Edit</button>
                                                    <button type="button" data-id="<?php echo $staff['staff_id'] ?>" class="btn btn-danger btn-xs btn-delete">Delete</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo $staff['department'] ?></td>
                                        <td><?php echo $staff['email'] ?></td>
                                        <td><?php echo $staff['date_of_birth'] ?></td>
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
    $("#form_staff").on("submit", function(event) { 
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
                        text: response.result.message +" "+ response.email_response,
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
    $('#data-table').DataTable();
    $('#btn_new_staff').on('click', function(){
        $('#form_staff')[0].reset();
        $('#operation').val('cr');
        $('#modal_form_staff .modal-title').text("New Staff")
        $('#modal_form_staff').modal('show');
    });
    $('.btn-edit').on('click', function(){
        let id = $(this).data('id');
        let type = 'staff';
        let operation = 'find';
        $.ajax({
            url: 'ajax/crud.php',
            type: 'POST',
            data: {
                type: type,
                operation: operation,
                staff_id: id
            },
            dataType: 'json',
            success: function(response){
                if(response.message == 'success'){
                    $('#modal_form_staff .modal-title').text('Edit Staff');
                    $('#staff_id').val(response[0].id);
                    $('#operation').val('u');
                    $('#first_name').val(response[0].first_name);
                    $('#surname').val(response[0].surname);
                    $('#other_names').val(response[0].other_names);
                    $('#email').val(response[0].email);
                    $('#department').val(response[0].department);
                    $('#date_of_birth').val(response[0].dob);
                    $('#modal_form_staff').modal('show');
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
                let type = 'staff';
                let operation = 'de';
                $.ajax({
                    url: 'ajax/crud.php',
                    type: 'POST',
                    data: {staff_id:id, type:type, operation:operation},
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

