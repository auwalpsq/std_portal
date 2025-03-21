<?php
	$leave_data = array('phd' =>'PhD', 'phdCount' => 0, 'masters' => 'Masters', 'mastersCount' => 0, 'undergraduate' => 'First Degree', 'undergraduateCount' => 0);
	if($study_leave_count['message'] == 'success'){
		foreach($study_leave_count['result'] as $leave_count){
			$leave_programme = $leave_count['programme'];
			switch($leave_programme){
				case $leave_data['phd']:
					$leave_data['phdCount'] = $leave_count['counter'];
					break;
				case $leave_data['masters']:
					$leave_data['mastersCount'] = $leave_count['counter'];
					break;
				case $leave_data['undergraduate']:
					$leave_data['undergraduateCount'] = $leave_count['counter'];
					break;
			}
		}
	}
	$array_leave_prog_status = array('phd' => 'PhD', 'phdTotal' => 0, 'masters' => 'Masters', 'mastersTotal' => 0, 'undergraduate' => 'First Degree', 'undergraduateTotal' => 0);
	if($result_leave_prog_status['message'] == 'success'){
		foreach($result_leave_prog_status['result'] as $leave_prog_status){
			$programme = $leave_prog_status['programme'];
			$status = $leave_prog_status['status'];
			switch([$programme, $status]){
				case [$array_leave_prog_status['phd'], 'Completed']:
					$array_leave_prog_status['phdTotal'] = $leave_prog_status['total'];
					$leave_phd_percent = ($array_leave_prog_status['phdTotal'] / $leave_data['phdCount']) * 100;
					break;
				case [$array_leave_prog_status['masters'], 'Completed']:
					$array_leave_prog_status['mastersTotal'] = $leave_prog_status['total'];
					$leave_masters_percent = ($array_leave_prog_status['mastersTotal'] / $leave_data['mastersCount']) * 100;
					break;
				case [$array_leave_prog_status['undergraduate'], 'Completed']:
					$array_leave_prog_status['undergraduateTotal'] = $leave_prog_status['total'];
					$leave_undergraduate_percent = ($array_leave_prog_status['undergraduateTotal'] / $leave_data['undergraduateCount']) * 100;
					break;
			}
		}
	}

	$array_leave_status_total = array('onGoing'=>'On Going', 'onGoingTotal'=>0, 'completed'=>'Completed', 'completedTotal'=>0, 'staffIsDeceased' => 'Staff Is Deceased', 'staffIsDeceasedTotal' => 0, 'elapsed' => 'Elapsed', 'elapsedTotal' => 0);
	if($leave_status_total['message'] == 'success'){
		foreach($leave_status_total['result'] as $leave_status_total){
            switch($leave_status_total['status']){
                case $array_leave_status_total['onGoing']:
                    $array_leave_status_total['onGoingTotal'] = $leave_status_total['total'];
                    break;
                case $array_leave_status_total['completed']:
                    $array_leave_status_total['completedTotal'] = $leave_status_total['total'];
                    break;
                case $array_leave_status_total['staffIsDeceased']:
                    $array_leave_status_total['staffIsDeceasedTotal'] = $leave_status_total['total'];
                    break;
                case $array_leave_status_total['elapsed']:
                    $array_leave_status_total['elapsedTotal'] = $leave_status_total['total'];
                    break;
            }
        }
	}
