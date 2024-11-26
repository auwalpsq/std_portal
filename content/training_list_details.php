		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">Tables</a></li>
				<li><a href="javascript:;">Managed Tables</a></li>
				<li class="active">Select</li>
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
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Training List</h4>
                        </div>
                        <!-- <div class="alert alert-info fade in">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Select adds item selection capabilities to a DataTable. Items can be rows, columns or cells, which can be selected independently, or together. Item selection can be particularly useful in interactive tables where users can perform some action on the table, such as editing rows or marking items to perform an action on.
                        </div> -->
                        
                        <div class="panel-body">
                            <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">

                            <div class=" pull-right"> <a href="add_tr" class="btn btn-primary btn-md "><i class="fa fa-plus m-r-5"></i>Create New Training</a></div>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Training Name</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Action</th>
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
                                                <td><?php echo $training['vtname'];?></td>
                                                <td><?php echo $training['dedc'];?></td>
                                                <td><?php echo $training['deed'];?></td>
                                                <td>
                                                    <button 
                                                        data-type="<?php echo 'training_register' ?>"
                                                        data-operation="<?php echo 'u'; ?>"
                                                        data-id="<?php echo $training['ctcode']; ?>"
                                                        class="btn btn-success btn-md edit-btn training-btn">
                                                        <i class="fa fa-edit m-r-5"> Edit</i>
                                                    </button>
                                                    <button 
                                                        data-type="<?php echo 'training_register' ?>"
                                                        data-operation="<?php echo 'de'; ?>"
                                                        data-id="<?php echo $training['ctcode']; ?>"
                                                        class="btn btn-danger btn-md training-btn delete-btn">
                                                         <i class="fa fa-trash-o m-r-5"> Delete</i>
                                                    </button>
                                                </td>
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
    // Attach click event to dynamically added delete buttons
    // $('#data-table').on('click', '.delete-btn', function () {
    //     alert($(this).val());
    //     //$(this).closest('tr').remove();
    // });
    $(document).on('click', '.training-btn', function () {
        let id =$(this).data('id');
        let type = $(this).data('type');
        let operation = $(this).data('operation');
        //alert(id + type + operation);
       $.ajax({
        url: 'ajax/crud.php',
        type: 'POST',
        data: {id: id, type: type, operation: operation},
        success: function(response){
            if(response.message == 'success'){
                Swal.fire({
                    icon:'success',
                    title: 'Success',
                    text: response.result.message,
                    customClass: "swal-size-sm",
                    timer: 3000,
                });
                $(this).closest('tr').remove();
            }
        }
       });
    });
});


        </script>