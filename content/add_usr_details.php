<style>
.swal-size-sm {
	   width: 650px !important;
       font-size: medium;
	}
</style>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLongTitle"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="user" class="form-horizontal" method="POST" >
                    <input id="type" type="hidden" name="type" />
                    <input id="operation" type="hidden" name="operation"/>
                    <input id="id" type="hidden" name="id">

                        <!-- begin wizard step-1 -->
                        <div class="wizard-step-1">
                            <div class="alert alert-warning fade in m-b-15">
                                <strong>Warning!</strong>
                                You are about to edit a Training. Please ensure that all required information is entered correctly before proceeding.
                                <span class="close" data-dismiss="alert">×</span>
                            </div>
                        </div>
                    <fieldset>
                                
                    <div style="margin-top: 30px;" class="form-group">            
                        <label class="col-md-3 control-label">Staff ID<span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <input type="text" id="staff_id" name="staff_id" class="form-control input-lg" placeholder="Enter Staff ID" required />
                        </div>
                    </div>

                            <div class="form-group">
                            <label class="col-md-3 control-label">User Type</label>
                            <div class="col-md-8">
                                <div>
                                <select id="user_type" class="form-control input-lg" name="user_type"  required>
                                    <option value="" disabled selected>--select--</option>
                                    <option value="admin">Admin</option>
                                    <option value="normal">Normal</option>
                                </select>
                            </div>
                            </div>
                            </div>
                    </fieldset>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

    <!-- begin #content -->
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Home</a></li>
            <li><a href="javascript:;">Training</a></li>
            <li><a href="javascript:;">Staff List</a></li>
        
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Users</h1>
        <!-- end page-header -->
        
        <!-- begin row -->
        <div class="row">
            <!-- begin col-10 -->
            <div class="col-md-12">
                <!-- begin panel -->
                <div class="panel panel-inverse" >
                    <div class="panel-heading" style="background-color: #008000;">
                       
                        <h4 class="panel-title">List of Users</h4>
                    </div>
                   
                    <!-- <div class="alert alert-info fade in">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Select adds item selection capabilities to a DataTable. Items can be rows, columns or cells, which can be selected independently, or together. Item selection can be particularly useful in interactive tables where users can perform some action on the table, such as editing rows or marking items to perform an action on.
                    </div> -->
                   
                    <div class="panel-body">
                         
                    <row>                      
                    <div class=" pull-right" > <button id="add_new_tr" class="btn btn-success btn-sm "><i class="fa fa-plus m-r-5"></i>Add New User</button></div>
                    </row>

                        <br><br><br>
                       <div class = "responsive">
                            <table id="data-table" class="table table-striped table-bordered" width="100%">
                        
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Type</th>
                                    <th>Date Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $tableName = 'vw_staff_users';
                                    $data = array('id'=>'all', 'limit'=>'');

                                    $users = $gateway->genericFind($tableName, $data);
                                    if($users['message'] === 'success'){
                                        foreach($users['result'] as $user){
                                            ?>
                                            <tr>
                                                <td><?php echo $user['id']; ?> </td>
                                                <td style="font-size:14px">
                                                <div class = "view_result">
                                                    <a><?php echo "$user[first_name] $user[surname] $user[other_names]";?></a>
                                                    <div class ="pull-bottom">
                                                        <button data-id="<?php echo $user['id'] ?>" type="button" class = "viewresult btn btn-primary reset-btn btn-xs">Reset</button>
                                                        <button data-id="<?php echo $user['id'] ?>" class = "viewresult btn btn-danger delete-btn btn-xs">Delete</button>
                                                    </div>
                                                </div>
                                                </td>
                                                
                                                <td><?php echo $user['user_type'];?></td>
                                                <td><?php echo $user['date_created'];?></td>
                                            </tr>
                                            <?php
                                        }
                                    }else{ ?>
                                        <tr>
                                            <td colspan="7" style="text-align: center"><?php echo $users['result']['message'] ?></td>
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
    $('#data-table').on('click', '.reset-btn', function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#008000',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, reset user!',
            cancelButtonText: 'Cancel',
            customClass: "swal-size-sm"
        }).then((result) => {
            if (result.isConfirmed) {
                let user_id = $(this).data('id');
                let type = 'user';
                let operation = 'u';
                $.ajax({
                    url: 'ajax/crud.php',
                    type: 'POST',
                    data: {user_id: user_id, type: type, operation: operation},
                    success: function(response){
                        let data = JSON.parse(response);
                        if(data['message'] == 'success'){
                            Swal.fire({
                                icon: 'success',
                                title: data['message'],
                                text: data['result']['message'],
                                customClass: "swal-size-sm",
                                confirmButtonText: 'OK'
                            });
                            location.reload();
                        }else{
                            alert(data['message']);
                        }
                    }
                });
            }
        });
    }); 

    // Attach click event to dynamically added delete buttons
    $('#data-table').on('click', '.delete-btn', function () {
        // Remove the row containing the clicked button
         // Confirm before deletion
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
                let user_id = $(this).data('id');
                let type = 'user';
                let operation = 'de';
                $.ajax({
                    url: 'ajax/crud.php',
                    type: 'POST',
                    data: {user_id: user_id, type: type, operation: operation},
                    success: function(response){
                        let data = JSON.parse(response);
                        if(data['message'] == 'success'){
                            Swal.fire({
                                icon: 'success',
                                title: data['message'],
                                text: data['result']['message'],
                                customClass: "swal-size-sm",
                                confirmButtonText: 'OK'
                            });
                            location.reload();
                        }
                    }
                });
            }
        });
        
    });
    $('#user').on('submit', function(event){
        event.preventDefault();
        let id = $('#staff_id').val();
        let type = 'staff';
        let operation = 'find';

        let formData = new FormData(this);

        $.ajax({
            url: 'ajax/crud.php',
            type: 'POST',
            data: {staff_id:id, type:type, operation:operation},
            success: function(response){
                // alert(response);
                let data = JSON.parse(response);
                if(data.message == 'success'){
                    $.ajax({
                        url: 'ajax/crud.php',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(feedback){
                            if(feedback.message == 'success'){
                                Swal.fire({
                                    icon: 'success',
                                    title: feedback.message,
                                    text: feedback.result.message,
                                    customClass: "swal-size-sm",
                                    confirmButtonText: 'OK'
                                })
                                location.reload();
                            }else if(feedback.message == 'failed'){
                                Swal.fire({
                                    icon: 'error',
                                    title: feedback.message,
                                    text: feedback.result.message,
                                    customClass: "swal-size-sm",
                                    confirmButtonText: 'OK'
                                });
                            }
                        }
                        
                    });
                }else if(data.message == 'failed'){
                    Swal.fire({
                        icon: 'error',
                        title: data.message,
                        text: data.result.message,
                        customClass: "swal-size-sm",
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });
    $('#add_new_tr').on('click', function(){
        $('#type').val('user');
        $('#operation').val('cr');
        $('#myModalLongTitle').text('New User');
        $('#myModal').modal('show');
    });
});

</script>