<div id="content">
    <div class="outer">
        <div class="inner">
           <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                      <i class="fa fa-table"></i>
                    </div>
                    <h5><?php echo $module_title; ?></h5>
                  </header>
                  <div id="collapse4" class="body">
                    <div>
                        <?php echo anchor('admin/notification/'.(($post_type=='event') ? 'event' : 'news'), '&nbsp;Add '.(($post_type=='event') ? 'Event' : 'News').'</a>', array('title' => 'Add Event','class'=>'btn btn-primary btn-grad')); ?>
                    </div><br/>
                    <?php echo $this->session->flashdata('success'); ?>
                    <table id="dataTable1" class="table table-bordered table-condensed table-hover table-striped responsive-table">
                      <thead>
                        <tr>
                          <th><input type="checkbox" name="select-all" id="select-all" value="1"/></th>
                          <th><?php echo ($post_type=='event') ? 'Event' : 'News'; ?> title</th>
                          <th>Institute name</th>
                          <th>Date</th>                          
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                        <?php $i=1; 
                        if(!empty($events)){ 
                        foreach($events as $event){?>
                                <tbody id="events<?php echo $event['post_id'];?>">
                                    <tr>
                                        <td><input type="checkbox" name="checkbox[]" id="branch<?php echo $event['post_id'];?>" value="<?php echo $event['post_id'];?>"/></td>
                                        <td><?php echo trim($event['post_title']); ?></td>
                                      <td><?php echo trim($event['inst_name']) ?></td>
                                      <td>
                                        <?php echo date('d M, Y', strtotime($event['post_date'])) ?>
                                      </td>
                                      <td><?php echo (trim($event['post_status'])==1) ? '<span class="text-success">Publish</span>' : '<span class="text-danger">Pending review</span>'; ?></td>
                                      <td>
                                      <?php echo anchor('admin/notification/'.(($post_type=='event') ? 'event' : 'news').'/'.$event['post_id'], '<i class="fa fa-pencil fa-fw"></i>&nbsp;</a>', array('title' => 'Event')); ?>
                                      <?php echo anchor('admin/'.(($post_type=='event') ? 'event' : 'news'), '<i class="fa fa-trash-o fa-fw"></i>&nbsp;</a>', array('title' => 'Delete Event','onclick'=>'return deleteEvent('.$event['post_id'].',\''.(($post_type=='event') ? 'event' : 'news').'\')')); ?>
                                      </td>
                                    </tr>
                                    </tbody>                                    
                               <?php  $i++; } ?>
                                    <?php if($pagination){ ?>
                                    <tbody>
                                        <tr>
                                            <td colspan="6"><?php echo $pagination; ?></td>
                                        </tr>
                                    </tbody>
                                    <?php } ?>
                        <?php } else{ ?>
                                    <tfoot><tr><td colspan="6">No records found</td></tr></tfoot>
                        <?php } ?>
                    </table>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->
            </div><!-- end .inner -->
        </div><!-- end .outer -->
    </div>
  <!-- end #content -->