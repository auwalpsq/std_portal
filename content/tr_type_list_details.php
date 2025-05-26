<style>

.swal-size-sm {
	   width: 650px !important;
       font-size: medium;
	}

</style>
<div class="modal fade" id="modal_form_tr_type" tabindex="-1" role="dialog" aria-labelledby="myModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLongTitle">Training Type</h3>
                <div class="pull-right">
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            </div>
            <form class="row" id="form_training_type" method="POST">
                <div class="modal-body">
                        <input type="hidden" name="tr_type_id" id="tr_type_id">
                        <input type="hidden" name="type" id="type">
                        <input type="hidden" name="operation" id="operation">
                        <div class="row">
                            <label class="control-label col-md-3">Training Type Name</label>
                            <div class="col-md-8">
                                <input type="text" id="tr_type_name" name="tr_type_name" class="form-control" required>
                            </div>        
                        </div>   
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="button" class="btn btn-error" data-dismiss="modal">&times</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="content" class="content" style="margin-top:5px;">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="dash">Home</a></li>
        <li><a href="add_ben">Add Training Type</a></li>
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
                    
                    <h4 class="panel-title">Training Type List</h4>
                </div>
        <div class="panel-body">
            <diV class="row m-b-10">
                <button id="btn_new_tr_type" class="btn btn-primary pull-right"><i class="fa fa-plus m-r-5"></i>New Training Type</button>
            </diV>
            <div class="row">
                <table id="data-table" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Training Type Name</th>
                            <th>Action</th>
                        </tr>
                        <tbody>
                            <?php
                                $tableName = "trainingtype";
                                $data = array('id'=>'all', 'limit'=>'') ;
                                $training_types = $gateway->genericFind($tableName, $data);

                                if($training_types['message'] == 'success'){
                                    foreach($training_types['result'] as $training_type){ ?>
                                        <tr>
                                            <td><?php echo $training_type['cttypeid'] ?></td>
                                            <td><?php echo $training_type['vttypename'] ?></td>
                                            <td>
                                                <button data-id="<?php echo $training_type['cttypeid'] ?>" class="btn-edit-tr-type btn btn-primary btn-sm">Edit </button>
                                                <button data-id="<?php echo $training_type['cttypeid'] ?>" class="btn-delete-tr-type btn btn-danger btn-sm">Delete</>
                                            </td>
                                        </tr>
                                <?php }
                                }else if($training_types['message'] == 'failed'){
                                    echo "<tr><td colspan='3'>No data found</td></tr>";
                                }else {
                                }
                            ?>
                        </tbody>
                    </thead>
                </table>
            </div> 
        </div>
    </div>
    </div>
            <!-- end panel -->
        </div>
        
        <!-- end col-12 -->
</div>

       <script>
$(document).ready(function(){
    $("#form_training_type").on("submit", function(event) { 
        event.preventDefault(); // Prevent the default form submission

        let formData = new FormData(this);
        $.ajax({
            url: 'ajax/crud.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            dataType: 'json', // Expect JSON response from server
            success: function(response){
                if(response.message == 'success'){
                    Swal.fire({
                        icon: 'success',
                        title: response.message,
                        text: response.result.message,
                        customClass: 'swal-size-sm',
                        showConfirmButton: 'OK',
                    })
                    location.reload();
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: response.message,
                        text: response.result.message,
                        customClass: 'swal-size-sm'
                    })
                }
            }
        });
    });
    $("#btn_new_tr_type").on('click', function(){
        $('#form_training_type')[0].reset();
        $('#type').val('training_type');
        $('#operation').val('cr');
        $('#modal_form_tr_type .modal-title').text('New Training Type');
        $('#modal_form_tr_type').modal('show');
    });
    $(".btn-edit-tr-type").on('click', function(){
        let id = $(this).data('id');
        let data = {id:id, type:'training_type', operation:'find'};
        $.ajax({
            url: 'ajax/crud.php',
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(response){
                if(response.message == 'success'){
                    $('#modal_form_tr_type .modal-title').text('Edit Training Type');
                    $('#modal_form_tr_type').modal('show');
                    $('#tr_type_name').val(response[0].tr_type_name);
                    $('#tr_type_id').val(response[0].tr_type_id);
                    $('input[name="type"]').val('training_type');
                    $('input[name="operation"]').val('u');
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: response.message,
                        text: response.result.message,
                        customClass: 'swal-size-sm'
                    })
                }
            }
        });
    });
    $('#data-table').on('click', '.btn-delete-tr-type', function(){
        let id = $(this).data('id');
        let data = {id:id, type:'training_type', operation:'de'};
        Swal.fire({
            title: 'Are you sure',
            text: "You won't be able to revert this!",
            icon: 'question',
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
                    data: data,
                    dataType: 'json',
                    success: function(response){
                        if(response.message == 'success'){
                            Swal.fire({
                                icon: 'success',
                                title: response.message,
                                text: response.result.message,
                                customClass: 'swal-size-sm',
                                showConfirmButton: 'OK'
                            }).then((result) => {
                                location.reload();
                            });
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: response.message,
                                text: response.result.message,
                                customClass: 'swal-size-sm',
                                confirmButtonText: 'OK'
                            }).then((result) => {
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