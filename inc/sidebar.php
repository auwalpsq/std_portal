<?php
 include "modal/modal_create_user.php";
 ?>
<style media="screen">
.sidebar {
  background-color: green!important;
  position: fixed;
}
.sub-menu{
  background-color: green!important;

}
.sidebar-bg{
  background-color: green!important;
}
.nav-profile{
  background-color: #90ee9033!important;
}
#footer {
  position: fixed;
  bottom: 0;
  width: 100%;
  z-index: 99;
  /* height: 100px;
    width:100%;
    position: static;
    left: 0;
    bottom: 0;
    z-index: 9; */
}
.sidebar .sub-menu>li>a {
    padding: 5px 20px;
    display: block;
    font-weight: 300;
    color: #ffffff!important;
    text-decoration: none;
    position: relative;
}
.sidebar .nav>li.expand>a, .sidebar .nav>li>a:focus, .sidebar .nav>li>a:hover {
    background: #008f00;
    color: #ffffff!important;
}
.sidebar-bg{
  min-height: 100%;
  /* position:relative; */
}
#sidebar{
  padding-bottom: 100px;    /* height of footer */
}
/* .sidebar-minify-btn.focus, .sidebar-minify-btn.hover{
  background: #008f00!important;
  color: #ffffff!important;
} */
.sidebar-minify-btn {
    /* margin: 10px 0;
    float: right;
    padding: 5px 20px 5px 10px!important;
    color: #fff; */
    background: #008f00!important;

    /* -webkit-border-radius: 20px 0 0 20px;
    -moz-border-radius: 20px 0 0 20px;
    border-radius: 20px 0 0 20px; */
}
</style>
<!-- begin #sidebar -->

		<div id="sidebar" class="sidebar" style="font-size:16px;color:white">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav" style="margin-top:15px">
					<li class="nav-profile">
						<div class="image " style="margin-top:5px">
							<a href="javascript:;"><img src="img/nou_logo-nobg.png" alt="" /></a>
						</div>
						<div class="info ">
							<?php echo $_SESSION['name']; ?>
							<small class="text-white">ICT Administrator</small>
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav" >
					<li class="nav-header" style="font-size:16px;color:white">Navigation</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-laptop"></i>
						    <span>Dashboard</span>
					    </a>
						<ul class="sub-menu">
						    <li><a href="#">Main Dashboard</a></li>
						    <li><a href="financial">Dashboard</a></li>
							<li><a href="app_financial">Financial</a></li>
						</ul>
					</li>

					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-suitcase"></i>
						    <span> Request </span>
						</a>
						<ul class="sub-menu">
    					<li><a class = "menu" data-id="P" data-title="New Transcript (Awaiting Payment Verification)" href="#">New Request</a></li>
    					<!-- <li><a class = "menu" data-id="P" data-title="Verified Payment Request (Awaiting Review)" href="#">Verified Request</a></li> -->
                        <li><a class = "menu" data-id="R" data-title="Reviewed (Awaiting Report Generation)" href="#">Reviewed Request</a></li>
                        <li><a class = "menu" data-id="T" data-title="Grenrated Transcript Report (Awaiting Approval)" href="#">Generated Report</a></li>
						<li><a class = "menu" data-id="D" data-title="Approved Transcript Report (Awaiting Dispatch)" href="#">Approved Reports</a></li>
						<li><a class = "menu" data-id="C" data-title="Dispatched Transcript Report" href="#">Treated Request</a></li>
						<li><a  href="request_letters.php">Letters</a></li>
						<li><a href="refund_request">Refund Request</a></li>
						<li><a href="no_names">Invalid Submission</a></li>
                        <li><a class = "menu" data-id="A" href="req_ticket">All Request</a></li>

						</ul>
					</li>
          
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-file-o"></i>
						    <span>Admin</span>
						</a>
						<ul class="sub-menu" style="font-size: 16px!important">
							<li><a href="mgt_courier">Manage Courier</a></li>
							<li><a href="inst_prof">Manage Institutions </a></li>
							<li><a href="usr_mgt">Manage Users</a></li>
							<li><a href="form_validation.html">Service Type</a></li>
						</ul>
					</li>
          			

			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
              <!-- <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-sign-out"></i></a> -->

        </ul>


				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
      <ul class="nav ">
        <li class="nav-profile" id="footer">
          <div class="image">
            <a href="javascript:;"><img src="assets/img/user.png" alt="" /></a>
          </div>
          <div class="info ">
            <?php echo $_SESSION['name']; ?>
            <!-- <small class="text-white">Front end developer</small> -->
            <div class="pull-right">
               <a href="./" class="btn btn-icon"><i class="fa fa-2x fa-sign-out" style="color: #ffffffb0!important;margin-top:-15px"></i></a>
            </div>
          </div>
        </li>
      </ul>
		</div>
<div id="holder" class="sidebar-bg" style="height:100%!important"></div>
