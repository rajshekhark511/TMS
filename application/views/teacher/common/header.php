<!DOCTYPE HTML>
<html>
    <head>
        <title>TMS</title>
        <!-- Bootstrap -->
        <link href="<?php echo base_url('css/user/bootstrap.min.css'); ?>" rel='stylesheet' type='text/css' />
        <link href="<?php echo base_url('css/user/bootstrap.css'); ?>" rel='stylesheet' type='text/css' />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--[if lt IE 9]>
            <script src="<?php echo base_url('js/html5shiv.js'); ?>"></script>
            <script src="<?php echo base_url('js/respond.js'); ?>"></script>
       <![endif]-->
        <link href="<?php echo base_url('css/user/bootstrap-datetimepicker.css'); ?>" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url('css/user/style.css'); ?>" rel="stylesheet" type="text/css" media="all" />
        
        <!-- Owl Carousel Assets -->
        <link href="<?php echo base_url('css/user/owl.carousel.css'); ?>" rel="stylesheet">
        
        
        <!-- //Owl Carousel Assets -->
        <!----font-Awesome----->
        <link rel="stylesheet" href="<?php echo base_url('css/user/font-awesome.min.css'); ?>">
        <!----font-Awesome----->        
    </head>
    <body>
        <div class="header_bg">
            <div class="container">
                <div class="row header">
                    <div class="logo navbar-left">
                        <h1>
                            <a href="<?php echo site_url("user"); ?>" class="navbar-brand">
                                <img src="<?php echo base_url('images/tms_logo.png'); ?>" alt="">
                            </a>
                        </h1>
                    </div>
                    <div class="h_search navbar-right">
                        <?php echo form_open('common/profile_photo',array('name'=>'frm-prf-photo','id'=>'frm-prf-photo','enctype'=>'multipart/form-data')); ?>
                        <div class="user-link">
                            <img class="media-object img-thumbnail user-img" style="width:80px;height:95px;" title="<?php echo $name; ?>" src="<?php echo  $photo; ?>" id="profile-photo">
                            <input type="file" id="upload-profile-file"  name="upload-profile-file"  onchange="submit_profile_form()"/>
                            <a href="javascript:;" id="upload-profile"><span class="fa fa-pencil edit-profile-image"></span></a>
                        <input type="submit" value="Change" class="btn btn-primary btn-grad" id="btn-change-profile" style="display:none;">
                        </div>
                        <?php echo form_close(); ?>
                        <div class="media-body">
                            <h4 class="media-heading user-name"><?php echo $name; ?></h4>
                            <ul class="list-unstyled user-info">
                                <li> <a href="" style="text-decoration: none;"><?php echo $userrole; ?></a> </li>
                                <?php if($loged_date){ ?>
                                <li>
                                    <a href="<?php echo site_url("home/logout"); ?>" data-toggle="tooltip" data-original-title="Logout" data-placement="bottom" class="btn btn-metis-1 btn-sm">
                                        <i class="fa fa-power-off"></i>&nbsp;Logout
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row h_menu">
                <nav class="navbar navbar-default navbar-left" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.html">Home</a></li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;" aria-expanded="false">Tuition<span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                  <li><a href="<?php echo site_url("user/tution"); ?>">Attendance</a></li>
                                  <li><a href="#">Dashboard</a></li>
                                  <li><a href="#">Home Work</a></li>
                                  <li><a href="#">Schedule</a></li>
                                  <li><a href="<?php echo site_url("user/feedback"); ?>">Query</a></li>
                                </ul>
                            </li>
                            
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;" aria-expanded="false">Social<span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                  <li><a href="#">Groups</a></li>
                                  <li><a href="#">Blogs</a></li>
                                  <li><a href="#">Videos</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" >Extra Activity</a>                                
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;" id="dropdownMenu1">Career Development<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                  <li><a href="#">Career</a></li>
                                  <li><a href="#">Colleges</a></li>
                                  <li><a href="#">Courses</a></li>
                                  <li><a href="#">Educational Videos</a></li>
                                </ul>
                            </li>
                            <li class="last">
                                <a href="#">Profile</a>                                
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                    <!-- start soc_icons -->
                </nav>
                <div class="soc_icons navbar-right">
                    <ul class="list-unstyled text-center">
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>	
                </div>
            </div>
        </div>