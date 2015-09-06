<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo (isset($page_title) ? $page_title : 'TMS'); ?></title>

        <!--Mobile first-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--IE Compatibility modes-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-TileColor" content="#5bc0de">
        <meta name="msapplication-TileImage" content="<?php echo base_url('images/metis-tile.png'); ?>">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url('css/admin/bootstrap.css'); ?>">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url('css/admin/font-awesome.css'); ?>">

        <!-- Metis core stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url('css/admin/main.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('css/admin/theme.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('css/admin/jasny-bootstrap.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('css/admin/DT_bootstrap.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('css/custom.css'); ?>">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

        <!--[if lt IE 9]>
          <script src="<?php echo base_url('js/html5shiv.js'); ?>"></script>
                  <script src="<?php echo base_url('js/respond.js'); ?>"></script>
	    <![endif]-->

        <!--Modernizr 3.0-->
        <script src="<?php echo base_url('js/admin/modernizr-build.min.js'); ?>"></script>
    </head>
    <body>
        <div id="wrap">
            <input type="hidden" name="base_url" id="base_url" value="<?php echo site_url();?>"/>
            <div id="top">

                <!-- .navbar -->
                <nav class="navbar navbar-inverse navbar-static-top">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <header class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="<?php echo site_url("super_admin/institute"); ?>" class="navbar-brand">
                            <img src="<?php echo base_url('images/new_logo.png'); ?>" alt="">
                        </a>
                    </header>
                    <div class="topnav">
                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <a data-placement="bottom" data-original-title="Show / Hide Sidebar" data-toggle="tooltip" class="btn btn-success btn-sm" id="changeSidebarPos">
                                    <i class="fa fa-expand"></i>
                                </a>
                            </div>
                            <div class="btn-group">
                                <a data-placement="bottom" data-original-title="E-mail" data-toggle="tooltip" class="btn btn-default btn-sm">
                                    <i class="fa fa-envelope"></i>
                                    <span class="label label-warning">5</span>
                                </a>
                                <a data-placement="bottom" data-original-title="Messages" href="#" data-toggle="tooltip" class="btn btn-default btn-sm">
                                    <i class="fa fa-comments"></i>
                                    <span class="label label-danger">4</span>
                                </a>
                            </div>
                            <div class="btn-group">
                                <a data-placement="bottom" data-original-title="Document" href="#" data-toggle="tooltip" class="btn btn-default btn-sm">
                                    <i class="fa fa-file"></i>
                                </a>
                                <a data-toggle="modal" data-original-title="Help" data-placement="bottom" class="btn btn-default btn-sm" href="#helpModal">
                                    <i class="fa fa-question"></i>
                                </a>
                            </div>
                            <div class="btn-group">
                                <a href="<?php echo $logout; ?>" data-toggle="tooltip" data-original-title="Logout" data-placement="bottom" class="btn btn-metis-1 btn-sm">
                                    <i class="fa fa-power-off"></i>
                                </a>
                            </div>
                        </div>
                    </div><!-- /.topnav -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">

                        <!-- .nav -->
                        <ul class="nav navbar-nav">
                            <li> <a href="dashboard.html">Dashboard</a> </li>
                            <li> <a href="table.html">Tables</a> </li>
                            <li> <a href="file.html">File Manager</a> </li>
                            <li class='dropdown '>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Form Elements
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li> <a href="form-general.html">General</a> </li>
                                    <li> <a href="form-validation.html">Validation</a> </li>
                                    <li> <a href="form-wysiwyg.html">WYSIWYG</a> </li>
                                    <li> <a href="form-wizard.html">Wizard &amp; File Upload</a> </li>
                                </ul>
                            </li>
                        </ul><!-- /.nav -->
                    </div>
                </nav><!-- /.navbar -->

                <!-- header.head -->
                <header class="head">
                    <div class="search-bar">
                        <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                            <i class="fa fa-expand"></i>
                        </a>
                       <form action="">
                             <div class="input-group">
                              <input type="text" class="form-control" placeholder="search ...">
                              <span class="input-group-btn">
                                <button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
                              </span>
                            </div>
                        </form>
                    </div>

                    <!-- ."main-bar -->
                    <div class="main-bar">
                        <h3>
                            <i class="fa fa-home"></i>TMS</h3>
                    </div><!-- /.main-bar -->
                </header>

                <!-- end header.head -->
            </div><!-- /#top -->