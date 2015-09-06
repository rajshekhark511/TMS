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
                            <form role="form" method="post" action="" name="frmBranch" id="frmBranch" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="br_name" id="br_name" value="<?php echo set_value('br_name',(isset($branch['br_name']) ? $branch['br_name'] : '')); ?>">
                                            <?php echo form_error('br_name', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input  type="text" class="form-control" name="br_phone" id="br_phone" onkeypress="return isNumber(event)" value="<?php echo set_value('br_phone',(isset($branch['br_phone']) ? $branch['br_phone'] : '')); ?>">
                                            <?php echo form_error('br_phone', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Address 1</label>
                                            <input  type="text" class="form-control" name="br_address_1" id="br_address_1" value="<?php echo set_value('br_address_1',(isset($branch['br_address_1']) ? $branch['br_address_1'] : '')); ?>">
                                            <?php echo form_error('br_address_1', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Address2</label>
                                            <input  type="text" class="form-control" name="br_address_2" id="br_address_2" value="<?php echo set_value('br_address_2',(isset($branch['br_address_2']) ? $branch['br_address_2'] : '')); ?>">
                                            <?php echo form_error('br_address_2', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>State </label>
                                            <select class="form-control" name="br_state" id="br_state">
                                                <option value="">[--Select--]</option>
                                                <?php foreach ($states as $sKey => $sVal) { ?>
                                                    <option value="<?php echo $sVal['state_id']; ?>" <?php echo set_select('br_state'); echo ((isset($branch['br_state']) && $sVal['state_id']==$branch['br_state']) ? 'selected' : '')?>><?php echo $sVal['name'] ?></option>

                                                <?php }
                                                ?>
                                            </select>
                                            <?php echo form_error('br_state', '<div class="text-danger">', '</div>'); ?>
                                            </div>
                                        </div>
                                    <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>District</label>
                                                <select class="form-control" name="br_district" id="br_district">
                                                    <option value="">[--Select--]</option>
                                                <?php
                                                if (!empty($district)) {
                                                    foreach ($district as $dist) { ?>
                                                        <option value="<?php echo $dist['d_id']; ?>" <?php echo ((set_select('br_district',(isset($branch['br_district']) ? $branch['br_district'] : '')) == $dist['d_id']) ? $branch['br_district'] : ''); ?> <?php echo set_select('br_district'); echo ((isset($branch['br_district']) && $dist['d_id']==$branch['br_district']) ? 'selected' : '')?>><?php echo $dist['d_name']; ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                </select>
                                                <?php echo form_error('br_district', '<div class="text-danger">', '</div>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" name="br_city" id="br_city" value="<?php echo set_value('br_city',(isset($branch['br_city']) ? $branch['br_city'] : '')); ?>"/>
                                                <?php echo form_error('br_city', '<div class="text-danger">', '</div>'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <?php echo form_dropdown('br_status', array('1'=>'Active','0'=>'Inactive'), (isset($branch['br_status']) ? $branch['br_status'] : '1'),'id=br_status class=form-control'); ?>
                                                <?php echo form_error('br_status', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    </div>                                    
                                <div class="row text-center">
                                    <input type="hidden" name="br_id" id="br_id" value="<?php echo (isset($branch['br_id']) ? $branch['br_id'] : '0'); ?>"/>
                                    <button class="btn btn-default custom-btn" type="submit" id="btn-add-branch">Submit</button>
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