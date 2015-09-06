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
        <li <?php echo (in_array($method_name, array('branches','standard','batches','add_standard'))) ? 'class="active"' : ''; ?>>
            <a href="javascript:;">
                <i class="fa fa-leaf"></i>&nbsp;Institute Setup
                <span class="fa arrow"></span>
            </a>
            <ul>
                <li class="">
                    <?php echo anchor('admin/branches', '<i class="fa fa-angle-right"></i>&nbsp;Branches</a>', array('title' => 'Branches')); ?>
                </li>
                <li class="">
                    <?php echo anchor('admin/standard', '<i class="fa fa-angle-right"></i>&nbsp;Standard</a>', array('title' => 'Standard')); ?>
                </li>
                <li class="">
                    <?php echo anchor('admin/batches', '<i class="fa fa-angle-right"></i>&nbsp;Batches</a>', array('title' => 'Batches')); ?>
                </li>
            </ul>
        </li>
        <li <?php echo (in_array($method_name, array('subject','standard_subject','add_subject'))) ? 'class="active"' : ''; ?>>
            <a href="javascript:;">
                <i class="fa fa-book"></i>&nbsp;Subject Management
                <span class="fa arrow"></span>
            </a>
            <ul>
                <li class="">
                    <?php echo anchor('admin/subject', '<i class="fa fa-angle-right"></i>&nbsp;Subject</a>', array('title' => 'Subject')); ?>
                </li>
                <li class="">
                    <?php echo anchor('admin/standard_subject', '<i class="fa fa-angle-right"></i>&nbsp;Assign Subject</a>', array('title' => 'Subject')); ?>
                </li>
            </ul>
        </li>
        <li <?php echo (in_array($method_name, array('add_user','user'))) ? 'class="active"' : ''; ?>>
            <a href="javascript:;">
                <i class="fa fa-group"></i>&nbsp;User Management
                <span class="fa arrow"></span>
            </a>
            <ul>
                <li class="">
                    <?php echo anchor('admin/add_user', '<i class="fa fa-angle-right"></i>&nbsp;Add User</a>', array('title' => 'Add User')); ?>
                </li>
                <li class="">
                    <?php echo anchor('admin/user/555', '<i class="fa fa-angle-right"></i>&nbsp;Teachers</a>', array('title' => 'Teachers')); ?>
                </li>
                <li class="">
                    <?php echo anchor('admin/user/333', '<i class="fa fa-angle-right"></i>&nbsp;Students</a>', array('title' => 'Students')); ?>
                </li>
                <li class="">
                    <?php echo anchor('admin/user/444', '<i class="fa fa-angle-right"></i>&nbsp;Parents</a>', array('title' => 'Parents')); ?>
                </li>
            </ul>
        </li>
        <li <?php echo (in_array($method_name, array('news','events','notification','holiday'))) ? 'class="active"' : ''; ?>>
            <a href="javascript:;">
                <i class="fa fa-play-circle-o"></i>&nbsp;Events/News 
                <span class="fa arrow"></span>
            </a>
            <ul>
                <li class="">
                    <?php echo anchor('admin/events', '<i class="fa fa-angle-right"></i>&nbsp;Events</a>', array('title' => 'Events')); ?>
                </li>
                <li class="">
                    <?php echo anchor('admin/news', '<i class="fa fa-angle-right"></i>&nbsp;News/Notifications</a>', array('title' => 'News/Notifications')); ?>
                </li>                
                <li class="">
                    <?php echo anchor('admin/holidays', '<i class="fa fa-angle-right"></i>&nbsp;Holidays</a>', array('title' => 'Holidays')); ?>
                </li>                
            </ul>
        </li>
    </ul><!-- /#menu -->
</div><!-- /#left -->