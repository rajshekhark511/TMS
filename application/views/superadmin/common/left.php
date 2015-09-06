<div id="left">
    <div class="media user-media">
        <?php echo form_open('common/profile_photo',array('name'=>'frm-prf-photo','id'=>'frm-prf-photo','enctype'=>'multipart/form-data')); ?>
        <div class="user-link">
            <img class="media-object img-thumbnail user-img" style="width:80px;height:95px;" title="<?php echo $name; ?>" src="<?php echo  $photo; ?>" id="profile-photo">
            <input type="file" id="upload-profile-file"  name="upload-profile-file"  onchange="submit_profile_form()"/>
            <a href="javascript:;" id="upload-profile"><span class="fa fa-pencil edit-profile-image"></span></a>            
        <input type="submit" value="Change" class="btn btn-primary btn-grad" id="btn-change-profile" style="display:none;">
        </div>
        <?php echo form_close(); ?>
        <div class="media-body">
            <h5 class="media-heading user-name"><?php echo $name; ?></h5>
            <ul class="list-unstyled user-info">
                <li> <a href=""><?php echo $userrole; ?></a> </li>
                <?php if($loged_date){ ?>
                <li>Last Access :
                    <br>
                    <small>
                        <i class="fa fa-calendar"></i>&nbsp;<?php echo $loged_date; ?></small>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <!-- #menu -->
    <ul id="menu" class="collapse">
        <li class="nav-header">Menu</li>
        <li class="nav-divider"></li>
        <li <?php echo (in_array($method_name, array('home'))) ? 'class="active"' : ''; ?>>
            <a href="javascript:;">
                <i class="fa fa-dashboard"></i>
                <span class="link-title">Dashboard</span>
                <span class="fa arrow"></span>
            </a>
            <ul>
                <li class="">
                    <a href="dashboard.html">
                        <i class="fa fa-angle-right"></i>&nbsp;Default Style
                    </a>
                </li>
                <li class="">
                    <a href="alterne.html">
                        <i class="fa fa-angle-right"></i>&nbsp;Alternative Style
                    </a>
                </li>
            </ul>
        </li>
        <li <?php echo (in_array($method_name, array('institute','add_institute'))) ? 'class="active"' : ''; ?>>
            <a href="javascript:;">
                <i class="fa fa-building-o"></i>&nbsp;Institute setup
                <span class="fa arrow"></span>
            </a>
            <ul>
                <li class="">
                    <?php echo anchor('super_admin/institute', '<i class="fa fa-angle-right"></i>&nbsp;Institute</a>', array('title' => 'Institute')); ?>                        
                </li>
            </ul>
        </li>
        <li <?php echo (in_array($method_name, array('user','add_user'))) ? 'class="active"' : ''; ?>>
            <a href="javascript:;">
                <i class="fa fa-group"></i>&nbsp;User Management
                <span class="fa arrow"></span>
            </a>
            <ul>
                <li class="">
                    <?php echo anchor('super_admin/user', '<i class="fa fa-angle-right"></i>&nbsp;User</a>', array('title' => 'User')); ?>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="fa fa-group"></i>&nbsp;Modules Management
                <span class="fa arrow"></span>
            </a>
            <ul>
                <li class="">
                    <?php echo anchor('super_admin/module', '<i class="fa fa-angle-right"></i>&nbsp;Assign Module</a>', array('title' => 'Assign Module')); ?>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;">
                <i class="fa fa-group"></i>&nbsp;Fees Management
                <span class="fa arrow"></span>
            </a>
            <ul>
                <li class="">
                    <?php echo anchor('super_admin/user', '<i class="fa fa-angle-right"></i>&nbsp;User</a>', array('title' => 'User')); ?>
                </li>
            </ul>
        </li>        
        <li <?php echo (in_array($method_name, array('feedback'))) ? 'class="active"' : ''; ?>>
            <?php echo anchor('super_admin/feedback', '<i class="fa fa-pencil"></i>&nbsp;Feedbacks<span class="fa arrow"></span></a>', array('title' => 'Feedbacks')); ?>                       
        </li>
        <!--<li>
            <a href="table.html">
                <i class="fa fa-table"></i>&nbsp; Tables</a>
        </li>
        <li>
            <a href="file.html">
                <i class="fa fa-file"></i>&nbsp;File Manager</a>
        </li>
        <li>
            <a href="typography.html">
                <i class="fa fa-font"></i>&nbsp; Typography</a>
        </li>
        <li>
            <a href="maps.html">
                <i class="fa fa-map-marker"></i>&nbsp;Maps</a>
        </li>
        <li>
            <a href="chart.html">
                <i class="fa fa fa-bar-chart-o"></i>&nbsp;Charts</a>
        </li>
        <li>
            <a href="calendar.html">
                <i class="fa fa-calendar"></i>&nbsp;Calendar</a>
        </li>
        <li>
            <a href="javascript:;">
                <i class="fa fa-exclamation-triangle"></i>&nbsp;Error Pages
                <span class="fa arrow"></span>
            </a>
            <ul>
                <li>
                    <a href="403.html">
                        <i class="fa fa-angle-right"></i>&nbsp;403</a>
                </li>
                <li>
                    <a href="404.html">
                        <i class="fa fa-angle-right"></i>&nbsp;404</a>
                </li>
                <li>
                    <a href="405.html">
                        <i class="fa fa-angle-right"></i>&nbsp;405</a>
                </li>
                <li>
                    <a href="500.html">
                        <i class="fa fa-angle-right"></i>&nbsp;500</a>
                </li>
                <li>
                    <a href="503.html">
                        <i class="fa fa-angle-right"></i>&nbsp;503</a>
                </li>
                <li>
                    <a href="offline.html">
                        <i class="fa fa-angle-right"></i>&nbsp;offline</a>
                </li>
                <li>
                    <a href="countdown.html">
                        <i class="fa fa-angle-right"></i>&nbsp;Under Construction</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="grid.html">
                <i class="fa fa-columns"></i>&nbsp;Grid</a>
        </li>
        <li>
            <a href="blank.html">
                <i class="fa fa-square-o"></i>&nbsp;Blank Page</a>
        </li>
        <li class="nav-divider"></li>
        <li>
            <a href="login.html">
                <i class="fa fa-sign-in"></i>&nbsp;Login Page</a>
        </li>
        <li>
            <a href="javascript:;">Unlimited Level Menu  <span class="fa arrow"></span> </a>
            <ul>
                <li>
                    <a href="javascript:;">Level 1  <span class="fa arrow"></span> </a>
                    <ul>
                        <li> <a href="javascript:;">Level 2</a> </li>
                        <li> <a href="javascript:;">Level 2</a> </li>
                        <li>
                            <a href="javascript:;">Level 2  <span class="fa arrow"></span> </a>
                            <ul>
                                <li> <a href="javascript:;">Level 3</a> </li>
                                <li> <a href="javascript:;">Level 3</a> </li>
                                <li>
                                    <a href="javascript:;">Level 3  <span class="fa arrow"></span> </a>
                                    <ul>
                                        <li> <a href="javascript:;">Level 4</a> </li>
                                        <li> <a href="javascript:;">Level 4</a> </li>
                                        <li>
                                            <a href="javascript:;">Level 4  <span class="fa arrow"></span> </a>
                                            <ul>
                                                <li> <a href="javascript:;">Level 5</a> </li>
                                                <li> <a href="javascript:;">Level 5</a> </li>
                                                <li> <a href="javascript:;">Level 5</a> </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li> <a href="javascript:;">Level 4</a> </li>
                            </ul>
                        </li>
                        <li> <a href="javascript:;">Level 2</a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:;">Level 1</a> </li>
                <li>
                    <a href="javascript:;">Level 1  <span class="fa arrow"></span> </a>
                    <ul>
                        <li> <a href="javascript:;">Level 2</a> </li>
                        <li> <a href="javascript:;">Level 2</a> </li>
                        <li> <a href="javascript:;">Level 2</a> </li>
                    </ul>
                </li>
            </ul>
        </li>-->
    </ul><!-- /#menu -->
</div><!-- /#left -->