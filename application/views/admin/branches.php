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
                        <?php echo anchor('admin/add_branch', '&nbsp;Add Branch</a>', array('title' => 'Add Branch','class'=>'btn btn-primary btn-grad')); ?>
                    </div><br/>
                    <?php echo $this->session->flashdata('success'); ?>
                    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped responsive-table">
                      <thead>
                        <tr>
                          <th><input type="checkbox" name="select-all" id="select-all" value="1"/></th>
                          <th>Branch Name</th>
                          <th>Institute name</th>
                          <th>Address</th>                          
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                        <?php $i=1; 
                        foreach($branches as $branch){ ?>
                                <tbody id="branches<?php echo $branch['br_id'];?>">
                                    <tr>
                                        <td><input type="checkbox" name="checkbox[]" id="branch<?php echo $branch['br_id'];?>" value="<?php echo $branch['br_id'];?>"/></td>
                                        <td><?php echo trim($branch['br_name']); ?></td>
                                      <td><?php echo trim($branch['inst_name']) ?></td>
                                      <td>
                                        <?php
                                        $format = '{address_1}' . "\n" . '{address_2}' . "\n" . '{city}' . "\n" . '{district}'. "\n" . '{state}';
                                        $find = array(                                              
                                              '{address_1}',
                                              '{address_2}',
                                              '{city}',
                                              '{district}',
                                              '{state}'                                              
                                          );

                                          $replace = array(                                              
                                              'address_1' => $branch['br_address_1'],
                                              'address_2' => $branch['br_address_2'],
                                              'city' => $branch['br_city'],
                                              'district' => $branch['district'],
                                              'state' => $branch['state']
                                          );

                                        echo str_replace(array("\r\n", "\r", "\n"), '<br />', preg_replace(array("/\s\s+/", "/\r\r+/", "/\n\n+/"), '<br />', trim(str_replace($find, $replace, $format)))); ?>
                                      </td>
                                      <td><?php echo (trim($branch['br_status'])==1) ? '<span class="text-success">Active</span>' : '<span class="text-danger">Inactive</span>'; ?></td>
                                      <td>
                                      <?php echo anchor('admin/add_branch/'.$branch['br_id'], '<i class="fa fa-pencil fa-fw"></i>&nbsp;</a>', array('title' => 'Branch')); ?>
                                      <?php echo anchor('admin/branches', '<i class="fa fa-trash-o fa-fw"></i>&nbsp;</a>', array('title' => 'Delete Branch','onclick'=>'return deleteBranch('.$branch['br_id'].')')); ?>
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