<?php
//echo '<pre>';
//print_r($users);
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
                    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped responsive-table">
                      <thead>
                        <tr>
                          <?php if(trim($user_type)==555){ ?>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Mobile</th>
                              <th>Status</th>
                              <th>Action</th>
                          <?php }else if(trim($user_type)==333){ ?>  
                              <th>Name</th>
                              <th>Father Name</th>
                              <th>Standard</th>
                              <th>Batch</th>
                              <th>Status</th>
                              <th>Action</th>
                          <?php }else if(trim($user_type)==444){ ?>  
                              <th>Child Name</th>
                              <th>Father Name</th>
                              <th>Mother Name</th>
                              <th>Status</th>
                              <th>Action</th>
                          <?php } ?> 
                          
                        </tr>
                      </thead>
                        <?php
                            //echo '<pre>';
                            //print_r($users);exit;
                                if(!empty($users)){
                                    foreach($users as $userKey => $userVal){
                                        $status = ($userVal['user_status']=='1') ? 'Active' : 'Inactive';
                                        echo '<tbody id="user'.$userVal['userid'].'">';
                                        echo '<tr>';
                                        if(trim($user_type)==555){
                                            echo '<td>'.trim($userVal['user_fname']).' '.trim($userVal['user_lname']).'</td>';
                                            echo '<td>'.trim($userVal['user_email']).'</td>';
                                            echo '<td>'.trim($userVal['user_mobile']).'</td>';
                                            echo '<td>'.trim($status).'</td>';
                                            echo '<td>';
                                            echo ''.anchor('admin/add_user/'.$userVal['userid'], '<i class="fa fa-pencil fa-fw"></i>&nbsp;</a>', array('title' => 'Edit User')).'';
                                            echo ''.anchor('admin/user', '<i class="fa fa-trash-o fa-fw"></i>&nbsp;</a>', array('title' => 'Delete User','onclick'=>'return deleteAdminSubUser('.$userVal['userid'].','.$userVal['user_type'].')')).'';
                                            echo '</td>';
                                        }else if(trim($user_type)==333){
                                            echo '<td>'.trim($userVal['user_fname']).' '.trim($userVal['user_lname']).'</td>';
                                            echo '<td>'.trim($userVal['user_fname']).' '.trim($userVal['user_lname']).'</td>';
                                            echo '<td>'.trim($userVal['std_name']).'</td>';
                                            echo '<td>'.trim($userVal['batch_name']).'</td>';
                                            echo '<td>'.trim($status).'</td>';
                                            echo '<td>';
                                            echo ''.anchor('admin/add_user/'.$userVal['userid'], '<i class="fa fa-pencil fa-fw"></i>&nbsp;</a>', array('title' => 'Edit User')).'';
                                            echo ''.anchor('admin/user', '<i class="fa fa-trash-o fa-fw"></i>&nbsp;</a>', array('title' => 'Delete User','onclick'=>'return deleteAdminSubUser('.$userVal['userid'].','.$userVal['user_type'].')')).'';
                                            echo '</td>';
                                        }else if(trim($user_type)==444){
                                            echo '<td>'.trim($userVal['user_fname']).' '.trim($userVal['user_lname']).'</td>';
                                            echo '<td>'.trim($userVal['father_name']).'</td>';
                                            echo '<td>'.trim($userVal['mother_name']).'</td>';
                                            echo '<td>'.trim($status).'</td>';
                                            echo '<td>';
                                            echo ''.anchor('admin/add_user/'.$userVal['user_id'], '<i class="fa fa-pencil fa-fw"></i>&nbsp;</a>', array('title' => 'Edit User')).'';
                                            echo ''.anchor('admin/user', '<i class="fa fa-trash-o fa-fw"></i>&nbsp;</a>', array('title' => 'Delete User','onclick'=>'return deleteAdminSubUser('.$userVal['user_id'].','.$userVal['user_type'].')')).'';
                                            echo '</td>';
                                        }
                                        echo '</tr>';
                                        echo '</tbody>';
                                     }
                                 }
                            ?>
                    </table>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->

            </div>
        </div>

        <!-- end .inner -->
    </div>

    <!-- end .outer -->
</div>

<!-- end #content -->=======
