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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="row align-items-center justify-content-center" id="form_training_type" method="POST">
                <div class="modal-body">
                    
                        <input type="hidden" name="type">
                        <input type="hidden" name="operation">
                        <div class="form-group">
                            <label class="control-label col-md-3">Training Type Name</label>
                            <div class="col-md-8">
                                <input type="text" id="tr_type_name" name="tr_type_name" class="form-control">
                            </div>        
                        </div>   
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
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
            <diV class="row pull-right">
                <button id="btn_new_tr_type" class="btn btn-primary"><i class="fa fa-plus"></i>New Training Type</button>
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
                                                <button data-id="<?php echo $training_type['cttypeid'] ?>" class="btn-edit-tr-type btn btn-primary btn-sm">Edit <button/>
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
                        customClass: 'swal-size-sm'
                    })
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
        $('#modal_form_tr_type .modal-title').text('New Training Type');
        $('#modal_form_tr_type').modal('show');
    });
    $(".btn-edit-tr-type").on('click', function(){
        let id = $(this).data('id');
        let data = {id:id, operation:''};
        $.ajax({
            url: 'ajax/crud.php',
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(response){
                if(response.message == 'success'){
                    $('#form_training_type')[0].reset();
                    $('#modal_form_tr_type .modal-title').text('Edit Training Type');
                    $('#modal_form_tr_type').modal('show');
                    $('#tr_type_name').val(response.result.vttypename);
                    $('input[name="type"]').val(response.result.cttypeid);
                    $('input[name="operation"]').val('edit');
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: response.message,
                        text: response.result.message,
                        customClass: 'swal-size-sm'
});
</script>