<!-- begin #page-container -->
<div id="page-container" class="fade">
        <!-- begin login -->
        <div class="login login-with-news-feed">
        <!-- begin news-feed -->
        <div class="news-feed">
               
                <div class="news-caption" style ="height:99%;width:90%;background:#d9e0e7!important">
                     <div class="et_pb_module et_pb_image et_pb_image_0">
				<span class="et_pb_image_wrap " style="margin-left:0%;">
                <!-- <img decoding="async" class="bg-grey" loading="lazy" src="img/user.png" alt="" title="IMG_9725" height="auto" width="160px" style="margin-top:0px"> -->
				    <img decoding="async" loading="lazy" src="assets/img/logo.png" alt="" title="PASSPORT" height="auto" width="160px" style="margin-top:0px">
				    </span>
			    </div>
               
          <div style="position: fixed;bottom:0;">   
          <div class="text-center" style="position:fixed;top:30%;max-width:30%!important;margin-left: 20%;">
                    <!-- <img decoding="async" class="bg-grey" loading="lazy" src="img/user.png" alt="" title="IMG_9725" height="400px" width="400px" style="margin-top:0px"> -->
              
				</div>                     
			    <h3 class="text-black"><strong>Information:</strong> </h3>
                        <p></p>
                        	<ul class="text-black" style="font-style:justify; color:black; font-size:22px;width:850px;line-height:180%" >
                        	<li>verify your graduate matric number</li>
                        	<!-- <li>Validate your account with verification code sent to your email</li>
                        	<li>Login to your account</li>
                          <li>Select recruitment category (i.e Academic or Non- Academic)</li>
                          <li>Selection the position you're applying for</li>
                        	<li>Fill the application for with your basic information </li>                        	
                        	<li>Fill all your necessary work experience</li>
                          <li>Fill all your Educational Qualification with the relevant attachment</li>
                        	<li>A Soft-Copy of report is forwarded to the email provided</li> -->
                        	
                          </ul>
                          <br>
                          <hr style =" border: 1px solid black;">
                    <!--<h2 class="caption-title"><i class="fa fa-check-square-o"></i> e-Verify</h2>-->
					        <!-- <img src="assets/img/logo.png" alt="" style="margin-top:10px;height:5%;width:5%;margin-left:0px"> -->
                            <!-- <img src="img/user.png" alt="" class="pull-right" style="margin-top:-15px;height:16%;width:16%;margin-right:0px"> -->
                    <p class="text-black" style="font-size:22px">
                        NOUN Alumni Platform...
                        
                    </p>
                    <br>
                    </div>
                </div>
            </div>
        <!-- end news-feed -->
        <!-- begin right-content -->
        <div class="right-content" style="margin-right: 5%;" >
        <div data-scrollbar="true" data-height="100vh; " >
        <div class="login-content" style="background:#7074780f!important;font-size:14px;width:113%;margin-left: -6%;margin-right: 5%;margin-top: 3%;height: 95vh;">
       <br> <br> 
         <h2 class="register-header ">
                <!-- <div class="icon pull-right">
                <i class="fa fa-institution alias fa-3x"></i>
            </div><br> -->
            <span class=""></span>Verify Matric number 
        
                
        </h2>
			<br>




   <div class="search-div">
  <form id="appfrm" method="post" action="check">

    <label class="form-label" for="matric" style="font-size:16px">Matric Number</label>
      <div class="form-group" style="margin-top:-5px; display: flex; align-items: center;">
         <input type="text" name="matric" id="matric" class="form-control input-lg text-black" style="font-size:20px; font-weight:bold; flex-grow: 1;"  placeholder="Matric Number"  oninput="this.value = this.value.toUpperCase();" />

      <button type="submit" name="submit" class="btn btn-success input-lg" style="margin-left: 10px;"> <i class="fa fa-search"></i> Search </button>
    </div>
  </form>
</div>





<form id="appfrm" action="vry" method="POST" enctype="multipart/form-data" >
                        <div class="form-group" style="margin-top:-5px">
                            <input type="hidden" name="matricno" id="matricno" class="form-control input-lg text-black" style="font-size:24px;font-weight:bold;width: 200px;" value="<?php echo $vmatricno; ?>" readonly />
                        </div>

                        <label class="form-label" for="program" style="font-size:16px">Fullname</label>
                        <div class="form-group" style="margin-top:-5px">
                            <input type="text" name="app_name" id="app_name" class="form-control input-lg text-black" style="font-size:20px;font-weight:bold" placeholder="Applicant Name" value="<?php echo $vname; ?>" readonly />
                        </div>

                        <label class="form-label" for="program" style="font-size:16px">Programme</label>
                        <div class="form-group" style="margin-top:-5px">
                            <input type="text" name="program" id="program" class="form-control input-lg text-black" style="font-size:20px;font-weight:bold" placeholder="Programme" value="<?php echo $program; ?>" readonly />
                        </div>

                          <div class="form-group" style="margin-top:5px">
                            <label class="form-label" for="phone" style="font-size:16px">Phone number</label>
                            <div class="input-group">
                                <input type="tel" name="phone" class="form-control input-lg text-black" placeholder="current number" />

                                <label class="input-group-addon" style="font-size:16px"><b>Email:</b></label>
                                <input type="text" id="email" name="email" class="form-control input-lg text-black" placeholder="Current email" />
                            </div>
                        </div>


                        <div id="more">
                            <div class="alert alert-warning fade in text-center" style="font-size:18px;margin-top:20px">
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <p style="text-align: justify;text-justify: inter-word;font-style:italic">
                                    <i>NOTE: <br>You MUST ensure that you're updating the right information to the above-named graduate.</i>
                                </p>
                            </div>

                           

                            <div class="pull-right" style="margin-top: 5px;">
                                <button id="update_btns" type="submit" name="update_student" class="btn btn-success input-lg">Submit</button>
                                <!-- <a id="back" type="submit" href="check" name="back" class="btn btn-primary input-lg">Back</a> -->
                            </div>
                        </div>
                    </form>






  <br>
  <br>
  <br>
  <br>

    <div class="mb-3 text-center">
    <small style="font-size: 1.5em;">Do you already have an account? <a href="login">Login</a></small>
    <div class="loginbox-or">
        <div class="or-line"></div>
    </div>
</div>


        </div>
        </div>
        </div>
        <!-- end right-container -->
        </div>
        <!-- end login -->
        </div>
    </div>
   