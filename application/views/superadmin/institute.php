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
                    <?php echo $this->session->flashdata('error'); ?>
                    <?php echo $this->session->flashdata('success'); ?>
                    <div>
                        <?php echo anchor('super_admin/add_institute', '&nbsp;Add Institute</a>', array('title' => 'Add Institute','class'=>'btn btn-primary btn-grad')); ?>
                    </div><br/>
                    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped responsive-table">
                      <thead>
                        <tr>
                          <th>Institute Name</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Phone</th>
                          <th>City</th>
                          <th>Website</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                        <?php foreach($institute as $insKey => $insVal){ ?>
                                <tbody id="institute<?php echo $insVal['inst_id'];?>">
                                    <tr>
                                      <td><?php echo trim($insVal['inst_name']); ?></td>
                                      <td><?php echo trim($insVal['inst_email']) ?></td>
                                      <td><?php echo trim($insVal['inst_address1']).' '.trim($insVal['inst_address2']); ?></td>
                                      <td><?php echo trim($insVal['inst_phone']); ?></td>
                                      <td><?php echo trim($insVal['city']); ?></td>
                                      <td><?php echo trim($insVal['inst_website']); ?></td>
                                      <td>
                                      <?php echo anchor('super_admin/add_institute/'.$insVal['enc_inst_id'], '<i class="fa fa-pencil fa-fw"></i>&nbsp;</a>', array('title' => 'Institute')); ?>
                                      <?php echo anchor('super_admin/institute', '<i class="fa fa-trash-o fa-fw"></i>&nbsp;</a>', array('title' => 'Delete Institute','onclick'=>'return deleteInstitute('.$insVal['enc_inst_id'].')')); ?>
                                      </td>
                                    </tr>
                                    </tbody>
                               <?php  }
                                        ?>
                    </table>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->
            </div><!-- end .inner -->
        </div><!-- end .outer -->        
    </div>
  <!-- end #content -->
