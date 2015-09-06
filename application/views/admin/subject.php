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
                        <?php echo anchor('admin/add_subject', '&nbsp;Add Subject</a>', array('title' => 'Add Subject','class'=>'btn btn-primary btn-grad')); ?>
                    </div><br/>
                    <?php echo $this->session->flashdata('success'); ?>
                    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped responsive-table">
                      <thead>
                        <tr>
                          <th><input type="checkbox" name="select-all" id="select-all" value="1"/></th>
                          <th>Branch name</th>
                          <th>Subject</th>
<!--                          <th>Standard Name</th>-->
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                        <?php $i=1; foreach($subjects as $sub){ ?>
                                <tbody id="subjects<?php echo $sub['sub_id'];?>">
                                    <tr>
                                      <td><input type="checkbox" name="checkbox[]" id="branch<?php echo $sub['sub_id'];?>" value="<?php echo $sub['sub_id'];?>"/></td>
                                      <td><?php echo trim($sub['br_name']); ?></td>
                                      <td><?php echo trim($sub['subject']) ?></td>
<!--                                  <td><?php //echo trim($sub['std_name']) ?></td>-->
                                      <td><?php echo (trim($sub['sub_status'])==1) ? '<span class="text-success">Active</span>' : '<span class="text-danger">Inactive</span>'; ?></td>
                                      <td>
                                      <?php echo anchor('admin/add_subject/'.$sub['sub_id'], '<i class="fa fa-pencil fa-fw"></i>&nbsp;</a>', array('title' => 'Subject')); ?>
                                      <?php echo anchor('admin/subject', '<i class="fa fa-trash-o fa-fw"></i>&nbsp;</a>', array('title' => 'Delete Subject','onclick'=>'return deleteSubject('.$sub['sub_id'].')')); ?>
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