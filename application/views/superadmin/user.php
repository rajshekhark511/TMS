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
                        <?php echo anchor('super_admin/add_user', '&nbsp;Add Admin User</a>', array('title' => 'Add Admin User','class'=>'btn btn-primary btn-grad')); ?>
                    </div><br/>
                    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped responsive-table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Institute</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>User Role</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>                      
                        <?php
                                        //echo '<pre>';
                                        //print_r($users);
                                            foreach($users as $userKey => $userVal){
                                                $status = ($userVal['user_status']=='1') ? 'Active' : 'Inactive';
                                                echo '<tbody id="user'.$userVal['userid'].'">
                                    <tr>
                                      <td>'.trim($userVal['user_fname']).' '.trim($userVal['user_lname']).'</td>
                                      <td>'.trim($userVal['inst_name']).'</td>
                                      <td>'.trim($userVal['user_email']).'</td>
                                      <td>'.trim($userVal['user_mobile']).'</td>
                                      <td>'.trim($userVal['role_name']).'</td>
                                      <td>'.trim($status).'</td>
                                      <td>
                                      '.anchor('super_admin/add_user/'.$userVal['userid'], '<i class="fa fa-pencil fa-fw"></i>&nbsp;</a>', array('title' => 'Edit User')).'
                                      '.anchor('super_admin/user', '<i class="fa fa-trash-o fa-fw"></i>&nbsp;</a>', array('title' => 'Delete User','onclick'=>'return deleteUser('.$userVal['userid'].')')).'
                                      </td>
                                    </tr>
                                    </tbody>';
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

<!-- end #content -->
