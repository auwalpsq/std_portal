		<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLongTitle">Edit Training</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit_training" class="form-horizontal" method="POST" >
                    <input id="type" type="hidden" name="type" />
                    <input id="operation" type="hidden" name="operation"/>
                    <input id="id" type="hidden" name="id">
                    <div>

                        <!-- begin wizard step-1 -->
                        <div class="wizard-step-1">
                                <div class="alert alert-warning fade in m-b-15">
                                    <strong>Warning!</strong>
                                    You are about to edit a Training. Please ensure that all required information is entered correctly before proceeding.
                                    <span class="close" data-dismiss="alert">×</span>
                                    </div>
                            <fieldset>
                                
                                    
                                    

                                    <div style="margin-top: 30px;" class="form-group">
                                        
                            <label class="col-md-3 control-label">Training Name:<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" id="training_name" name="training_name" class="form-control input-lg" placeholder="Training Name" required />
                            </div>
                        </div>

                            <div class="form-group">
                            <label class="col-md-3 control-label">Location:</label>
                            <div class="col-md-8">
                                <input type="text" id="training_location" name="training_location" class="form-control input-lg" placeholder="Location" required />
                            </div>
                        </div>
                                
                            <div class="form-group">
                            <label class="col-md-3 control-label">Host</label>
                            <div class="col-md-8">
                                    <div>
                                <select id="training_host" class="form-control input-lg" name="training_host"  required>
                                    <option value="" disabled selected>--select--</option>
                                    <?php
                                        $tableName = 'traininghost';
                                        $data = array('id'=>'all', 'limit'=>'');

                                        $response = $gateway->genericFind($tableName, $data);
                                        if($response['message'] === 'success'){
                                            $results = $response['result'];
                                            foreach($results as $result){
                                                echo "<option value=\"{$result['cthostid']}\">{$result['vthostname']}</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            </div>
                        </div>
                            <div class="form-group">
                            <label class="col-md-3 control-label">Sponsorship</label>
                            <div class="col-md-8">
                                    <div>
                                <select id="training_sponsor" class="form-control input-lg" name="training_sponsor"  required>
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
                        </div>
                            <div class="form-group">
                            <label class="col-md-3 control-label">Training Type</label>
                            <div class="col-md-8">
                                <select id="training_type" class="form-control input-lg" name="training_type"  required>
                                    <option value="" disabled selected>--select--</option>
                                    <?php
                                        $tableName = 'trainingtype';
                                        $data = array('id'=>'all', 'limit'=>'');

                                        $response = $gateway->genericFind($tableName, $data);
                                        if($response['message'] === 'success'){
                                            $results = $response['result'];
                                            foreach($results as $result){
                                                echo "<option value=\"{$result['cttypeid']}\">{$result['vttypename']}</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            </div>
                        </div>

                            <div class="form-group">
                            <label class="col-md-3 control-label">Start Date:</label>
                            <div class="col-md-8">
                                <input id="start_date" type="date" name="start_date" class="form-control input-lg" placeholder="Location" required />
                            </div>
                        </div>

                            <div class="form-group">
                            <label class="col-md-3 control-label">End Date:</label>
                            <div class="col-md-8">
                                <input id="end_date" type="date" name="end_date" class="form-control input-lg" placeholder="Location" required />
                            </div>
                        </div>

                            </fieldset>

                            
                        </div>
                        <!-- end wizard -->
                            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-success" />
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
        <h1 class="page-header">Training List <small>header small text goes here...</small></h1>
        <!-- end page-header -->
        
        <!-- begin row -->
        <div class="row">
            <!-- begin col-10 -->
            <div class="col-md-12">
                <!-- begin panel -->
                <div class="panel panel-inverse" >
                    <div class="panel-heading" style="background-color: #008000;">
                       
                        <h4 class="panel-title">Training List</h4>
                    </div>
                   
                    <!-- <div class="alert alert-info fade in">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Select adds item selection capabilities to a DataTable. Items can be rows, columns or cells, which can be selected independently, or together. Item selection can be particularly useful in interactive tables where users can perform some action on the table, such as editing rows or marking items to perform an action on.
                    </div> -->
                    
                   
                    <div class="panel-body">
                         
                    <row>                      
                    <div class=" pull-right" > <a href="add_tr" class="btn btn-success btn-sm "><i class="fa fa-plus m-r-5"></i>Create New Training</a></div>
                    </row>

                        <br><br><br>
                       <div class = "responsive">
                         <table id="data-table" class="table table-striped table-bordered" width="100%">
                                

                        
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Training Name</th>
                                    <th>Host</th>
                                    <th>Location</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $tableName = 'trainingregister';
                                    $data = array('id'=>'all', 'limit'=>'');

                                    $trainings = $gateway->genericFind($tableName, $data);
                                    foreach($trainings['result'] as $training){
                                        ?>
                                        <tr>
                                            <td><?php echo $training['ctcode'];?></td>
                                            <td style="font-size:14px">
                                            <div class = "view_result">
                                                <a><?php echo $training['vtname'];?></a>
                                            <div class ="pull-bottom">
                                                <button data-id="<?php echo $training['ctcode'] ?>" type="button" class = "viewresult btn btn-success edit-btn btn-xs">Edit</button>

                                                <button data-id="<?php echo $training['ctcode'] ?>" class = "viewresult btn btn-danger delete-btn btn-xs"  >Delete</button>

                                                <button data-id="<?php echo $training['ctcode'] ?>" class = "viewresult btn btn-primary btn-xs" >Beneficiaries</button>
                                            </div>
                                            </div>
                                            </td>
                                            
                                            <td><?php echo $training['cthostid'];?></td>
                                            <td><?php echo $training['vtlocation'];?></td>
                                            <td><?php echo $training['dedc'];?></td>
                                            <td><?php echo $training['deed'];?></td>
                                            
                                        </tr>
                                        <?php
                                    }
                                ?>
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
    $('#data-table').on('click', '.edit-btn', function () {
        let id = $(this).data('id');
        let type = 'register_training';
        let operation = 'find';
        $.post('ajax/crud.php', {id: id, type: type, operation: operation}, function(response){
            //alert(response);
            let data = JSON.parse(response);
            if(data['message'] == 'success'){
                $('#type').val('register_training');
                $('#operation').val('u');
                $('#id').val(data[0]['id']);
                $('#training_name').val(data[0]['training_name']);
                $('#training_host').val(data[0]['training_host']);
                $('#training_location').val(data[0]['training_location']);
                $('#training_sponsor').val(data[0]['training_sponsor']);
                $('#training_type').val(data[0]['training_type']);
                $('#start_date').val(data[0]['training_start_date']);
                $('#end_date').val(data[0]['training_end_date']);
                $('#myModal').modal('show');
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
                let id = $(this).data('id');
                let type = 'register_training';
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
    $('#edit_training').on('submit', function(event){
        event.preventDefault();
        alert('Hello');
        // let formData = new FormData(this);

        // $.ajax({
        //     url: 'ajax/crud.php',
        //     type: 'POST',
        //     data: formData,
        //     contentType: false,
        //     processData: false,
        //     success: function(response){
        //         alert(response);
        //     }
        // });
    });
});

</script>