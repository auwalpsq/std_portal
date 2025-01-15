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
#footer{
  position: fixed;
  bottom: 0;
  width: 100%;
  z-index: 99;
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
    margin: 10px 0;
    float: right;
    padding: 5px 20px 5px 10px!important;
    color: #fff;
    background: #008f00!important;

    -webkit-border-radius: 20px 0 0 20px;
    -moz-border-radius: 20px 0 0 20px;
    border-radius: 20px 0 0 20px;
    
}
 .page-sidebar-minified .sidebar .nav-header, .page-sidebar-minified .sidebar .nav-profile, .page-sidebar-minified .sidebar .nav>li>a>span {
    display: none;
    background: #008f00;
    color: #ffffff!important;
    
}
.page-sidebar-minified>li>a:focus, .page-sidebar-minified>li>a:hover {
    background: #008f00;
    color: #ffffff!important;
} 
.sidebar.btn.btn-success {
    color: #fff;
    background: #008f00!important;
    border-color: #008f00!important;
}
</style>
<!-- begin #sidebar -->

		<div id="sidebar" class="sidebar" style="font-size:16px;color:white">
			<!-- begin sidebar scrollbar -->
		<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav" >
					<li class="nav-profile" >
						<div class="image " style="margin-top:30px">
							<a href="javascript:;"><img src="assets/img/user.png" alt="" /></a>
						</div>
						<div class="info" style="margin-top:30px" >
						<div style="font-size: 1em; "><?php // echo $_SESSION['name']; ?></div>	
							<small class="text-white" style="margin-left:50px"><?php // echo $_SESSION['id']; ?></small>
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav" >
					<li class="nav-header" style="font-size:16px;color:white">Navigation</li>

				 <li>
            <a href="dash">         
                <i class="fa fa-desktop"></i>
                <span>dash</span>
            </a>
        </li>

          <li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-align-left"></i> 
						            Training
						        </a>
								<ul class="sub-menu">
                   <li><a href="training_list">Training List</a></li>
                   <li><a href="add_host">Add Host</a></li>
               <li><a href="add_spn">Add Sponsor</a></li>
								</ul>
							</li>
	
			
         

            <li>
            <a href="stf_info">         
                <i class="fa fa-user-o"></i>
                <span>staff info</span>
            </a>
        </li>
            
            <li>
            <a href="add_usr">         
                <i class="fa fa-user-o"></i>
                <span>Add User</span>
            </a>
        </li>
            

          

          <li class="nav-profile" id="footer" style="max-height:50px">
          <div class="info" style="font-size:14px;margin-top:-5px">
            Logout
            <!-- <small class="text-white">Front end developer</small> -->
            <div class="pull-right">
              <a href="./logout" class="btn btn-icon"><i class="fa fa-2x fa-sign-out" style="color: #ffffffb0!important;margin-top:-5px"></i></a>
            </div>
          </div>
        </li>
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" style="margin-top: 50px;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>			      
        </ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
<div  class="sidebar-bg" style="height:100%!important"></div>

	<!-- end #sidebar -->
  <?php include "footer.php";?>


