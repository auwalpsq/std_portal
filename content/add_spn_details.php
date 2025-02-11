
<style>
.swal-size-sm {
	   width: 650px !important;
       font-size: medium;
}
</style>
<div id="modal_form_sponsor" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" >
                <h5 class="modal-title">Add New Training Sponsor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
                <form id="form_sponsorship"  class="form-horizontal" method="POST" >     
                    <input type="hidden" name="type" value="sponsorship" />
                    <input type="hidden" name="operation" value="cr">
                            <div class="form-group">
                            <label class="col-md-3 control-label">Sponsor Name</label>
                            <div class="col-md-6">
                                <input type="text" id="sponsor_name" name="sponsor_name" class="form-control input-lg" placeholder="enter Sponsor" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Email:</label>
                            <div class="col-md-6">
                                <input type="email" id="sponsor_email" name="sponsor_email" class="form-control input-lg" placeholder="name@example.com" required />
                            </div>
                        </div>  

                        <div class="form-group">
                            <label class="col-md-3 control-label">Phone:</label>
                            <div class="col-md-6">
                                <input type="tel" id="sponsor_phone" name="sponsor_phone" class="form-control input-lg" placeholder="+2348012345678" required />
                            </div>
                        </div>  
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-4">
                            <input type="submit" value="Add Sponsorship" id="save" class="btn-success form-control input-lg"/>
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
        <li><a href="add_ben">Add Sponsor</a></li>
        <!-- <li class="active">Wizards</li> -->
    </ol>
    <div class="row">
            <!-- begin col-12 -->
         <div class="col-md-12">
                <!-- begin panel -->
            <div class="panel panel-success" >
                    <div class="panel-heading" style="background-color: #008000;"> 
                        <h4 class="panel-title">Sponsors List</h4>
                    </div>
                <div class="panel-body">
                    <div class="pull-right">
                        <button id="btn_new_sponsor" class="btn btn-primary"><i class="fa fa-plus m-r-5"></i>Add New Sponsor</button>
                    </div>
                <table id="data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sponsor Name</th>
                            <th>Contact Number</th>
                            <th>Email Address</th>
                            <th>Training Sponsored</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $table_name = 'vw_sponsored_training';
                            $data = array('id'=>'all', 'limit'=>'');
                            $sponsor_list = $gateway->genericFind($table_name, $data);
                            if($sponsor_list['message'] === 'success'){
                                foreach($sponsor_list['result'] as $sponsor){?>
                                    <tr>
                                        <td><?php echo $sponsor['id'] ?></td>
                                        <td>
                                            <div class="view_result">
                                                <a><?php echo $sponsor['sponsor_name'] ?></a><br>
                                                <div class="viewresult pull-bottom">
                                                    <button type="button" data-id="<?php echo $sponsor['id'] ?>" class="btn btn-success btn-xs btn-edit">Edit</button>
                                                    <button type="button" data-id="<?php echo $sponsor['id'] ?>" class="btn btn-danger btn-xs btn-delete">Delete</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo $sponsor['sponsor_phone'] ?></td>
                                        <td><?php echo $sponsor['sponsor_email'] ?></td>
                                        <td><?php echo $sponsor['training_sponsored'] ?></td>
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
                        text: 'Failed to send email',
                        customClass: "swal-size-sm",
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });
    $('#data-table').DataTable();
    $('#btn_new_sponsor').on('click', function(){
        $('#form_sponsorship')[0].reset();
        $('#modal_form_sponsor .modal-title').text("New Training")
        $('#modal_form_sponsor').modal('show');
    });
    $('.btn-edit').on('click', function(){
        let id = $(this).data('id');
        let type = 'sponsorship';
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
                if(response.message == 'success'){
                    $('#modal_form_sponsor .modal-title').text('Edit Training Sponsor');
                    $('#sponsor_name').val(response[0].sponsor_name);
                    $('#sponsor_email').val(response[0].sponsor_email);
                    $('#sponsor_phone').val(response[0].sponsor_phone);
                    $('#modal_form_sponsor').modal('show');
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
                let type = 'sponsorship';
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