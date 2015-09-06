<?php
class Super_Admin extends CI_Controller {

    public $user_log='';
    public $data = array();

    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('userId')) {
            redirect('');
        }
        $this->load->model('commonmodel', 'common');
        $this->load->model('superadminmodel','superadmin');
        $this->load->model('usermodel','user');
        $this->load->library('encrypt');
        $this->load->library('encryption');
        $this->user_log=$this->common->getUserLog();

        /*  common data */                
        if($this->session->userdata('userphoto') && file_exists(PHOTO_UPLOAD_PATH.'/'.$this->session->userdata('userphoto'))){
            $this->data['photo']=base_url('images/'.$this->session->userdata('userphoto').'');
        }else{
            $this->data['photo']=base_url('images/user.gif');
        }
        
        $this->data['name']=$this->session->userdata('username');
        $this->data['logout']=site_url("home/logout");
        $this->data['userrole']=$this->session->userdata('userRole');
        if(isset($this->user_log['log_date'])) {
             $this->data['loged_date']=date('d M H:m',  strtotime($this->user_log['log_date']));
        }else {
             $this->data['loged_date']='';
        }
         $this->data['user_data']=$this->session->userdata('user_data');
        /* common data */
    }

    public function home() {
        $this->data['method_name'] = __FUNCTION__;
        $this->load->view('superadmin/common/header',$this->data);
        $this->load->view('superadmin/common/left');
        $this->load->view('superadmin/home');
        $this->load->view('superadmin/common/footer');
    }

    public function add_institute($id='') {
        if($id){
            $id=$this->encryption->decrypt($id);
        }
        $instituteData = array();
        $flag = false;
        $this->data['method_name'] = __FUNCTION__;
        $this->data['module_title'] = 'Add Institute';
        $this->data['page_title'] = 'TMS-Add Institute';
        $this->data['userrole']=$this->session->userdata('userRole');
        $this->data['states']=$this->common->getAllStates();
        $this->data['district']=$this->common->getAllDistricts($this->input->post('inst_state'));
        $this->data['cities']=$this->common->getAllCities($this->input->post('inst_district'));

        //Form validation and post data
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $instituteData['inst_name'] = $this->input->post('inst_name');
        $instituteData['inst_email'] = $this->input->post('inst_email');
        $instituteData['inst_phone'] = $this->input->post('inst_phone');
        $instituteData['inst_address1'] = $this->input->post('inst_address1');
        $instituteData['inst_address2'] = $this->input->post('inst_address2');
        $instituteData['inst_state'] = $this->input->post('inst_state');
        $instituteData['inst_district'] = $this->input->post('inst_district');
        $instituteData['inst_city'] = $this->input->post('inst_city');
        $instituteData['inst_website'] = $this->input->post('inst_website');
        $instituteData['inst_status'] = $this->input->post('inst_status');
        $inst_id = $this->input->post('inst_id');

        $this->form_validation->set_rules('inst_name','Institute Name','required');
        $this->form_validation->set_rules('inst_email','Institute Email','required|valid_email|max_length[255]|callback_email_check');
        $this->form_validation->set_rules('inst_phone','Institute Phone','required|custom[onlyNumberSp]');
        $this->form_validation->set_rules('inst_address1','Institute Address1','required');
        $this->form_validation->set_rules('inst_address2','Institute Address2');
        $this->form_validation->set_rules('inst_state','Institute State','required');
        $this->form_validation->set_rules('inst_district','Institute District','required');
        $this->form_validation->set_rules('inst_city','Institute City','required');
        $this->form_validation->set_rules('inst_website','Institute Website');
        //echo "<pre>";print_r($_FILES);exit;       
        if ($this->form_validation->run() == TRUE) {
            if(isset($_FILES['inst_logo']) && trim($_FILES['inst_logo']['tmp_name'])) {
                $isFileUpload=false;
                if(!is_dir(PHOTO_UPLOAD_PATH.'/institute')) {
                    mkdir(PHOTO_UPLOAD_PATH.'/institute',0777);
                }
                if(!is_dir(PHOTO_UPLOAD_PATH.'/institute/'.$this->session->userdata('username').$this->session->userdata('userId'))) {
                    mkdir((PHOTO_UPLOAD_PATH.'/institute/'.$this->session->userdata('username').$this->session->userdata('userId')),0777);
                }

                $config['upload_path'] = PHOTO_UPLOAD_PATH.'/institute/'.$this->session->userdata('username').$this->session->userdata('userId');
                $config['allowed_types'] = 'gif|jpg|png';

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload('inst_logo')) {
                    $this->session->set_flashdata('error', '<div class="alert alert-danger"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Warning!</strong> '.$this->upload->display_errors().'</div>');
                }else {
                    $logo_data=$this->upload->data();
                    $instituteData['inst_logo'] = 'institute/'.$this->session->userdata('username').$this->session->userdata('userId').'/'.$logo_data['file_name'];
                    $isFileUpload=true;
                }
            }
            if ((isset($isFileUpload) && $isFileUpload == true) || !isset($isFileUpload)) {
                $instituteData['inst_date'] = date("Y-m-d H:i:s");
                if($inst_id){
                    $flag = $this->superadmin->registerInstitute($instituteData,$inst_id);
                }else{
                    $flag = $this->superadmin->registerInstitute($instituteData);
                }
                
                if ($flag && $inst_id) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> Institute updated successfully !</div>');
                    redirect('super_admin/institute');
                }else{
                   $this->session->set_flashdata('success', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> Institute added successfully !</div>');
                   redirect('super_admin/institute');
                }                
            }
        }
        $this->data['image']='';
        if($id!='') {
            $this->data['institute']=$this->superadmin->getInstitute($id);            
            $this->data['image']=base_url('images/'.$this->data['institute']['inst_logo']);
        }

        $this->load->view('superadmin/common/header',$this->data);
        $this->load->view('superadmin/common/left');
        $this->load->view('superadmin/add_institute',$this->data);
        $this->load->view('superadmin/common/footer');
    }

    public function institute() {
        $this->data['module_title'] = 'Institutes';
        $this->data['page_title'] = 'TMS-Institutes';
        $this->data['method_name'] = __FUNCTION__;
        $this->data['institute'] =array();
        $institutes= $this->superadmin->getInstitute();
        if(!empty($institutes)) {
            foreach($institutes as $inst) {
                $this->data['institute'][]=array(
                        'inst_id'=> $inst['inst_id'],
                        'enc_inst_id'=> $this->encryption->encrypt($inst['inst_id']),
                        'inst_name'=>$inst['inst_name'],
                        'inst_email'=>$inst['inst_email'],
                        'inst_address1'=>  html_entity_decode($inst['inst_address1'], ENT_QUOTES, 'UTF-8'),
                        'inst_address2'=>html_entity_decode($inst['inst_address2'], ENT_QUOTES, 'UTF-8'),
                        'inst_phone'=>$inst['inst_phone'],
                        'city'=>$inst['inst_city'],
                        'inst_website'=>$inst['inst_website'],
                        'inst_phone'=>$inst['inst_phone']
                );
            }
        }
        $this->load->view('superadmin/common/header',$this->data);
        $this->load->view('superadmin/common/left');
        $this->load->view('superadmin/institute');
        $this->load->view('superadmin/common/footer');
    }

    public function delete_institute($id='') {
        $json=array();
        if($id) {
            $json['id']=$id;
            $result = $this->superadmin->deleteInstitute($id);
            if($result) {
                $json['success']=true;
                $this->session->set_flashdata('success', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> Institute deleted successfully !</div>');
            }
        }
        echo json_encode($json);
        exit;
    }

    public function user() {
        $this->data['module_title'] = 'Users';
        $this->data['method_name'] = __FUNCTION__;
        $this->data['users'] =array();
        $this->data['users']= $this->user->getAllUser($this->data['user_data']);
        $this->load->view('superadmin/common/header',$this->data);
        $this->load->view('superadmin/common/left');
        $this->load->view('superadmin/user');
        $this->load->view('superadmin/common/footer');
    }

    public function add_user($id='') {
        $userData = array();
        $flag = false;
        $this->data['module_title'] = 'Add User';
        $this->data['method_name'] = __FUNCTION__;
        $this->data['institute'] = $this->superadmin->getInstitute();
        $this->data['roles'] = $this->common->getUserRoles();
        if(isset($this->user_log['log_date'])) {
            $this->data['loged_date']=date('d M H:m',  strtotime($this->user_log['log_date']));
        }else {
            $this->data['loged_date']='';
        }
        //Form validation and post data
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $userData['institute_id'] = $this->input->post('institute_id');
        $userData['user_fname'] = $this->input->post('user_fname');
        $userData['user_mname'] = $this->input->post('user_mname');
        $userData['user_lname'] = $this->input->post('user_lname');
        $userData['user_email'] = $this->input->post('user_email');
        $userData['user_password'] = md5($this->input->post('user_password'));
        $userData['user_mobile'] = $this->input->post('user_mobile');
        $userData['user_type'] = $this->input->post('user_type');

        $this->form_validation->set_rules('institute_id','Institute Name','required');
        $this->form_validation->set_rules('user_fname','First Name','required');
        $this->form_validation->set_rules('user_mname','Middle Name','required');
        $this->form_validation->set_rules('user_lname','Last Name','required');
        $this->form_validation->set_rules('user_email','Email','required|valid_email|max_length[255]|callback_email_check');
        $this->form_validation->set_rules('user_password','Password','required|min_length[6]');
        $this->form_validation->set_rules('user_mobile','User Phone','required|custom[onlyNumberSp]');
        $this->form_validation->set_rules('user_type','Institute City','required');
        //echo "<pre>";print_r($_FILES);exit;

        if ($this->form_validation->run() == TRUE) {
            if(isset($_FILES['user_photo']) && trim($_FILES['user_photo']['tmp_name'])) {
                $isFileUpload=false;
                if(!is_dir(PHOTO_UPLOAD_PATH.'/user')) {
                    mkdir(PHOTO_UPLOAD_PATH.'/user',0777);
                }
                if(!is_dir(PHOTO_UPLOAD_PATH.'/user/'.$this->session->userdata('username').$this->session->userdata('userId'))) {
                    mkdir((PHOTO_UPLOAD_PATH.'/user/'.$this->session->userdata('username').$this->session->userdata('userId')),0777);
                }

                $config['upload_path'] = PHOTO_UPLOAD_PATH.'/user/'.$this->session->userdata('username').$this->session->userdata('userId');
                $config['allowed_types'] = 'gif|jpg|png';

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload('user_photo')) {
                    $this->session->set_flashdata('error', '<div class="alert alert-danger"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Warning!</strong> '.$this->upload->display_errors().'</div>');
                }else {
                    $logo_data=$this->upload->data();
                    $userData['user_photo'] = 'user/'.$this->session->userdata('username').$this->session->userdata('userId').'/'.$logo_data['file_name'];
                    $isFileUpload=true;
                }
            }
            if($this->input->post('user_hidden_image')) {
                $userData['user_status'] = $this->input->post('user_status');
                $userData['modified_time'] = date("Y-m-d H:i:s");
                $userid= $this->input->post('user_hidden_id');
                $flag = $this->user->editUser($userid,$userData);
                if ($flag) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> User updated successfully !</div>');
                    redirect('super_admin/add_user');
                }
            }else if ((isset($isFileUpload) && $isFileUpload == true) || !isset($isFileUpload)) {
                $userData['user_status'] = 1;
                $userData['created_time'] = date("Y-m-d H:i:s");
                $flag = $this->user->addUser($userData);
                if ($flag) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> User added successfully !</div>');
                    redirect('super_admin/add_user');
                }
            }
        }
        $this->data['image']='';
        if($id!='') {
            $this->data['user']=$this->user->getUserByID($id);
            $this->data['image']=base_url('images/'.$this->data['user']['user_photo']);
            // $editflag = $this->user->editUser($id,)
        }
        $this->load->view('superadmin/common/header',$this->data);
        $this->load->view('superadmin/common/left');
        $this->load->view('superadmin/add_user',$this->data);
        $this->load->view('superadmin/common/footer');
    }

    public function delete_user($id='') {
        $json=array();
        if($id) {
            $json['id']=$id;
            $result = $this->user->deleteUser($id);
            if($result) {
                $json['success']=true;
                $this->session->set_flashdata('success', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> User deleted successfully !</div>');
            }
        }
        echo json_encode($json);
        exit;
    }
    
    public function feedback() {
        $this->data['module_title'] = 'Feedbacks';
        $this->data['method_name'] = __METHOD__;
        $this->data['feedbacks'] = $this->superadmin->getFeedbacks();
        $this->load->view('superadmin/common/header',$this->data);
        $this->load->view('superadmin/common/left');
        $this->load->view('superadmin/feedback');
        $this->load->view('superadmin/common/footer');
    }
}

?>
