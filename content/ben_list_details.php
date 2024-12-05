		<!-- Modal -->


        <!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">Beneficiary</a></li>
				<li><a href="javascript:;">Beneficiary List</a></li>
			
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"><?php echo $training_name ?> <small>header small text goes here...</small></h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-10 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse" >
                        <div class="panel-heading" style="background-color: #008000;">
                            <!-- <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div> -->
                            <h4 class="panel-title">Beneficiary List</h4>
                        </div>
                        
                        <!-- <div class="alert alert-info fade in">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Select adds item selection capabilities to a DataTable. Items can be rows, columns or cells, which can be selected independently, or together. Item selection can be particularly useful in interactive tables where users can perform some action on the table, such as editing rows or marking items to perform an action on.
                        </div> -->
                        
                        
                        <div class="panel-body">
                            
                            <table id="data-table" class="table table-striped table-bordered" width="100%">
                                 

                           
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Beneficiary Name</th>
                                        <th>Department</th>
                                        <th>Date of Birth</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $tableName = 'vw_beneficiary_list';
                                        $id = $_POST['id'];
                                        $data = array('id'=>$id, 'limit'=>'', 'field_name'=>'ctcode');

                                        $beneficiaries = $gateway->genericFind($tableName, $data);
                                        foreach($beneficiaries['result'] as $beneficiary){
                                           ?>
                                            <tr>
                                                 <td><?php echo $beneficiary['id'];?></td>
                                                <td style="font-size:14px">
                                                    <div class = "view_result">
                                                    <a><?php echo $beneficiary['first_name'] ." ".$beneficiary['surname'] ." ". $beneficiary['other_names'];?></a>
                                                 <div class ="pull-bottom">
                                                    <!-- <button type="button" class = "viewresult btn btn-success btn-xs" data-toggle="modal" data-target="#myModal" >Edit</button> -->

                                                    <button
                                                        data-training_id="<?php echo $beneficiary['ctcode'] ?>"
                                                        data-staff_id="<?php echo $beneficiary['id'] ?>"
                                                        class = "viewresult btn btn-danger remove-btn btn-xs"  >Remove
                                                    </button>
                                                    
                                                </div>
                                                </div>
                                                </td> 
                                                <td><?php echo $beneficiary['department'] ?></td>
                                                <td><?php echo $beneficiary['date_of_birth'] ?></td> 
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
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
    $('#data-table').on('click', '.remove-btn', function () {
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
                let type = 'beneficiary';
                let operation = 'de';
                let staff_id = $(this).data('staff_id');
                let training_id = $(this).data('training_id');

                $.ajax({
                    url: 'ajax/crud.php',
                    type: 'POST',
                    data: {
                        staff_id: staff_id,
                        training_id: training_id,
                        type: type,
                        operation: operation
                    },
                    dataType: 'json',
                    success: function(response){
                        if(response.message == 'success'){
                            Swal.fire({
                                icon: 'success',
                                text: response.result.message,
                                customClass: "swal-size-sm",
                                showConfirmButton: 'OK'  
                            }).then(() => {
                                location.reload();
                            });
                        }
                    }
                })
            }
        });
        
    });
});
</script>