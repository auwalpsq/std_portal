<style>
.swal-size-sm {
    width: 650px !important;
    font-size: medium;
}
</style>
<div id="modal_form_directorate" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success" >
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_directorate"  class="form-horizontal" method="POST" >  
                    <input type="hidden" name="type" id="type" value="directorate" />
                    <input type="hidden" name="operation" id="operation" value="cr" />  
                    <input type="hidden" name="directorate_id" id="directorate_id" value="" /> 
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Name of Faculty/Directorate</label>
                            <div class="col-md-7">
                                <input type="text" id="directorate_name" name="directorate_name" class="form-control" placeholder="enter directorate name" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Category</label>
                            <div class="col-md-7">
                                <label class="radio-inline">
                                    <input type="radio" name="category" class="category" value="academic"> Academic
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="category" class="category" value="nonacademic"> Non Academic
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <input type="submit" value="Add Directorate" id="save" class="btn-success form-control"/>
                            </div>
                        </div>
                            
                    </div>
                </form>
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
				<li><a href="add_staff">Directorate List</a></li>
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
                            <h4 class="panel-title">Directorate List</h4>
                        </div>
                <div class="panel-body">
                    <div class="row m-b-10">
                        <button id="btn_new_directorate" class="btn btn-primary pull-right"><i class="fa fa-plus m-r-5"></i>Add New Directorate</button>
                    </div>
                <table id="data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Directorate Name</th>
                            <th>Number of Unit</th>
                            <th>Number of Staff</th>
                            <th>Name of Director</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($directorate_list['message'] === 'success'){
                                $sn = 1;
                                foreach($directorate_list['result'] as $directorate){?>
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td>
                                            <div class="view_result">
                                                <a><?php echo "$directorate[name]" ?></a><br>
                                                <div class="viewresult pull-bottom">
                                                    <button type="button" data-id="<?php echo $directorate['directorate_id'] ?>" class="btn btn-success btn-xs btn-edit">Edit</button>
                                                    <button type="button" data-id="<?php echo $directorate['directorate_id'] ?>" class="btn btn-danger btn-xs btn-delete">Delete</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo $directorate['unit_count'] ?></td>
                                        <td><?php echo $directorate['personnel_count'] ?></td>
                                        <td><?php echo $directorate['hod_name'] ?></td>
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
    $("#form_directorate").on("submit", function(event) { 
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
    $('#btn_new_directorate').on('click', function(){
        $('#form_directorate')[0].reset();
        $('#operation').val('cr');
        $('#type').val('directorate');
        $('#modal_form_directorate .modal-title').text("New directorate");
        $('#modal_form_directorate').modal('show');
    });
    $('.btn-edit').on('click', function(){
        let id = $(this).data('id');
        let type = 'directorate';
        let operation = 'find';
        $.ajax({    
            url: 'ajax/crud.php',
            type: 'POST',
            data: {
                type: type,
                operation: operation,
                directorate_id: id
            },
            dataType: 'json',
            success: function(response){
                //alert(response);
                if(response.message == 'success'){
                    $('#modal_form_directorate .modal-title').text('Edit directorate');
                    $('#directorate_id').val(response.id);
                    $('#type').val('directorate');
                    $('#operation').val('u');
                    $('#directorate_name').val(response.directorate_name);
                    let category = response.category;
                    if(category == 'academic'){
                        $('.category[value="academic"]').prop('checked', true);
                    }else if(category == 'nonacademic'){
                        $('.category[value="nonacademic"]').prop('checked', true);
                    }else{
                        $('.category').prop('checked', false);
                    }
                    $('#modal_form_directorate').modal('show');
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
                let type = 'directorate';
                let operation = 'de';
                $.ajax({
                    url: 'ajax/crud.php',
                    type: 'POST',
                    data: {directorate_id:id, type:type, operation:operation},
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

