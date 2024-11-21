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
    /* margin: 10px 0;
    float: right;
    padding: 5px 20px 5px 10px!important;
    color: #fff; */
    background: #008f00!important;

    /* -webkit-border-radius: 20px 0 0 20px;
    -moz-border-radius: 20px 0 0 20px;
    border-radius: 20px 0 0 20px; */
}
/* .page-sidebar-minified .sidebar .nav-header, .page-sidebar-minified .sidebar .nav-profile, .page-sidebar-minified .sidebar .nav>li>a>span {
    display: none;
    background: #008f00;
    color: #ffffff!important;
} */
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
				<ul class="nav">
					<li class="nav-profile">
						<div class="image " style="margin-top:30px" >
							<a href="javascript:;"><img src="assets/img/user.png" alt="" /></a>
						</div>
						<div class="info" style="margin-top:30px">
						<div><?php echo $_SESSION['id']; ?></div>	
							<small class="text-white" " ><?php echo $_SESSION['name']; ?></small>
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav" >
					<li class="nav-header" style="font-size:16px;color:white">Navigation</li>
				
                <li>
            <a href="student_info">         
                <i class="fa fa-user-o"></i>
                <span>Profile</span>
            </a>
        </li>
                <li>
            <a href="form">         
                <i class="fa fa-edit"></i>
                <span>form</span>
            </a>
        </li>

          
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>			      
        </ul>


				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
      <ul class="nav">
        <li class="has-sub" style="margin-top:-60px">
         
          <a class="btn " href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false" >
              <i class="fa fa-envelope"></i>
              <span>Change Email Address</span>
          </a>

           <a class="btn " href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false" >
              <i class="fa fa-phone"></i>
              <span>Change Phone Number</span>
          </a>
           <a class="btn " href="chng_pass" >
              <i class="fa fa-key"></i>
              <span>Change Password</span>
          </a>
        </li>
        

        <li class="nav-profile" id="footer" style="max-height:50px">
          <!-- <div class="image">
            <a href="javascript:;"><img src="assets/img/user.png" alt="" /></a>
          </div> -->
          <div class="info" style="font-size:14px;margin-top:-5px">
            Logout
            <!-- <small class="text-white">Front end developer</small> -->
            <div class="pull-right">
              <a href="./logout" class="btn btn-icon"><i class="fa fa-2x fa-sign-out" style="color: #ffffffb0!important;margin-top:-5px"></i></a>
            </div>
          </div>
        </li>
      </ul>
		</div>
<div id="holder" class="sidebar-bg" style="height:100%!important"></div>
