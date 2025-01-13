<style>
.container-fluid {
height: 60px!important;
}
h1 {
    display: block;
    font-size: 2em;
    margin-block-start: 0.67em;
    margin-block-end: 0.67em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
    unicode-bidi: isolate;
    color: green;
}
<?php //$fac = $body->get_faculty_by_centre('FC');?>
</style>
<!-- begin #header -->
<div id="header" class="header navbar navbar-default navbar-fixed-top" style="height:60px">
<!-- begin container-fluid -->
<div class="container-fluid">
<!-- begin mobile sidebar expand / collapse button -->
<div class="navbar-header">
<div class="logo_container">
<span class="logo_helper"></span>
<a href="index">
<img src="landing/css_js/Logo-shield-1.png" alt="NOUN" id="logo" data-height-percentage="100" data-actual-width="439" data-actual-height="100">
</a>
</div>
    
    <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <button type="button" class="navbar-toggle p-0 m-r-5" data-toggle="collapse" data-target="#top-navbar">
        <span class="fa-stack fa-lg text-inverse">
            <i class="fa fa-square-o fa-stack-2x m-t-2"></i>
            <i class="fa fa-cog fa-stack-1x"></i>
        </span>
    </button>
</div>
<!-- end mobile sidebar expand / collapse button -->

<!-- begin navbar-collapse -->
<div class="collapse navbar-collapse pull-left" id="top-navbar">

 
    <!-- <ul class="nav navbar-nav">
        <li class="dropdown dropdown-lg">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-th-large fa-fw"></i> Mega Menu <b class="caret"></b></a>
            <div class="dropdown-menu dropdown-menu-lg">
                <div class="row">
            <div class="col-md-4 col-sm-4">
                <h4 class="dropdown-header">Faculties <span class="label label-inverse"> <?php //echo COUNT($fac['fac']);?></span></h4>
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <ul class="nav">
                            <?php
                            // foreach ($fac as $element) {
                            //     foreach ($element as $key => $value) {
                            //         # code...
                            //         $id=enc($value['cfacultyid']);
                            //         $faculty=$value['faculty'];
                            //         $stud=$value['studs'];
                            //         echo "<li><a href=\"fac_sess?id=$id\" class=\"text-ellipsis hidelink\"><i class=\"fa fa-angle-right fa-fw fa-lg text-inverse\"></i> $faculty <span class=\"badge badge-success\">$stud</span> </a></li>";
                            //     }
                            //     # code...
                            // }

                            ?>
                            
                        </ul>
                    </div>
                    <div class="col-md-6 col-xs-6">
                    <h4 class="dropdown-header">Degree Type</h4>
                        <ul class="nav">
                            <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Certificate</a></li>
                            <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Diploma</a></li>
                             <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> First Degree</a></li>
                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Post-Graduate Diploma</a></li>
                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Masters Degree</a></li>
                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Doctorate Degree</a></li>
                        </ul>
                    </div>
                </div>
            </div>
                    <div class="col-md-4 col-sm-4">
                        <h4 class="dropdown-header">Navigation <span class="label label-inverse">11</span></h4>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <ul class="nav">
                                    <li><a href="issued_certificates" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i>Issued Certificates</a></li>
                                    <li><a href="cert_corrections" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Certificate With Name Correction </a></li>
                                    <li><a href="graduants" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Graduant List</a></li>
                                    <li><a href="Clearance" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Clearance List By Faculty</a></li>                                    
                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> First Degree</a></li>
                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Post-Graduate Diploma</a></li>
                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Masters Degree</a></li>
                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Doctorate Degree</a></li>
                                   
                                </ul>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <ul class="nav">
                                    <li class="has-sub " ><a href="" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Refunds Made</a></li>
                                    <li><a href="refund_request" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Refunds Request</a></li>
                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Page with Light Sidebar</a></li>
                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Page with Large Sidebar</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <h4 class="dropdown-header">Paragraph</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis libero purus, fermentum at libero convallis, auctor dignissim mauris. Nunc laoreet pellentesque turpis sodales ornare. Nunc vestibulum nunc lorem, at sodales velit malesuada congue. Nam est tortor, tincidunt sit amet eros vitae, aliquam finibus mauris.
                        </p>
                        <p>
                            Fusce ac ligula laoreet ante dapibus mattis. Nam auctor vulputate aliquam. Suspendisse efficitur, felis sed elementum eleifend, ipsum tellus sodales nisi, ut condimentum nisi sem in nibh. Phasellus suscipit vulputate purus at venenatis. Quisque luctus tincidunt tempor.
                        </p>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-diamond fa-fw"></i> Client
            </a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-database fa-fw"></i> New <b class="caret"></b>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
            </ul>
        </li>
    </ul> -->
</div>
<!-- end navbar-collapse -->

<!-- begin header navigation right -->
<ul class="nav navbar-nav navbar-right">
    <!-- <li>
        <form class="navbar-form full-width">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter keyword" />
                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                
            </div>
        </form>
    </li> -->

    


 
 
 
    <!-- <li class="dropdown">
        <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
            <i class="fa fa-bell-o"></i>
            <span class="label">5</span>
        </a>
        <ul class="dropdown-menu media-list pull-right animated fadeInDown">
            <li class="dropdown-header">Notifications (5)</li>
            <li class="media">
                <a href="javascript:;">
                    <div class="media-left"><i class="fa fa-bug media-object bg-red"></i></div>
                    <div class="media-body">
                        <h6 class="media-heading">Server Error Reports</h6>
                        <div class="text-muted f-s-11">3 minutes ago</div>
                    </div>
                </a>
            </li>
            
           
            <li class="media">
                <a href="javascript:;">
                    <div class="media-left"><i class="fa fa-plus media-object bg-green"></i></div>
                    <div class="media-body">
                        <h6 class="media-heading"> New User Registered</h6>
                        <div class="text-muted f-s-11">1 hour ago</div>
                    </div>
                </a>
            </li>
            <li class="media">
                <a href="javascript:;">
                    <div class="media-left"><i class="fa fa-envelope media-object bg-blue"></i></div>
                    <div class="media-body">
                        <h6 class="media-heading"> New Email From John</h6>
                        <div class="text-muted f-s-11">2 hour ago</div>
                    </div>
                </a>
            </li>
            <li class="dropdown-footer text-center">
                <a href="javascript:;">View more</a>
            </li>
        </ul>
    </li> -->
    <li class="dropdown navbar-user">
        <a href="javascript:;" class="dropdown-toggle"  data-toggle="dropdown">
            <img src="assets/img/svg/Icon_Color.svg" alt="" /> 
            <span class="hidden-xs"><?php // echo $_SESSION['name'];?></span> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu animated fadeInLeft">
            <!-- <li class="arrow"></li>
            <li><a href="javascript:;">Edit Profile</a></li>
            <li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Inbox</a></li> -->
            <!-- <li><a href="javascript:;">Calendar</a></li>
            <li><a href="javascript:;">Setting</a></li>
            <li class="divider"></li> -->
            <li><a href="./logout">Log Out</a></li>
        </ul>
    </li>

<!-- 
     <li>
        <div> 
            <img src="assets/img/svg/Full Logo_Color.svg"  style="height:40px;margin-top:10px; margin-right: 20px;" alt="">
        </div>
    </li> -->
   
    
</ul>
<!-- end header navigation right -->
</div>
<!-- end container-fluid -->
</div>
<!-- end #header -->