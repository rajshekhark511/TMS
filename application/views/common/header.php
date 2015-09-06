<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>TMS</title>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css');?>">
<link rel="stylesheet" href="<?php echo base_url('css/font-awesome.min.css');?>">
<link rel="stylesheet" href="<?php echo base_url('css/main.css');?>">
<link rel="stylesheet" href="<?php echo base_url('css/sl-slide.css');?>">
<link rel="stylesheet" href="<?php echo base_url('css/custom.css');?>">

   



    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>

<header class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a id="logo" class="pull-left" href="index.html"></a>
            <div class="nav-collapse collapse pull-right">
                <!--<ul class="nav">
                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="about-us.html">About Us</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="portfolio.html">Portfolio</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="career.html">Career</a></li>
                            <li><a href="blog-item.html">Blog Single</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="pricing.html">Pricing</a></li>
                            <li><a href="404.html">404</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="registration.html">Registration</a></li>
                            <li class="divider"></li>
                            <li><a href="privacy.html">Privacy Policy</a></li>
                            <li><a href="terms.html">Terms of Use</a></li>
                        </ul>
                    </li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact-us.html">Contact</a></li>
                    <li class="login">
                        <a data-toggle="modal" href="#loginForm"><i class="icon-lock"></i></a>
                    </li>
                </ul>-->
                <?php echo validation_errors(); ?>
                <?php echo form_open('home/authenticate',array('id'=>'frmSignIn','name'=>'frmSignIn')); ?>
                    <div class="span7 clslogin">
                        <div class="span3 clssublogin">
                            <div class="form-group">
                                <input type="email" id="user_email" name="user_email" class="form-control clsTxt" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="span3 clssublogin">
                            <div class="form-group">
                                <input type="password"  id="user_password" name="user_password" class="form-control clsTxt" id="exampleInputPassword1" placeholder="Password">
                            </div>
                        </div>
                        <div class="span3 clsbtnlogin">
                            <div class="form-group">
                              <input type="submit" class="btn btn-success btn-large pull-right btn-signin" name="btnSignIn" value="Sign In"/>
                            </div>
                        </div>
                    </div>
                <?php  echo form_close(); ?>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</header>
<!-- /header -->