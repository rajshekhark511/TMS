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
                            <form role="form" method="post" action="" name="addEvent" id="addEvent" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><?php echo ($post_type=='event') ? 'Event Title' : 'News Title'; ?></label>
                                            <input type="text" class="form-control" name="post_title" id="post_title" value="<?php echo set_value('post_title',(isset($event['post_title']) ? $event['post_title'] : '')); ?>">
                                            <?php echo form_error('post_title', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><?php echo ($post_type=='event') ? 'Event Description' : 'News Description'; ?></label>
                                            <textarea class="form-control" name="post_content" id="post_content"><?php echo set_value('post_content',(isset($event['post_content']) ? $event['post_content'] : '')); ?></textarea>
                                            <?php echo form_error('post_content', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if($post_type=='event'){ ?>
                                <div class="row">                                    
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                    <label>Start Date</label>
                                                    <div class="input-group date" id="datetimepicker1">
                                                        <input  type="text" class="form-control" name="post_start_date" id="post_start_date" value="<?php echo set_value('post_start_date', (isset($event['post_start_date']) ? $event['post_start_date'] : '')); ?>" readonly="readonly">
                                                        <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
                                                        <?php echo form_error('post_start_date', '<div class="text-danger">', '</div>'); ?>
                                                    </div>                                            
                                                </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>End Date</label>
                                                <div class="input-group date" id="datetimepicker2">
                                                        <input  type="text" class="form-control" name="post_end_date" id="post_end_date" value="<?php echo set_value('post_end_date', (isset($event['post_end_date']) ? $event['post_end_date'] : '')); ?>" readonly="readonly">
                                                        <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
                                                        <?php echo form_error('post_end_date', '<div class="text-danger">', '</div>'); ?>
                                                    </div>                                                                                                
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="row">                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <?php echo form_dropdown('post_status', array('1' => 'Publish', '0' => 'Pending Review'), (isset($branch['post_status']) ? $branch['post_status'] : '1'), 'id=post_status class=form-control'); ?>
                                            <?php echo form_error('post_status', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row text-center">
                                    <input type="hidden" name="post_id" id="post_id" value="<?php echo (isset($event['post_id']) ? $event['post_id'] : '0'); ?>"/>
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