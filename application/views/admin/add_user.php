<div id="content">
    <div class="outer">
        <div class="inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box dark">
                        <header>
                            <div class="icons">
                                <i class="fa fa-edit"></i>
                            </div>
                            <h5><?php echo $module_title; ?></h5>

                            <!-- .toolbar -->
                            <div class="toolbar">
                                <ul class="nav">
                                    <li>
                                        <a href="#div-1" data-toggle="collapse" class="minimize-box">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div><!-- /.toolbar -->
                        </header>
                        <div id="div-1" class="accordion-body body in" style="height: auto;">
                            <?php echo $this->session->flashdata('error'); ?>
                            <?php echo $this->session->flashdata('success'); ?>
                            <form role="form" method="post" action="" name="frmAdminUser" id="frmAdminUser" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="user_fname" id="user_fname" value="<?php echo set_value('user_fname',(isset($user['user_fname']) ? $user['user_fname'] : '')); ?>">
                                            <?php echo form_error('user_fname', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div> 
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control" name="user_mname" id="user_mname" value="<?php echo set_value('user_mname',(isset($user['user_mname']) ? $user['user_mname'] : '')); ?>">
                                            <?php echo form_error('user_mname', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="user_lname" id="user_lname" value="<?php echo set_value('user_lname',(isset($user['user_lname']) ? $user['user_lname'] : '')); ?>">
                                            <?php echo form_error('user_lname', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Gender</label><br/>
                                            <input type="radio" name="user_gender" id="user_gender" value="M" <?php echo set_value('user_gender',((isset($user['user_gender']) && $user['user_gender']=='M') ? 'checked' : '')); ?>>&nbspMale&nbsp;&nbsp;
                                            <input type="radio" name="user_gender" id="user_gender" value="F" <?php echo set_value('user_gender',((isset($user['user_gender']) && $user['user_gender']=='F') ? 'checked' : '')); ?>>&nbspFemale
                                            <?php echo form_error('user_gender', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input  type="text" class="form-control" name="user_email" id="user_email" value="<?php echo set_value('user_email',(isset($user['user_email']) ? $user['user_email'] : '')); ?>">
                                            <?php echo form_error('user_email', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input  type="password" class="form-control" name="user_password" id="user_password" value="<?php echo set_value('user_password'); ?>">
                                            <?php echo form_error('user_password', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row"  id="Sub_Form">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Mobile</label>
                                            <input  type="text" class="form-control" name="user_mobile" id="user_mobile" value="<?php echo set_value('user_mobile',(isset($user['user_mobile']) ? $user['user_mobile'] : '')); ?>">
                                            <?php echo form_error('user_mobile', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>User Type</label>
                                            <select class="form-control" name="user_type" id="user_type">
                                                <option value="">[--Select--]</option>
                                                <?php foreach ($roles as $rKey => $rVal) { ?>
                                                    <?php if($rVal['role_id']!=222 && $rVal['role_id']!=111){ ?>
                                                    <option value="<?php echo $rVal['role_id']; ?>" <?php echo ((set_select('user_type',(isset($user['user_type']) ? $user['user_type'] : '')) == $rVal['role_id']) ? $$rVal['role_id'] : ''); ?> <?php echo set_select('user_type'); echo ((isset($user['user_type']) && $rVal['role_id']==$user['user_type']) ? 'selected' : '')?>><?php echo $rVal['role_name'] ?></option>
                                                    <?php }  ?>
                                                <?php }  ?>
                                            </select>
                                            <?php echo form_error('user_type', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    if(isset($user) && !empty($user)){
                                        if(trim($user['user_type'])==555){ 
                                            $this->load->view('admin/teacher_register');
                                        }else if(trim($user['user_type'])==333){ 
                                            $this->load->view('admin/student_register');
                                        }else if(trim($user['user_type'])==444){ 
                                            $this->load->view('admin/parent_register');
                                        }  
                                    }
                                ?>
                                <div class="row">                                   
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="user_status" id="user_status">
                                                <option value="">[--Select--]</option>
                                                <option value="1" <?php echo ((set_select('user_status',(isset($user['user_status']) ? $user['user_status'] : '')) == 1) ? 1 : ''); ?> <?php echo set_select('user_status'); echo ((isset($user['user_status']) && 1==$user['user_status']) ? 'selected' : '')?>>Active</option>
                                                <option value="2" <?php echo ((set_select('user_status',(isset($user['user_status']) ? $user['user_status'] : '')) == 2) ? 2 : ''); ?> <?php echo set_select('user_status'); echo ((isset($user['user_status']) && 2==$user['user_status']) ? 'selected' : '')?>>Inactive</option>
                                            </select>
                                            <?php echo form_error('user_status', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Photo</label>
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                                    <?php if($image){ ?>
                                                    <img src="<?php echo $image; ?>"/>
                                                    <?php } ?>
                                                </div>
                                                <div>
                                                    <span class="btn btn-default btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input  type="file" name="user_photo" id="user_photo">
                                                        <?php if(isset($user) && !empty($user)){ ?>
                                                            <input  type="hidden" name="user_hidden_image" id="user_hidden_image" value="<?php echo (isset($user['user_photo']) ? $user['user_photo'] : ''); ?>">
                                                        <?php } ?>
                                                    </span>
                                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <input  type="hidden" name="user_hidden_id" id="user_hidden_id" value="<?php echo (isset($user['userid']) ? $user['userid'] : ''); ?>">
                                    <button class="btn btn-default custom-btn" type="submit">Submit</button>
                                    <button class="btn btn-default custom-btn" type="reset">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end .inner -->
    </div>
    <!-- end .outer -->
</div>
<!-- end #content -->

