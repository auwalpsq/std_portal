<style media="screen">
.sidebar {
  /* background-color: green!important; */
  background-color: #030b037d!important;
  position: fixed;
}
.sub-menu{
  background-color: green!important;

}
.sidebar-bg{
  background-color: #030b037d!important; //green!important;
}
.nav-profile{
  background-color: #90ee9033!important;
}
#footer {
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
    background: #008f00!important;
    color: #ffffff!important;
}
.sidebar-bg{
  min-height: 100%;
  /* position:relative; */
}
#sidebar{
  padding-bottom: 100px;    /* height of footer */
}
.sidebar-minify-btn.focus, .sidebar-minify-btn.hover{
  background: #008f00!important;
  color: #ffffff!important;
}
.sidebar-minify-btn {
    margin: 10px 0;
    float: right;
    padding: 5px 20px 5px 10px!important;
    color: #fff;
    background: #008f00!important;

   -webkit-border-radius: 20px 0 0 20px;
    -moz-border-radius: 20px 0 0 20px;
    border-radius: 20px 0 0 20px; */
}

.sidebar ul li a {
    background: #008f001c!important;
    color: #ffffff69!important;
}
.page-sidebar-minified .sidebar {
    margin-top: 36px;
    width: 60px;
    position: absolute;
}
</style>
<!-- begin #sidebar -->

		<div id="sidebar" class="sidebar" style="font-size:16px;color:white">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<div class="image" style="margin-top:25px">
							<a href="javascript:;"><img src="assets/img/user.png" alt="" /></a>
						</div>
						<div class="info" style="margin-top:30px">
							<?php echo $_SESSION['name']; ?>
							<!--<small class="text-white">ICT Administrator</small>-->
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<img src="img/sbar.png" alt="" style="margin-top:15px;height:80%">


				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
      <ul class="nav ">
        <li class="has-sub" style="margin-top:20px">
          <a class="btn hidelink" href="reset_pwd"  >
              <i class="fa fa-key"></i>
              <span>Change Password</span>
          </a>
        </li>
        <li class="nav-profile" id="footer" style="max-height:35px">
          <!-- <div class="image">
            <a href="javascript:;"><img src="assets/img/user.png" alt="" /></a>
          </div> -->
          <div class="info" style="font-size:14px;margin-top:-5px">
            Logout
            <!-- <small class="text-white">Front end developer</small> -->
            <div class="pull-right">
              <a href="./" class="btn btn-icon"><i class="fa fa-2x fa-sign-out" style="color: #ffffffb0!important;margin-top:-15px"></i></a>
            </div>
          </div>
        </li>
      </ul>
		</div>
<div class="sidebar-bg" style="height:100%!important"></div>
