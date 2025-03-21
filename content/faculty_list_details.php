<style>
.swal-size-sm {
    width: 650px !important;
    font-size: medium;
}
</style>
<div id="modal_form_faculty" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success" >
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_faculty"  class="form-horizontal" method="POST" >  
                    <input type="hidden" name="type" id="type" value="faculty" />
                    <input type="hidden" name="operation" id="operation" value="cr" />  
                    <input type="hidden" name="faculty_id" id="faculty_id" value="" /> 
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Name of Faculty</label>
                            <div class="col-md-6">
                                <input type="text" id="faculty_name" name="faculty_name" class="form-control" placeholder="enter faculty name" required />
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <input type="submit" value="Add Faculty" id="save" class="btn-success form-control"/>
                            </div>
                        </div>
                            
                    </div>
                </form>
            </div>
                    
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
				<li><a href="add_staff">Faculty List</a></li>
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
                            <h4 class="panel-title">Faculty List</h4>
                        </div>
                        <div class="panel-body">
                    <div class="pull-right">
                        <button id="btn_new_faculty" class="btn btn-primary"><i class="fa fa-plus m-r-5"></i>Add New Faculty</button>
                    </div>
                <table id="data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Faculty Name</th>
                            <th>Number of Department</th>
                            <th>Number of Staff</th>
                            <th>Name of Dean</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($faculty_list['message'] === 'success'){
                                $sn = 1;
                                foreach($faculty_list['result'] as $faculty){?>
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td>
                                            <div class="view_result">
                                                <a><?php echo "$faculty[name]" ?></a><br>
                                                <div class="viewresult pull-bottom">
                                                    <button type="button" data-id="<?php echo $faculty['faculty_id'] ?>" class="btn btn-success btn-xs btn-edit">Edit</button>
                                                    <button type="button" data-id="<?php echo $faculty['faculty_id'] ?>" class="btn btn-danger btn-xs btn-delete">Delete</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php //echo $faculty['department_count'] ?></td>
                                        <td><?php //echo $faculty['personnel_count'] ?></td>
                                        <td><?php //echo $staff['name_of_dean'] ?></td>
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
    $("#form_faculty").on("submit", function(event) { 
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
    $('#data-table').DataTable();
    $('#btn_new_faculty').on('click', function(){
        $('#form_faculty')[0].reset();
        $('#operation').val('cr');
        $('#type').val('faculty');
        $('#modal_form_faculty .modal-title').text("New Faculty");
        $('#modal_form_faculty').modal('show');
    });
    $('.btn-edit').on('click', function(){
        let id = $(this).data('id');
        let type = 'faculty';
        let operation = 'find';
        $.ajax({    
            url: 'ajax/crud.php',
            type: 'POST',
            data: {
                type: type,
                operation: operation,
                faculty_id: id
            },
            dataType: 'json',
            success: function(response){
                if(response.message == 'success'){
                    $('#modal_form_faculty .modal-title').text('Edit Faculty');
                    $('#faculty_id').val(response.id);
                    $('#type').val('faculty');
                    $('#operation').val('u');
                    $('#faculty_name').val(response.faculty_name);
                    $('#modal_form_faculty').modal('show');
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
                let type = 'faculty';
                let operation = 'de';
                $.ajax({
                    url: 'ajax/crud.php',
                    type: 'POST',
                    data: {faculty_id:id, type:type, operation:operation},
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
                        }else if(response.message == 'failed'){
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Delete failed. Contact Admin',
                                customClass: 'swal-size-sm'
                            });
                        }else if(response.message == 'error'){
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'An error occured. Contact Admin',
                                customClass: 'swal-size-sm' 
                            });
                        }
                    }
                });
            }
        });
    });
});
</script>

