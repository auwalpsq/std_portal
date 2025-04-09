
<style>
.swal-size-sm {
	   width: 650px !important;
       font-size: medium;
}
</style>
<div id="modal_form_institution" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success" >
                <h5 class="modal-title">Add New Institution</h5>
                <button type="button" class="pull-right btn-warning" data-dismiss="modal" aria-label="Close" >X</button>
            </div>
            <div class="modal-body">
                <form id="form_institution"  class="form-horizontal" method="POST" >     
                    <input type="hidden" id="type" name="type" value="institution" />
                    <input type="hidden" id="operation" name="operation" value="cr">
                    <input type="hidden" id="institution_id" name="institution_id" value="">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Institution Name</label>
                            <div class="col-md-8">
                                <input type="text" id="institution_name" name="institution_name" class="form-control input-lg" placeholder="enter institution name" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Institution Code</label>
                            <div class="col-md-8">
                                <input type="text" id="institution_code" name="institution_code" class="form-control input-lg" placeholder="enter institution code" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Email:</label>
                            <div class="col-md-8">
                                <input type="email" id="institution_email" name="institution_email" class="form-control input-lg" placeholder="name@example.com" required />
                            </div>
                        </div>  

                        <div class="form-group">
                            <label class="col-md-3 control-label">Phone:</label>
                            <div class="col-md-8">
                                <input type="tel" id="institution_phone" name="institution_phone" class="form-control input-lg" placeholder="+2348012345678" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Address</label>
                            <div class="col-md-8">
                                <textarea id="institution_address" name="institution_address" class="form-control input-lg" placeholder="Address" rows="5"></textarea>
                            </div>
                        </div>  
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-4">
                            <input type="submit" value="Add Institution" id="save" class="btn-success form-control input-lg"/>
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
  <!-- begin #content -->
<div id="content" class="content" style="margin-top:5px;">
    <ol class="breadcrumb pull-right">
        <li><a href="dash">Home</a></li>
        <li><a href="inst_list">Institution List</a></li>
        <!-- <li class="active">Wizards</li> -->
    </ol>
    <h1 class="page-header">Manage Institutions<small>view, add, edit and delete institution</small></h1>
    <div class="row">
            <!-- begin col-12 -->
         <div class="col-md-12">
                <!-- begin panel -->
            <div class="panel panel-success" >
                    <div class="panel-heading" style="background-color: #008000;"> 
                        <h4 class="panel-title">Institution List</h4>
                    </div>
                <div class="panel-body">
                    <div class="pull-right">
                        <button id="btn_new_institution" class="btn btn-primary"><i class="fa fa-plus m-r-5"></i>Add New Institution</button>
                    </div>
                <table id="data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Institution Name</th>
                            <th>Institution Code</th>
                            <th>Contact Number</th>
                            <th>Email Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $table_name = 'institution';
                            $data = array('id'=>'all', 'limit'=>'');
                            $institution_list = $gateway->genericFind($table_name, $data);
                            if($institution_list['message'] === 'success'){
                                $sn = 1;
                                foreach($institution_list['result'] as $institution){?>
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td>
                                            <div class="view_result">
                                                <a><?php echo $institution['instname'] ?></a><br>
                                                <div class="viewresult pull-bottom">
                                                    <button type="button" data-id="<?php echo $institution['institutionId'] ?>" class="btn btn-success btn-xs btn-edit">Edit</button>
                                                    <button type="button" data-id="<?php echo $institution['institutionId'] ?>" class="btn btn-danger btn-xs btn-delete">Delete</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo $institution['instcode'] ?></td>
                                        <td><?php echo $institution['phone'] ?></td>
                                        <td><?php echo $institution['email'] ?></td>
                                    </tr>
                        <?php   }
                        } ?>
                    </tbody>
                </table>
                    
		        </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $("#form_institution").on("submit", function(event) { 
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
                //alert(response);
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
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: response.message,
                        text: response.result.message,
                        customClass: "swal-size-sm",
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });
    $('#data-table').DataTable();
    $('#btn_new_institution').on('click', function(){
        $('#form_institution')[0].reset();
        $('#modal_form_institution .modal-title').text("New Training")
        $('#modal_form_institution').modal('show');
        $('#type').val('institution');
        $('#operation').val('cr');
    });
    $('.btn-edit').on('click', function(){
        let id = $(this).data('id');
        //alert(id);
        let type = 'institution';
        let operation = 'find';
        $.ajax({
            url: 'ajax/crud.php',
            type: 'POST',
            data: {
                type: type,
                operation: operation,
                id: id
            },
            dataType: 'json',
            success: function(response){
                //alert(response);
                if(response.message == 'success'){
                    $('#modal_form_institution .modal-title').text('Edit Institution');
                    $('#operation').val('u');
                    $('#institution_name').val(response.name);
                    $('#institution_code').val(response.code);
                    $('#institution_address').val(response.address);
                    $('#institution_email').val(response.email);
                    $('#institution_phone').val(response.phone);
                    $('#institution_id').val(response.id);
                    $('#modal_form_institution').modal('show');
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
                let type = 'institution';
                let operation = 'de';
                $.ajax({
                    url: 'ajax/crud.php',
                    type: 'POST',
                    data: {id:id, type:type, operation:operation},
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