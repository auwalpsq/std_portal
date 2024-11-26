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
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0</td>
                                        <td>Win 95+</td>
                                        <td>4</td>
                                        <td>
                                        <button class="btn btn-danger btn-md delete-btn"> <i class="fa fa-trash-o"></i></button>
                                       </td>
                                    </tr>
                                    <tr class="even gradeC">
                                        <td>Trident</td>
                                        <td>Internet Explorer 5.0</td>
                                        <td>Win 95+</td>
                                        <td>5</td>
                                        <td>
                                        <button class="btn btn-danger btn-md delete-btn"><i class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>
                                    
                                    
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
    $('#data-table').on('click', '.delete-btn', function () {
        // Remove the row containing the clicked button
        $(this).closest('tr').remove();
    });
});


        </script>