?>
<style>

  .panel-heading, .nav-tabs{
    background: green!important
  }
  .swal-size-sm
{
   width: 650px !important;
   font-size: medium;

}
</style>
<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<!-- <li><a href="javascript:;">Dashboard</a></li> -->
				<li class="active">Dashboard</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Staff Training and Development <small style="color:black">Analytics for staff training...</small></h1>
			<!-- end page-header -->
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-3 -->
			    <div class="col-md-3 col-sm-6">
			        <div class="widget widget-stats bg-green">
			            <div class="stats-icon stats-icon-lg"><i class="fa fa-users"></i></div>
			            <div class="stats-title">TOTAL STAFF ON STUDY LEAVE</div>
			            <div class="stats-number"><?php echo $study_row_count['result'] ?></div>
			            <div class="stats-progress progress">
                            <div class="progress-bar" style="width: <?php echo $leave_percent_completed ?>%"></div>
                        </div>
                        <div class="stats-desc">Completed <?php echo $study_row_count_completed['result'] ?></div>
			        </div>
			    </div>
			    <!-- end col-3 -->
			    <!-- begin col-3 -->
			    <div class="col-md-3 col-sm-6">
			        <div class="widget widget-stats bg-blue">
			            <div class="stats-icon stats-icon-lg"><i class="fa fa-tags fa-fw"></i></div>
			            <div class="stats-title"><?php echo $leave_data['phd'] ?></div>
			            <div class="stats-number"><?php echo $leave_data['phdCount'] ?></div>
			            <div class="stats-progress progress">
                            <div class="progress-bar" style="width: <?php echo $leave_phd_percent ?>%"></div>
                        </div>
                        <div class="stats-desc"><?php echo "Completed $array_leave_prog_status[phdTotal]" ?></div>
			        </div>
			    </div>
			    <!-- end col-3 -->
			    <!-- begin col-3 -->
			    <div class="col-md-3 col-sm-6">
			        <div class="widget widget-stats bg-purple">
			            <div class="stats-icon stats-icon-lg"><i class="fa fa-shopping-cart fa-fw"></i></div>
			            <div class="stats-title"><?php echo $leave_data['masters'] ?></div>
			            <div class="stats-number"><?php echo $leave_data['mastersCount'] ?></div>
			            <div class="stats-progress progress">
                            <div class="progress-bar" style="width: <?php echo $leave_masters_percent ?>%"></div>
                        </div>
                        <div class="stats-desc"><?php echo "Completed $array_leave_prog_status[mastersTotal]" ?></div>
			        </div>
			    </div>
			    <!-- end col-3 -->
			    <!-- begin col-3 -->
			    <div class="col-md-3 col-sm-6">
			        <div class="widget widget-stats bg-aqua">
			            <div class="stats-icon stats-icon-lg"><i class="fa fa-comments fa-fw"></i></div>
			            <div class="stats-title"><?php echo $leave_data['undergraduate'] ?></div>
			            <div class="stats-number"><?php echo $leave_data['undergraduateCount'] ?></div>
			            <div class="stats-progress progress">
                            <div class="progress-bar" style="width: <?php echo $leave_undergraduate_percent ?>%"></div>
                        </div>
                        <div class="stats-desc"><?php echo "Completed $array_leave_prog_status[undergraduateTotal]" ?></div>
			        </div>
			    </div>
			    <!-- end col-3 -->
			</div>
			<!-- end row -->
			
			<!-- begin row -->
			<div class="row">
			    <div class="col-md-6">
					<canvas id="myChart"></canvas>
			        <!-- <div class="widget-chart with-sidebar bg-black">
			            <div class="widget-chart-content">
			                <h4 class="chart-title">
			                    Training Analytics
			                    <small>Where do our visi]tors come from</small>
			                </h4>
			                <div id="visitors-line-chart" class="morris-inverse" style="height: 260px;"></div>
			            </div>
			            <div class="widget-chart-sidebar bg-black-darker">
			                <div class="chart-number">
			                    1000
			                    <small>Staff Trained</small>
			                </div>
			                <div id="visitors-donut-chart" style="height: 160px"></div>
			                <ul class="chart-legend">
			                    <li><i class="fa fa-circle-o fa-fw text-success m-r-5"></i> 34.0% <span>Female Staff</span></li>
			                    <li><i class="fa fa-circle-o fa-fw text-primary m-r-5"></i> 56.0% <span>Male Staff</span></li>
			                </ul>
			            </div>
			        </div> -->
			    </div>
  					
			</div>
			<!-- end row -->
			<!-- begin row -->
			<div class="row">
			   
			    <!-- begin col-4 -->
			    <div class="col-md-6">
			        <!-- begin panel -->
			        <div class="panel panel-inverse" data-sortable-id="index-3">
			            <div class="panel-heading">
			                <h4 class="panel-title">Training Schedule</h4>
			            </div>
			            <div id="schedule-calendar" class="bootstrap-calendar"></div>
			            <div class="list-group">
                            <a href="#" class="list-group-item text-ellipsis">
                                <span class="badge badge-success">9:00 am</span> Meeting with Software Development Unit
                            </a> 
                            <a href="#" class="list-group-item text-ellipsis">
                                <span class="badge badge-primary">2:45 pm</span> Meeting with ICT
                            </a>
                        </div>
			        </div>
			        <!-- end panel -->
			    </div>
			    <!-- end col-4 -->
			    <!-- begin col-4 -->
			    <div class="col-md-6">
			        <!-- begin panel -->
			        <div class="panel panel-inverse" data-sortable-id="index-4">
			            <div class="panel-heading bg-green">
			                <h4 class="panel-title">Newly Trained Staff <span class="pull-right label label-success">24 new users</span></h4>
			            </div>
                        <ul class="registered-users-list clearfix">
                            <li>
                                <a href="javascript:;"><img src="assets/img/user-5.jpg" alt="" /></a>
                                <h4 class="username text-ellipsis">
                                    Savory Posh
                                    <small>Algerian</small>
                                </h4>
                            </li>
                            <li>
                                <a href="javascript:;"><img src="assets/img/user-3.jpg" alt="" /></a>
                                <h4 class="username text-ellipsis">
                                    Ancient Caviar
                                    <small>Korean</small>
                                </h4>
                            </li>
                            <li>
                                <a href="javascript:;"><img src="assets/img/user-1.jpg" alt="" /></a>
                                <h4 class="username text-ellipsis">
                                    Marble Lungs
                                    <small>Indian</small>
                                </h4>
                            </li>
                            <li>
                                <a href="javascript:;"><img src="assets/img/user-8.jpg" alt="" /></a>
                                <h4 class="username text-ellipsis">
                                    Blank Bloke
                                    <small>Japanese</small>
                                </h4>
                            </li>
                            <li>
                                <a href="javascript:;"><img src="assets/img/user-2.jpg" alt="" /></a>
                                <h4 class="username text-ellipsis">
                                    Hip Sculling
                                    <small>Cuban</small>
                                </h4>
                            </li>
                            <li>
                                <a href="javascript:;"><img src="assets/img/user-6.jpg" alt="" /></a>
                                <h4 class="username text-ellipsis">
                                    Flat Moon
                                    <small>Nepalese</small>
                                </h4>
                            </li>
                            <li>
                                <a href="javascript:;"><img src="assets/img/user-4.jpg" alt="" /></a>
                                <h4 class="username text-ellipsis">
                                    Packed Puffs
                                    <small>Malaysian></small>
                                </h4>
                            </li>
                            <li>
                                <a href="javascript:;"><img src="assets/img/user-9.jpg" alt="" /></a>
                                <h4 class="username text-ellipsis">
                                    Clay Hike
                                    <small>Swedish</small>
                                </h4>
                            </li>
                        </ul>
			            <div class="panel-footer text-center">
			                <a href="javascript:;" class="text-inverse">View All</a>
			            </div>
			        </div>
			        <!-- end panel -->
			    </div>
			    <!-- end col-4 -->
			</div>
			<!-- end row -->
		</div>
		<!-- end #content -->				 
