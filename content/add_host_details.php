
<style>
.swal-size-sm {
	   width: 650px !important;
       font-size: medium;
}
</style>
<div id="modal_form_host" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" >
                <h5 class="modal-title">Add New Training Host</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>b
            <div class="modal-body">
                <form id="form_host"  class="form-horizontal" method="POST" >   
                    <input type="hidden" name="type" value="host_training" />
                    <input type="hidden" name="operation" value="cr" />  
                    <input type="hidden" name="id" />
                    <div class="alert alert-warning fade in m-b-15">
                        <strong>Warning!</strong>
                        Ensure you are adding the right Training Host.
                        <span class="close" data-dismiss="alert">×</span>
                    </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Training Host name:</label>
                            <div class="col-md-9">
                                <input type="text" name="host_name" class="form-control input-lg" placeholder="enter training host name" required />
                            </div>
                        </div>  

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <input type="submit" value="Save" id="save" class="btn-success form-control input-lg"/>
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
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="dash">Home</a></li>
				<li><a href="add_host">Add Training Host</a></li>
				<!-- <li class="active">Wizards</li> -->
			</ol>
            
			<!-- begin row -->
			<div class="row">
                <!-- begin col-12 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-success" >

                        <div class="panel-heading" style="background-color: #008000;"> 
                            <h4 class="panel-title">Training Host List</h4>
                        </div>
                      
                        <div class="panel-body">
                            <div class="pull-right">
                                <button id="btn_new_host" class="btn btn-primary"><i class="fa fa-plus m-r-5"></i>Add New Host</button>
                            </div>
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Host Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $table_name = 'traininghost';
                                        $data = array('id'=>'all', 'limit'=>'');
                                        $host_list = $gateway->genericFind($table_name, $data);
                                        if($host_list['message'] === 'success'){
                                            foreach($host_list['result'] as $host){?>
                                                <tr>
                                                    <td> <?php echo $host['cthostid'] ?></td>
                                                    <td>
                                                        <div class="view_result" >
                                                            <a><?php echo $host['vthostname'] ?></a><br>
                                                            <div class="viewresult pull-bottom">
                                                                <button type="button" data-id="<?php echo $host['cthostid']?>" class="btn btn-success btn-xs btn-edit">Edit</button>
                                                                <button type="button" data-id="<?php echo $host['cthostid']?>" class="btn btn-danger btn-xs btn-delete" >Delete</button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                    <?php }?>
                                </tbody>
                            </table>
                        
				</div>
                        </div>
                    </div>
                    <!-- end panel -->
            </div>
                
                <!-- end col-12 -->
    </div>

<script>
$(document).ready(function(){
    $("#form_host").on("submit", function(event) { 
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
                        title: response.message,
                        text: response.result.message,
                        customClass: 'swal-size-sm'
                    });
                    location.reload();
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: response.message,
                        text: response.result.message,
                        customClass: 'swal-size-sm'
                    });
                }
            }
        });
    });
    $('#data-table').DataTable();
    $('#btn_new_host').on('click', function(){
        $('#form_host').trigger('reset');
        $('#modal_form_host').modal('show');
        $('#modal_form_host').find('.modal-title').text('New Training Host');
        $('#modal_form_host').find('input[name="operation"]').val('cr');
        $('#modal_form_host').find('input[name="host_name"]').focus();
        $('#modal_form_host').modal('show');
    });
    $('.btn-edit').on('click', function(){
        let id = $(this).data('id');
        let operation = 'find';
        let type = 'host_training';

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
                if(response.message =='success'){
                    $('#modal_form_host').modal('show');
                    $('#modal_form_host').find('.modal-title').text('Edit Training Host');
                    $('#modal_form_host').find('input[name="host_name"]').val(response[0].host_name);
                    $('#modal_form_host').find('input[name="id"]').val(response[0].id);
                    $('#modal_form_host').find('input[name="operation"]').val('u');
                    $('#modal_form_host').find('input[name="host_name"]').focus();
                }
            }
    
        });
    });
    $('.btn-delete').on('click', function(){
        let id = $(this).data('id');
        let type = 'host_training';
        let operation = 'de';

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            customClass: 'swal-size-sm'
        }).then((result) => {
            if (result.isConfirmed) {
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
                        if(response.message =='success'){
                            Swal.fire({
                                title: 'Deleted!',
                                text: response.result.message,
                               icon: 'success',
                               customClass: 'swal-size-sm'

                            });
                            location.reload();
                        }
                    }
                });
            }
        });
    });
});
</script>