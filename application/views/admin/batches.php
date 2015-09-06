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
                        <?php echo anchor('admin/add_batch', '&nbsp;Add Batch</a>', array('title' => 'Add Batch','class'=>'btn btn-primary btn-grad')); ?>
                    </div><br/>
                    <?php echo $this->session->flashdata('success'); ?>
                    <table id="dataTable1" class="table table-bordered table-condensed table-hover table-striped responsive-table">
                      <thead>
                        <tr>
                          <th><input type="checkbox" name="select-all" id="select-all" value="1"/></th>
                          <th>Branch</th>
                          <th>Standard</th>
                          <th>Batch</th>
                          <th>Start time</th>
                          <th>End time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                        <?php $i=1; 
                        if(!empty($batches)){
                        foreach($batches as $batch){ ?>
                                <tbody id="batches<?php echo $batch['batch_id'];?>">
                                    <tr>
                                      <td><input type="checkbox" name="checkbox[]" id="branch<?php echo $batch['batch_id'];?>" value="<?php echo $batch['batch_id'];?>"/></td>                                      
                                      <td><?php echo trim($batch['br_name']) ?></td>
                                      <td><?php echo trim($batch['std_name']); ?></td>
                                      <td><?php echo trim($batch['batch_name']); ?></td>
                                      <td><?php echo date('H:i',strtotime($batch['batch_start'])); ?></td>
                                      <td><?php echo date('H:i',strtotime($batch['batch_end'])); ?></td>
                                      <td><?php echo (trim($batch['batch_status'])==1) ? '<span class="text-success">Active</span>' : '<span class="text-danger">Inactive</span>'; ?></td>
                                      <td>
                                      <?php echo anchor('admin/add_batch/'.$batch['batch_id'], '<i class="fa fa-pencil fa-fw"></i>&nbsp;</a>', array('title' => 'Batch')); ?>
                                      <?php echo anchor('admin/batches', '<i class="fa fa-trash-o fa-fw"></i>&nbsp;</a>', array('title' => 'Delete Batch','onclick'=>'return deleteBatch('.$batch['batch_id'].')')); ?>
                                      </td>
                                    </tr>
                                    </tbody>
                               <?php  $i++; } ?>
                        <?php }else { ?>
                                    <tfoot>
                                        <tr>
                                            <td colspan="7">No records found</td>
                                        </tr>
                                    </tfoot>       
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