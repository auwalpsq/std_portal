<style>
.swal-size-sm {
	   width: 650px !important;
       font-size: medium;
}
</style>
<!-- Modal -->
<div class="modal fade" id="modal-form-st-leave" tabindex="-1" role="dialog" aria-labelledby="myModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                <h3 class="modal-title" id="modal-leave-title"></h3>
            </div>
            <div c  lass="modal-body">
                <form id="form_study_leave" class="form-horizontal" method="POST" >
                    <input id="type" type="hidden" name="type" />
                    <input id="operation" type="hidden" name="operation"/>
                    <input id="id" type="hidden" name="id">
                    <div class="row">
                        <div class="col-sm-10 p-0"><input type="text" id="personnel_id" name="personnel_id" class="form-control input" placeholder="enter staff id or email"></div>
                        <div class="col-sm-2 p-0"><button type="button" id="search_staff" name="search_staff" class="m-l-0 btn btn-success"><i class="fa fa-search"></i>Search </button></div>
                    </div>
                    <div>
                        <div style="margin-top: 20px;" class="form-group">
                                        
                            <label class="col-md-3 control-label">Full Name<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Staff Full Name" disabled required />
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label class="col-md-3 control-label">Faculty</label>
                            <div class="col-md-8">
                                <input type="text" id="faculty" name="faculty" class="form-control" placeholder="Faculty" disabled />
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-3 control-label">Department</label>
                                <div class="col-md-8">
                                    <input type="text" name="department" id="department" class="form-control" placeholder="Department" disabled required />
                                </div>
                        </div>         -->
                            <div class="form-group">
                            <label class="col-md-3 control-label">Institution</label>
                            <div class="col-md-8">
                                    <div>
                                <select id="institution" class="form-control" name="institution"  required>
                                    <option value="" disabled selected>--select--</option>
                                    <?php
                                        $tableName = 'institution';
                                        $data = array('id'=>'all', 'limit'=>'');

                                        $response = $gateway->genericFind($tableName, $data);
                                        if($response['message'] === 'success'){
                                            $results = $response['result'];
                                            foreach($results as $result){
                                                echo "<option value=\"{$result['institutionId']}\">{$result['instname']}</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Programme</label>
                            <div class="col-md-8">
                                    <div>
                                <select id="programme" class="form-control" name="programme"  required>
                                    <option value="" disabled selected>--select--</option>
                                    <option value="First Degree">First Degree</option>
                                     <option value="Masters">Masters</option>
                                     <option value="PhD">Ph.D</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Discipline</label>
                            <div class="col-md-8">
                                <input id="discipline" type="text" name="discipline" class="form-control" placeholder="Discipline" required />
                            </div>
                        </div>
                            <div class="form-group">
                            <label class="col-md-3 control-label">Sponsor</label>
                            <div class="col-md-8">
                                <select id="sponsor" class="form-control" name="sponsor"  required>
                                    <option value="" disabled selected>--select--</option>
                                    <?php
                                        $tableName = 'sponsorshiptype';
                                        $data = array('id'=>'all', 'limit'=>'');

                                        $response = $gateway->genericFind($tableName, $data);
                                        if($response['message'] === 'success'){
                                            $results = $response['result'];
                                            foreach($results as $result){
                                                echo "<option value=\"{$result['cspshipid']}\">{$result['vspshipname']}</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="col-md-3 control-label">Effective Date:</label>
                            <div class="col-md-8">
                                <input id="start_date" type="date" name="start_date" class="form-control" placeholder="Location" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Expected Date of Completion:</label>
                            <div class="col-md-8">
                                <input id="end_date" type="date" name="end_date" class="form-control" placeholder="Location" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Remark</label>
                            <div class="col-md-8">
                                <textarea id="remark" name="remark" class="form-control" placeholder="Remark" rows="5"></textarea>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="col-md-3 control-label">Status</label>
                            <div class="col-md-8">
                                <select id="status" class="form-control" name="status"  required>
                                    <option value="" disabled selected>--select--</option>
                                    <option value="On Going">On Going</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Elapsed">Elapsed</option>
                                    <option value="Staff is Deceased">Staff is Deceased</option>
                                </select>
                            </div>
                            </div>               
                        </div>
                        <!-- end wizard -->
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
            <li><a href="javascript:;">Training List</a></li>
        
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Study Leave</h1>
        <!-- end page-header -->
        
        <!-- begin row -->
        <div class="row">
            <!-- begin col-10 -->
            <div class="col-md-12">
                <!-- begin panel -->
                <div class="panel panel-inverse" >
                    <div class="panel-heading" style="background-color: #008000;">
                       
                        <h4 class="panel-title">Study Leave List</h4>
                    </div>
                   
                    <!-- <div class="alert alert-info fade in">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Select adds item selection capabilities to a DataTable. Items can be rows, columns or cells, which can be selected independently, or together. Item selection can be particularly useful in interactive tables where users can perform some action on the table, such as editing rows or marking items to perform an action on.
                    </div> -->
                    
                   
                    <div class="panel-body">
                         
                    <row>                      
                        <div class=" pull-right" > <button id="new_study_leave" class="btn btn-success btn-sm "><i class="fa fa-plus m-r-5"></i>New Study Leave</button></div>
                    </row>

                        <br><br><br>
                       <div class = "responsive">
                         <table id="data-table" class="table table-striped table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Degree</th>
                                    <th> Effective Date </th>
                                    <th>Expected Date of Completion</th>
                                    <th>Sponsor</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $tableName = 'vw_staff_on_leave';
                                $data = array('id'=>'all', 'limit'=>'');
                                $staffs_on_leave = $gateway->genericFind($tableName, $data);
                                // var_dump( $trainings );
                                // exit();
                                if($staffs_on_leave['message'] === 'success'){
                                    $sn = 1;
                                    foreach($staffs_on_leave['result'] as $staff_on_leave){?>
                                        <tr>
                                            <td><?php echo $sn++; ?></td>
                                            <td style="width:15%; font-size:14px">
                                            <div class = "view_result">
                                                
                                                <a><?php echo "$staff_on_leave[first_name] $staff_on_leave[surname] $staff_on_leave[other_names]"  ?></a>
                                                <div class ="pull-bottom">
                                                    <button data-id="<?php echo $staff_on_leave['leave_id'] ?>" type="button" class = "viewresult btn btn-success btn-edit-leave btn-xs">Edit</button>
                                                    <button data-id="<?php echo $staff_on_leave['leave_id'] ?>" class = "viewresult btn btn-danger btn-delete-leave btn-xs">Delete</button>                     
                                                </div>
                                            </div>
                                            </td>
                                            <td><?php echo "$staff_on_leave[programme] in $staff_on_leave[discipline] at the $staff_on_leave[institution]";?></td>
                                            <td><?php echo $staff_on_leave['start_date'];?></td>
                                            <td><?php echo $staff_on_leave['end_date'];?></td>
                                            <td><?php echo $staff_on_leave['sponsor'];?></td>
                                            <td><?php echo $staff_on_leave['remarks'];?> <strong><?php echo $staff_on_leave['status'] ?></strong></td>
                                            
                                        </tr>
                                        <?php
                                    }
                                }else{ ?>
                                    <tr>
                                        <td colspan="9" class="text-center">No data available</td>
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
    $('#data-table').on('click', '.btn-edit-leave', function () {
        let id = $(this).data('id');
        let type = 'study_leave';
        let operation = 'find';
        $.post('ajax/crud.php', {id: id, type: type, operation: operation}, function(response){
            //alert(response);
            let data = JSON.parse(response);
            //alert(data['result'][0]['email'])
            if(data['message'] == 'success'){
                $('#form_study_leave')[0].reset();
                $('#type').val('study_leave');
                $('#operation').val('u');
                $('#id').val(data['leave_id']);
                $('#personnel_id').val(data['email']);
                $('#full_name').val(data['first_name'] +' '+ data['surname'] +' '+ data['other_names']);
                $('#institution').val(data['institution']);
                $('#programme').val(data['programme']);
                $('#discipline').val(data['discipline']);
                $('#sponsor').val(data['sponsor']);
                $('#start_date').val(data['start_date']);
                $('#end_date').val(data['end_date']);
                $('#remark').val(data['remark']);
                $('#status').val(data['status']);
                $('#personnel_id').prop('disabled', true);
                $('#search_staff').prop('disabled', true);
                $('#modal-leave-title').text('Edit Leave');
                $('#modal-form-st-leave').modal('show');
            }
        });
    }); 

    // Attach click event to dynamically added delete buttons
    $('#data-table').on('click', '.btn-delete-leave', function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#008000',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            customClass: "swal-size-sm"
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $(this).data('id');
                let type = 'study_leave';
                let operation = 'de';
                $.ajax({
                    url: 'ajax/crud.php',
                    type: 'POST',
                    data: {id: id, type: type, operation: operation},
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
    $('#form_study_leave').on('submit', function(event){
        event.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            url: 'ajax/crud.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                //alert(response);
                let data = JSON.parse(response);
                if(data.message == 'success'){
                    Swal.fire({
                        icon:'success',
                        title: data.message,
                        text: data.result.message,
                        customClass: "swal-size-sm",
                        confirmButtonText: 'OK'
                    });
                    location.reload();
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
    $('#new_study_leave').on('click', function(){
        $('#form_study_leave')[0].reset();
        $('#personnel_id').prop('disabled', false);
        $('#search_staff').prop('disabled', false);
        $('#type').val('study_leave');
        $('#operation').val('cr');
        $('#myModalLongTitle').text('New Study Leave');
        $('#modal-form-st-leave').modal('show');
    });
    $('#search_staff').on('click', function(){
        let id = $('#personnel_id').val();
        if(id.length > 0){
            let type = 'personnel';
            let operation = 'find';
            $.post('ajax/crud.php', {personnel_id: id, type: type, operation: operation}, function(response){
                let data = JSON.parse(response);
                if(data['message'] == 'success'){
                    $('#id').val(data[0]['personnel_id']);
                    $('#full_name').val(data[0]['first_name'] + " " + data[0]['surname'] + " " + data[0]['other_names']);
                    //$('#faculty').val(data[0]['faculty']);
                    //$('#department').val(data[0]['department']);
                }else{
                    alert('Staff not found');
                }
            });
        }else{
            alert('Please enter a staff ID or Email');
        }
    });
});

</script>