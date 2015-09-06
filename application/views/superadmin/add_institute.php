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
                            <form role="form" method="post" action="" name="frmInstitute" id="frmInstitute" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="inst_name" id="inst_name" value="<?php echo set_value('inst_name',(isset($institute['inst_name']) ? $institute['inst_name'] : '')); ?>">
                                            <?php echo form_error('inst_name', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input  type="text" class="form-control" name="inst_email" id="inst_email" value="<?php echo set_value('inst_email',(isset($institute['inst_email']) ? $institute['inst_email'] : '')); ?>">
                                            <?php echo form_error('inst_email', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input  type="text" class="form-control" name="inst_phone" id="inst_phone" value="<?php echo set_value('inst_phone',(isset($institute['inst_phone']) ? $institute['inst_phone'] : '')); ?>" onkeypress="return isNumber(event)">
                                            <?php echo form_error('inst_phone', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Address 1</label>
                                            <input  type="text" class="form-control" name="inst_address1" id="inst_address1" value="<?php echo set_value('inst_address1',(isset($institute['inst_address1']) ? $institute['inst_address1'] : '')); ?>">
                                            <?php echo form_error('inst_address1', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Address2</label>
                                            <input  type="text" class="form-control" name="inst_address2" id="inst_address2" value="<?php echo set_value('inst_address2',(isset($institute['inst_address2']) ? $institute['inst_address2'] : '')); ?>">
                                            <?php echo form_error('inst_address2', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>State </label>
                                            <select class="form-control" name="inst_state" id="inst_state">
                                                <option value="">[--Select--]</option>
                                                <?php foreach ($states as $sKey => $sVal) {
 ?>
                                                    <option value="<?php echo $sVal['state_id']; ?>" <?php echo set_select('inst_state'); echo ((isset($institute['inst_state']) && $sVal['state_id']==$institute['inst_state']) ? 'selected' : '')?>><?php echo $sVal['name'] ?></option>
                                                    
                                                <?php }
                                                ?>
                                            </select>
                                            <?php echo form_error('inst_state', '<div class="text-danger">', '</div>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>District</label>
                                                <select class="form-control" name="inst_district" id="inst_district">
                                                    <option value="">[--Select--]</option>
                                                <?php
                                                if (!empty($district)) {
                                                    foreach ($district as $dist) {
 ?>
                                                        <option value="<?php echo $dist['d_id']; ?>" <?php echo ((set_select('inst_district',(isset($institute['inst_district']) ? $institute['inst_district'] : '')) == $dist['d_id']) ? $institute['d_id'] : ''); ?> <?php echo set_select('inst_district'); echo ((isset($institute['inst_district']) && $dist['d_id']==$institute['inst_district']) ? 'selected' : '')?>><?php echo $dist['d_name']; ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                </select>
                                                <?php echo form_error('inst_district', '<div class="text-danger">', '</div>'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" name="inst_city" id="inst_city" value="<?php echo set_value('inst_city',(isset($institute['inst_city']) ? $institute['inst_city'] : '')); ?>"/>
                                                <?php echo form_error('inst_city', '<div class="text-danger">', '</div>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Website</label>
                                                <input  type="text" class="form-control" name="inst_website" id="inst_website" value="<?php echo set_value('inst_website',(isset($institute['inst_website']) ? $institute['inst_website'] : '')); ?>">
                                                <?php echo form_error('inst_website', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <?php echo form_dropdown('inst_status', array('1'=>'Active','0'=>'Inactive'), (isset($institute['inst_status']) ? $institute['inst_status'] : '1'),'id=inst_status class=form-control'); ?>
                                                <?php echo form_error('inst_status', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Logo</label>
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
                                                        <input  type="file" name="inst_logo" id="inst_logo">
                                                        <input  type="hidden" name="inst_hidden_image" id="inst_hidden_image" value="<?php echo (isset($institute['inst_logo']) ? $institute['inst_logo'] : ''); ?>">
                                                    </span>
                                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="row text-center">
                                    <input type="hidden" name="inst_id" id="inst_id" value="<?php echo (isset($institute['inst_id']) ? $institute['inst_id'] : ''); ?>"/>
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

