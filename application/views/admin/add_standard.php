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
                            <form role="form" method="post" action="" name="frmStandard" id="frmStandard" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Branch Name</label>
                                            <?php echo form_dropdown('br_id', $branches, (isset($standard['br_id']) ? $standard['br_id'] : ''),'id=br_id class=form-control'); ?>
                                            <?php echo form_error('br_id', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Standard</label>
                                            <input  type="text" class="form-control" name="std_name" id="std_name" value="<?php echo set_value('std_name',(isset($standard['std_name']) ? $standard['std_name'] : '')); ?>">
                                            <?php echo form_error('std_name', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>                                
                                    <div class="row">                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <?php echo form_dropdown('std_status', array('1'=>'Active','0'=>'Inactive'), (isset($standard['std_status']) ? $standard['std_status'] : '1'),'id=std_status class=form-control'); ?>
                                                <?php echo form_error('std_status', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    </div>
                                <div class="row text-center">
                                    <input type="hidden" name="std_id" id="std_id" value="<?php echo (isset($standard['std_id']) ? $standard['std_id'] : '0'); ?>"/>
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