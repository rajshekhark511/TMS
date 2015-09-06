<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
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
                        <?php echo anchor('admin/add_standard', '&nbsp;Add Standards</a>', array('title' => 'Add Standards','class'=>'btn btn-primary btn-grad')); ?>
                    </div><br/>
                    <?php echo $this->session->flashdata('success'); ?>
                    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped responsive-table">
                      <thead>
                        <tr>
                          <th><input type="checkbox" name="select-all" id="select-all" value="1"/></th>
                          <th>Standard Name</th>
                          <th>Branch name</th>                          
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                        <?php $i=1; foreach($standards as $std){ ?>
                                <tbody id="standards<?php echo $std['std_id'];?>">
                                    <tr>
                                      <td><input type="checkbox" name="checkbox[]" id="branch<?php echo $std['std_id'];?>" value="<?php echo $std['std_id'];?>"/></td>                                      
                                      <td><?php echo trim($std['std_name']) ?></td>
                                      <td><?php echo trim($std['br_name']); ?></td>
                                      <td><?php echo (trim($std['std_status'])==1) ? '<span class="text-success">Active</span>' : '<span class="text-danger">Inactive</span>'; ?></td>
                                      <td>
                                      <?php echo anchor('admin/add_standard/'.$std['std_id'], '<i class="fa fa-pencil fa-fw"></i>&nbsp;</a>', array('title' => 'Standard')); ?>
                                      <?php echo anchor('admin/standard', '<i class="fa fa-trash-o fa-fw"></i>&nbsp;</a>', array('title' => 'Delete Standard','onclick'=>'return deleteStandard('.$std['std_id'].')')); ?>
                                      </td>
                                    </tr>
                                    </tbody>
                               <?php  $i++; } ?>
                    </table>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->
            </div><!-- end .inner -->
        </div><!-- end .outer -->
    </div>
  <!-- end #content -->