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
			            <div class="stats-title">TOTAL STAFF TRAINED</div>
			            <div class="stats-number">1000</div>
			            <div class="stats-progress progress">
                            <div class="progress-bar" style="width: 70.1%;"></div>
                        </div>
                        <div class="stats-desc">Better than last week (70.1%)</div>
			        </div>
			    </div>
			    <!-- end col-3 -->
			    <!-- begin col-3 -->
			    <div class="col-md-3 col-sm-6">
			        <div class="widget widget-stats bg-blue">
			            <div class="stats-icon stats-icon-lg"><i class="fa fa-tags fa-fw"></i></div>
			            <div class="stats-title">TOTAL TRAINED ACADEMIC</div>
			            <div class="stats-number">500</div>
			            <div class="stats-progress progress">
                            <div class="progress-bar" style="width: 40.5%;"></div>
                        </div>
                        <div class="stats-desc">Better than last week (40.5%)</div>
			        </div>
			    </div>
			    <!-- end col-3 -->
			    <!-- begin col-3 -->
			    <div class="col-md-3 col-sm-6">
			        <div class="widget widget-stats bg-purple">
			            <div class="stats-icon stats-icon-lg"><i class="fa fa-shopping-cart fa-fw"></i></div>
			            <div class="stats-title">TOTAL TRAINED NON-ACADEMIC</div>
			            <div class="stats-number">300</div>
			            <div class="stats-progress progress">
                            <div class="progress-bar" style="width: 76.3%;"></div>
                        </div>
                        <div class="stats-desc">Better than last week (76.3%)</div>
			        </div>
			    </div>
			    <!-- end col-3 -->
			    <!-- begin col-3 -->
			    <div class="col-md-3 col-sm-6">
			        <div class="widget widget-stats bg-aqua">
			            <div class="stats-icon stats-icon-lg"><i class="fa fa-comments fa-fw"></i></div>
			            <div class="stats-title">TOTAL TRAINED TECHNICAL</div>
			            <div class="stats-number">200</div>
			            <div class="stats-progress progress">
                            <div class="progress-bar" style="width: 54.9%;"></div>
                        </div>
                        <div class="stats-desc">Better than last week (54.9%)</div>
			        </div>
			    </div>
			    <!-- end col-3 -->
			</div>
			<!-- end row -->
			
			<!-- begin row -->
			<div class="row">
			    <div class="col-md-12">
			        <div class="widget-chart with-sidebar bg-black">
			            <div class="widget-chart-content">
			                <h4 class="chart-title">
			                    Training Analytics
			                    <small>Where do our visitors come from</small>
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
			        </div>
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
						 
