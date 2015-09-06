<?php

class Admin extends CI_Controller {

    public $user_log = '';
    
    public $data = array();

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('userId')) {
            redirect('');
        }
        $this->load->model('commonmodel', 'common');
        $this->load->model('adminmodel', 'admin');
        $this->load->model('usermodel','user');
        $this->user_log = $this->common->getUserLog();
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
        $this->load->view('admin/common/header', $this->data);
        $this->load->view('admin/common/left', $this->data);
        $this->load->view('admin/home');
        $this->load->view('admin/common/footer');
    }

    public function branches() {
        $this->data['module_title'] = 'Branches';
        $this->data['page_title'] = 'TMS-Branches';  
        $this->data['method_name'] = __FUNCTION__;
        $this->data['branches'] = $this->admin->getBranches(array());
        $this->load->view('admin/common/header', $this->data);
        $this->load->view('admin/common/left', $this->data);
        $this->load->view('admin/branches', $this->data);
        $this->load->view('admin/common/footer');
    }

    public function add_branch($id='') {
        $branchData = array();
        $flag = false;
        $this->data['module_title'] = (($id) ? 'Update' : 'Add') .' Branch';
        $this->data['page_title'] = 'TMS-'.(($id) ? 'Update' : 'Add').' branch';
        $user_data=$this->session->userdata('user_data');
        $this->data['method_name'] = __FUNCTION__;
        $this->data['userrole'] = $this->session->userdata('userRole');
        $this->data['states'] = $this->common->getAllStates();
        $this->data['district'] = $this->common->getAllDistricts($this->input->post('inst_state'));

        //Form validation and post data
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $branchData['inst_id'] = $this->input->post('inst_id');
        $branchData['br_city'] = $this->input->post('br_city');
        $branchData['br_name'] = $this->input->post('br_name');
        $branchData['br_address_1'] = $this->input->post('br_address_1');
        $branchData['br_address_2'] = $this->input->post('br_address_2');
        $branchData['br_state'] = $this->input->post('br_state');
        $branchData['br_district'] = $this->input->post('br_district');
        $branchData['br_phone'] = $this->input->post('br_phone');
        $branchData['br_status'] = $this->input->post('br_status');
        $branchData['inst_id'] = $user_data->institute_id;
        
        $this->form_validation->set_rules('br_city', 'Branch city', 'required');
        $this->form_validation->set_rules('br_name', 'Branch name', 'required');
        $this->form_validation->set_rules('br_address_1', 'Branch address 1', 'required');
        $this->form_validation->set_rules('br_state', 'Branch state', 'required');
        $this->form_validation->set_rules('br_district', 'Branch district', 'required');
        $this->form_validation->set_rules('br_phone', 'Branch phone', 'required');
        

        if ($this->form_validation->run() == TRUE) {                
                if($this->input->post('br_id')){
                   $branchData['br_update_date'] = date("Y-m-d H:i:s");
                    $flag = $this->admin->addBranch($branchData,$this->input->post('br_id'));
                    if ($flag) {
                        $this->session->set_flashdata('success', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> Branch updated successfully !</div>');
                    }
                }else{
                    $branchData['br_date'] = date("Y-m-d H:i:s");
                    $flag = $this->admin->addBranch($branchData);
                    if ($flag) {
                        $this->session->set_flashdata('success', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> Branch added successfully !</div>');                        
                    }
                }
                redirect('admin/branches');
        }        
        if ($id != '') {
            $this->data['branch'] = $this->admin->getBranches(array('id'=>$id));
        }

        $this->load->view('admin/common/header', $this->data);
        $this->load->view('admin/common/left',$this->data);
        $this->load->view('admin/add_branch', $this->data);
        $this->load->view('admin/common/footer');
    }

    public function delete_branch($id=''){
       $json=array();
        if($id) {
            $json['id']=$id;
            $result = $this->admin->deleteBranch($id);
            if($result) {
                $json['success']=true;
                $this->session->set_flashdata('success', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> Branch deleted successfully !</div>');
            }
        }
        echo json_encode($json);
        exit;
    }

    public function standard(){
        $this->data['module_title'] = 'Standards';
        $this->data['page_title'] = 'TMS-Standards';
        $this->data['method_name'] = __FUNCTION__;
        $user_data=$this->session->userdata('user_data');
        $this->data['standards'] = $this->admin->getStandards(array('inst_id'=>$user_data->institute_id));
        $this->load->view('admin/common/header', $this->data);
        $this->load->view('admin/common/left', $this->data);
        $this->load->view('admin/standard', $this->data);
        $this->load->view('admin/common/footer');
    }

    public function add_standard($id='') {
        $standardData = array();
        $flag = false;
        $this->data['module_title'] = (($id) ? 'Update' : 'Add') .' Standard';
        $this->data['page_title'] = 'TMS-'.(($id) ? 'Update' : 'Add').' Standard';
        $user_data=$this->session->userdata('user_data');
        $this->data['method_name'] = __FUNCTION__;
        $this->data['userrole'] = $this->session->userdata('userRole');

        //Form validation and post data
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');        
        $standardData['br_id'] = $this->input->post('br_id');
        $standardData['std_name'] = $this->input->post('std_name');        
        $standardData['std_status'] = $this->input->post('std_status');        

        $this->form_validation->set_rules('br_id', 'Branch name', 'required');
        $this->form_validation->set_rules('std_name', 'Standard name', 'required');        


        if ($this->form_validation->run() == TRUE) {
                if($this->input->post('std_id')){
                   $standardData['std_updated_date'] = date("Y-m-d H:i:s");
                    $flag = $this->admin->addStandard($standardData,$this->input->post('std_id'));
                    if ($flag) {
                        $this->session->set_flashdata('success', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> Standard updated successfully !</div>');
                    }
                }else{
                    $standardData['std_date'] = date("Y-m-d H:i:s");
                    $flag = $this->admin->addStandard($standardData);
                    if ($flag) {
                        $this->session->set_flashdata('success', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> Standard added successfully !</div>');
                    }
                }
                redirect('admin/standard');
        }
        if ($id != '') {
            $this->data['standard'] = $this->admin->getStandards(array('id'=>$id));
        }
        $this->data['branches']=array();
        $this->data['branches']['']='[--Select branch--]';
        $branches = $this->admin->getBranches(array('inst_id'=>$user_data->institute_id));
        if(!empty($branches)){
            foreach($branches as $branch){
                $this->data['branches'][$branch['br_id']]=$branch['br_name'];
            }
        }
        
        $this->load->view('admin/common/header', $this->data);
        $this->load->view('admin/common/left',$this->data);
        $this->load->view('admin/add_standard', $this->data);
        $this->load->view('admin/common/footer');
    }

    public function delete_standard($id=''){
       $json=array();
        if($id) {
            $json['id']=$id;
            $result = $this->admin->deleteStandard($id);
            if($result) {
                $json['success']=true;
                $this->session->set_flashdata('success', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> Standard deleted successfully !</div>');
            }
        }
        echo json_encode($json);
        exit;
    }

    public function subject(){
        $this->data['module_title'] = 'Subjects';
        $this->data['page_title'] = 'TMS-Subjects';
        $user_data=$this->session->userdata('user_data');
        $this->data['method_name'] = __FUNCTION__;
        $this->data['subjects'] = $this->admin->getSubjects(array('inst_id'=>$user_data->institute_id));
        $this->load->view('admin/common/header', $this->data);
        $this->load->view('admin/common/left', $this->data);
        $this->load->view('admin/subject', $this->data);
        $this->load->view('admin/common/footer');
    }

    public function add_subject($id='') {
        $subjectData = array();
        $flag = false;
        $this->data['module_title'] = (($id) ? 'Update' : 'Add') .' Subject';
        $this->data['page_title'] = 'TMS-'.(($id) ? 'Update' : 'Add').' Subject';
        $user_data=$this->session->userdata('user_data');
        $this->data['method_name'] = __FUNCTION__;
        //Form validation and post data
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $subjectData['br_id'] = $this->input->post('br_id');
        //$subjectData['std_id'] = $this->input->post('std_id');
        $subjectData['subject'] = $this->input->post('subject');
        $subjectData['sub_status'] = $this->input->post('sub_status');

        $this->form_validation->set_rules('br_id', 'Branch name', 'required');
        $this->form_validation->set_rules('subject', 'Subject name', 'required');


        if ($this->form_validation->run() == TRUE) {
                if($this->input->post('sub_id')){
                   $subjectData['sub_update_date'] = date("Y-m-d H:i:s");
                    $flag = $this->admin->addSubject($subjectData,$this->input->post('sub_id'));
                    if ($flag) {
                        $this->session->set_flashdata('success', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> Subject updated successfully !</div>');
                    }
                }else{
                    $subjectData['sub_date'] = date("Y-m-d H:i:s");
                    $flag = $this->admin->addSubject($subjectData);
                    if ($flag) {
                        $this->session->set_flashdata('success', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> Subject added successfully !</div>');
                    }
                }
                redirect('admin/subject');
        }
        if ($id != '') {
            $this->data['subject'] = $this->admin->getSubjects(array('id'=>$id));
        }
        $this->data['branches']=array();
        $this->data['branches']['']='[--Select branch--]';
        $branches = $this->admin->getBranches(array('inst_id'=>$user_data->institute_id));
        if(!empty($branches)){
            foreach($branches as $branch){
                $this->data['branches'][$branch['br_id']]=$branch['br_name'];
            }
        }
//
//        $this->data['standards']=array();
//        $this->data['standards']['']='[--Select standard--]';
//        $standards = $this->admin->getStandards(array('inst_id'=>$user_data->institute_id,'br_id'=>$this->input->post('br_id')));
//        if(!empty($standards)){
//            foreach($standards as $std){
//                $this->data['standards'][$std['std_id']]=$std['std_name'];
//            }
//        }
        
        $this->load->view('admin/common/header', $this->data);
        $this->load->view('admin/common/left',$this->data);
        $this->load->view('admin/add_subject', $this->data);
        $this->load->view('admin/common/footer');
    }

    public function get_subject($id=''){
        $json=array();
        $user_data=$this->session->userdata('user_data');
        $standards = $this->admin->getStandards(array('inst_id'=>$user_data->institute_id,'br_id'=>$id));
        $json['standards']=array();
        if(!empty($standards)){
            foreach($standards as $std){
               $json['standards'][]=array(
                'std_id'=>$std['std_id'],
                'std_name'=>$std['std_name']
               );
            }
        }
        echo json_encode($json);exit;
    }

    public function delete_subject($id=''){
       $json=array();
        if($id) {
            $json['id']=$id;
            $result = $this->admin->deleteSubject($id);
            if($result) {
                $json['success']=true;
                $this->session->set_flashdata('success', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> Subject deleted successfully !</div>');
            }
        }
        echo json_encode($json);
        exit;
    }
                                                                                                                                                                    
    public function user($userType) {
        if(trim($userType)==555){
            $this->data['module_title'] = 'User - Teacher';
        }else if(trim($userType)==333){
            $this->data['module_title'] = 'User - Student';
        }else if(trim($userType)==444){
            $this->data['module_title'] = 'User - Parent';
        }
        $this->data['user_type'] = $userType;
        $this->data['method_name'] = __FUNCTION__;
        $this->data['users'] =array();
        $this->data['users']= $this->user->getAllUser($this->data['user_data'],$userType);
        $this->load->view('admin/common/header',$this->data);
        $this->load->view('admin/common/left');
        $this->load->view('admin/user');
        $this->load->view('admin/common/footer');
    }
    
    public function add_user($id='') {
        //echo '<pre>';
        //print_r($_POST);
        //print_r($_FILES);
        $userData = array();
        $teacherData = array();
        $studentData = array();
        $parentData = array();
        $arrLang = array();
        $flag = false;
        if($id!=''){
            $this->data['module_title'] = 'Edit User';
        }else{
            $this->data['module_title'] = 'Add User';
        }
        $this->data['roles'] = $this->common->getUserRoles();
        if(isset($this->user_log['log_date'])) {
            $this->data['loged_date']=date('d M H:m',  strtotime($this->user_log['log_date']));
        }else {
            $this->data['loged_date']='';
        }
        //Form validation and post data
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $userData['institute_id'] = $this->data['user_data']->institute_id;
        $userData['user_fname'] = $this->input->post('user_fname');
        $userData['user_mname'] = $this->input->post('user_mname');
        $userData['user_lname'] = $this->input->post('user_lname');
        $userData['user_gender'] = $this->input->post('user_gender');
        $userData['user_email'] = $this->input->post('user_email');
        $userData['user_password'] = md5($this->input->post('user_password'));
        $userData['user_mobile'] = $this->input->post('user_mobile');
        $userData['user_type'] = $this->input->post('user_type');
        $this->data['method_name'] = __FUNCTION__;
        
        if($userData['user_type']==555){        // For Teachers
            $teacherData['th_branch'] = $this->input->post('th_branch');
            $teacherData['th_dob'] = $this->input->post('th_dob');
            $teacherData['th_blood_group'] = $this->input->post('th_blood_group');
            $teacherData['th_address'] = $this->input->post('th_address');
            $teacherData['th_marital_status'] = $this->input->post('th_marital_status');
            $teacherData['th_state'] = $this->input->post('th_state');
            $teacherData['th_district'] = $this->input->post('th_district');
            $teacherData['th_city'] = $this->input->post('th_city');
            $teacherData['th_pincode'] = $this->input->post('th_pincode');
            $language=$this->input->post('th_language');
            if(!empty($language)){
                $language = $this->input->post('th_language');
                $speak = $this->input->post('speak');
                $read = $this->input->post('read');
                $write = $this->input->post('write');
                foreach($language as $lKey => $lVal){
                    //if($lVal!=''){
                        $arrLang[$lVal] = array('speak'=>(isset($speak[$lKey]) ? $speak[$lKey] : 0),'read'=>(isset($read[$lKey]) ? $read[$lKey] : 0),'write'=>(isset($write[$lKey]) ? $write[$lKey] : 0));
                    //}
                }
                $teacherData['th_language_known'] = json_encode($arrLang);
            }
        }else if($userData['user_type']==333){        // For Students
            $studentData['st_dob'] = $this->input->post('st_dob');
            $studentData['st_birthplace'] = $this->input->post('st_birthplace');
            $studentData['st_admissionno'] = $this->input->post('st_admissionno');
            $studentData['st_branch'] = $this->input->post('st_branch');
            $studentData['st_class'] = $this->input->post('st_class');
            $studentData['st_batch'] = $this->input->post('st_batch');
            $studentData['st_rollnumber'] = $this->input->post('st_rollnumber');
            $studentData['st_religion'] = $this->input->post('st_religion');
            $studentData['st_mothertongue'] = $this->input->post('st_mothertongue');
            $studentData['st_blood_group'] = $this->input->post('st_blood_group');
            $studentData['st_height'] = $this->input->post('st_height');
            $studentData['st_weight'] = $this->input->post('st_weight');
            $studentData['st_address'] = $this->input->post('st_address');
            $studentData['st_city'] = $this->input->post('st_city');
            $studentData['st_pincode'] = $this->input->post('st_pincode');
            $studentData['st_state'] = $this->input->post('st_state');
            $studentData['st_district'] = $this->input->post('st_district');
            $studentData['st_country'] = $this->input->post('st_country');
            if(!empty($this->input->post('st_language_known'))){
                $language = $this->input->post('st_language_known');
                $speak = $this->input->post('speak');
                $read = $this->input->post('read');
                $write = $this->input->post('write');
                foreach($language as $lKey => $lVal){
                    //if($lVal!=''){
                        $arrLang[$lVal] = array('speak'=>(isset($speak[$lKey]) ? $speak[$lKey] : 0),'read'=>(isset($read[$lKey]) ? $read[$lKey] : 0),'write'=>(isset($write[$lKey]) ? $write[$lKey] : 0));
                    //}
                }
                $studentData['st_language_known'] = json_encode($arrLang);
            }
        }else if($userData['user_type']==444){        // For Parents
            $parentData['father_name'] = $this->input->post('father_name');
            $parentData['father_email'] = $this->input->post('father_email');
            $parentData['father_mobile'] = $this->input->post('father_mobile');
            $parentData['father_occupation'] = $this->input->post('father_occupation');
            $parentData['father_education'] = $this->input->post('father_education');
            $parentData['mother_name'] = $this->input->post('mother_name');
            $parentData['mother_email'] = $this->input->post('mother_email');
            $parentData['mother_mobile'] = $this->input->post('mother_mobile');
            $parentData['mother_occupation'] = $this->input->post('mother_occupation');
            $parentData['mother_education'] = $this->input->post('mother_education');
        }

        $this->form_validation->set_rules('user_fname','First Name','required');
        $this->form_validation->set_rules('user_mname','Middle Name','required');
        $this->form_validation->set_rules('user_lname','Last Name','required');
        $this->form_validation->set_rules('user_email','Email','required|valid_email|max_length[255]|callback_email_check');
        //$this->form_validation->set_rules('user_password','Password','required|min_length[6]');
        $this->form_validation->set_rules('user_mobile','Mobile','required|custom[onlyNumberSp]');
        $this->form_validation->set_rules('user_type','User Type','required');
        
        if($userData['user_type']==555){        // For Teachers
            //For Teachers
            $this->form_validation->set_rules('th_branch','Branch','required');
            $this->form_validation->set_rules('th_dob','DOB','required');
            $this->form_validation->set_rules('th_blood_group','Blood Group','required');
            $this->form_validation->set_rules('th_address','Address','required');
            $this->form_validation->set_rules('th_marital_status','Marital Status','required');
            $this->form_validation->set_rules('th_state','State','required');
            $this->form_validation->set_rules('th_district','District','required');
            $this->form_validation->set_rules('th_city','City','required');
            $this->form_validation->set_rules('th_pincode','Pincode','required');
        }else if($userData['user_type']==333){        // For Students
            //For Students
            $this->form_validation->set_rules('st_dob','DOB','required');
            $this->form_validation->set_rules('st_birthplace','Birth Place','required');
            $this->form_validation->set_rules('st_admissionno','Admission Number','required');
            $this->form_validation->set_rules('st_branch','Branch','required');
            $this->form_validation->set_rules('st_class','Standard','required');
            $this->form_validation->set_rules('st_batch','Batch','required');
            $this->form_validation->set_rules('st_address','Address','required');
            $this->form_validation->set_rules('st_state','State','required');
            $this->form_validation->set_rules('st_district','District','required');
            $this->form_validation->set_rules('st_city','City','required');
            $this->form_validation->set_rules('st_pincode','Pincode','required');
        }
        
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
                $userData['modified_time'] = date("Y-m-d H:i:s");
                $userid= $this->input->post('user_hidden_id');
                $flag = $this->user->editUser($userid,$userData);
                if ($flag) {
                    $flag1 = false;
                    if($userData['user_type']==555){
                        $teacherData['modified_date'] = date('Y-m-d H:i:s');
                        $flag1 = $this->user->editUser($userid,$teacherData,$userData['user_type']);
                    }else if($userData['user_type']==333){
                        $studentData['modified_time'] = date('Y-m-d H:i:s');
                        $flag1 = $this->user->editUser($userid,$studentData,$userData['user_type']);
                    }else if($userData['user_type']==444){
                        $studentData['modified_time'] = date('Y-m-d H:i:s');
                        $flag1 = $this->user->editUser($userid,$parentData,$userData['user_type']);
                    }
                    if($flag1){ echo "vipul=>".$flag1;exit;
                        $this->session->set_flashdata('success', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> User updated successfully !</div>');
                        redirect('admin/add_user');
                    }
                }
            }else if ((isset($isFileUpload) && $isFileUpload == true) || !isset($isFileUpload)) {
                $userData['user_status'] = $this->input->post('user_status');
                $userData['created_time'] = date("Y-m-d H:i:s");
                $flag = $this->user->addUser($userData);   // return user id                
                if ($flag) {
                    $flag1 = false;
                    if ($userData['user_type']==555) {
                        $teacherData['user_id'] = $flag;
                        $teacherData['created_date'] = date('Y-m-d H:i:s');
                        $teacherData['modified_date'] = date('Y-m-d H:i:s');
                        $flag1 = $this->user->addUser($teacherData,$userData['user_type']);
                    } else if ($userData['user_type']==333) {
                        $studentData['user_id'] = $flag;
                        $studentData['created_time'] = date('Y-m-d H:i:s');
                        $studentData['modified_time'] = date('Y-m-d H:i:s');
                        $flag1 = $this->user->addUser($studentData,$userData['user_type']);
                    } else if ($userData['user_type']==444) {
                        $parentData['user_id'] = $flag;
                        $parentData['created_time'] = date('Y-m-d H:i:s');
                        $parentData['modified_time'] = date('Y-m-d H:i:s');
                        $flag1 = $this->user->addUser($parentData,$userData['user_type']);
                    }                    
                    if ($flag1) {
                        $this->session->set_flashdata('success', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> User added successfully !</div>');
                        redirect('admin/add_user');
                    }
                }
            }
        }
        $this->data['image']='';
        
        if($id!='') {
            $this->data['user']=$this->user->getUserByID($id);
            $this->data['states']=$this->common->getAllStates();
            if(trim($this->data['user']['user_type'])==555){
                $this->data['teacher']=$this->user->getTeacherDataByID($id);
                $this->data['district']=$this->common->getAllDistricts($this->data['teacher']['th_state']);
                $this->data['image']=base_url('images/'.$this->data['teacher']['user_photo']);
            }else if(trim($this->data['user']['user_type'])==333){
                $this->data['student']=$this->user->getStudentDataByID($id);   
                $this->data['district']=$this->common->getAllDistricts($this->data['student']['st_state']);
                $this->data['image']=base_url('images/'.$this->data['student']['user_photo']);
               $branches=$this->common->getAllBranches($this->data['user']['institute_id']);
                if(!empty($branches)){
                    $this->data['branches']['']='[--Select--]';
                    foreach($branches as $branch){
                        $this->data['branches'][$branch['br_id']]=$branch['br_name'];
                    }
                }
                $standard = $this->common->getAllStandard($this->data['student']['st_branch']);
                if(!empty($standard)){
                    $this->data['standard']['']='[--Select--]';
                    foreach($standard as $std){
                        $this->data['standard'][$std['std_id']]=$std['std_name'];
                    }
                }
                $batch = $this->common->getAllBatches($this->data['student']['st_class']);
                if(!empty($batch)){
                    $this->data['batch']['']='[--Select--]';
                    foreach($batch as $bat){
                        $this->data['batch'][$bat['batch_id']]=$bat['batch_name'];
                    }
                }
                
            }else if(trim($this->data['user']['user_type'])==444){
                $this->data['parent']=$this->user->getParentDataByID($id);
                $students = $this->user->getAllStudents($this->data['user']['institute_id']);
                if(!empty($students)){
                    $this->data['students']['']='[--Select--]';
                    foreach($students as $student){
                        $this->data['students'][$student['userid']]=trim($student['user_fname']).' '.trim($student['user_lname']);
                    }
                }
            }
            // $editflag = $this->user->editUser($id,)
        }
        $this->load->view('admin/common/header',$this->data);
        $this->load->view('admin/common/left');
        $this->load->view('admin/add_user',$this->data);
        $this->load->view('admin/common/footer');
    }
    
    public function register_next_form($user_type=''){
        $this->data['states']=$this->common->getAllStates();
        $this->data['district']=$this->common->getAllDistricts($this->input->post('th_state'));
        $user_data=$this->session->userdata('user_data');
        if(isset($user_type) && trim($user_type)=='555'){   // For Teachers
            $branches = $this->admin->getBranches(array('inst_id'=>$user_data->institute_id));
            if(!empty($branches)){
                $this->data['branches']['']='[--Select--]';
                foreach($branches as $branch){
                    $this->data['branches'][$branch['br_id']]=$branch['br_name'];
                }
            }
            $this->load->view('admin/teacher_register',$this->data);
        }else if(isset($user_type) && trim($user_type)=='333'){     // For Students
            $branches = $this->admin->getBranches(array('inst_id'=>$user_data->institute_id));
            if(!empty($branches)){
                $this->data['branches']['']='[--Select--]';
                foreach($branches as $branch){
                    $this->data['branches'][$branch['br_id']]=$branch['br_name'];
                }
            }
            $this->data['standard'] = array();
            $this->data['batch'] = array();
            $this->load->view('admin/student_register',$this->data);
        }else if(isset($user_type) && trim($user_type)=='444'){     // For Parents
            $students = $this->user->getAllStudents($user_data->institute_id);
            if(!empty($students)){
                $this->data['students']['']='[--Select--]';
                foreach($students as $student){
                    $this->data['students'][$student['userid']]=trim($student['user_fname']).' '.trim($student['user_lname']);
                }
            }
            $this->load->view('admin/parent_register',$this->data);
        }
    }
    
    public function delete_user($id='',$user_type='') {
        $json=array();
        if($id) {
            $json['id']=$id;
            $result = $this->user->deleteUser($id);
            if($result) {
                if($user_type==555){
                    $this->user->deleteTeacherUser($id);
                }
                $json['success']=true;
                $this->session->set_flashdata('success', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> User deleted successfully !</div>');
            }
        }
        echo json_encode($json);
        exit;
    }

    public function batches(){
        $this->data['module_title'] = 'Batches';
        $this->data['page_title'] = 'TMS-Batches';
        //$user_data=$this->session->userdata('user_data');
        $this->data['method_name'] = __FUNCTION__;
//        $this->data['branches'] = $this->admin->getBatches(array());
        $this->data['branches'] = array();
        $this->load->view('admin/common/header', $this->data);
        $this->load->view('admin/common/left', $this->data);
        $this->load->view('admin/batches', $this->data);
        $this->load->view('admin/common/footer');
    }
    
    public function events($page=0){
        $this->data['module_title'] = 'Events';
        $this->data['page_title'] = 'TMS-Events';  
        $this->data['method_name'] = __FUNCTION__;
        $this->data['post_type'] = 'event';
        $start=$page; $end=PER_PAGE;
        $this->data['events'] = $this->admin->getNotification(array('post_type'=>'event','start'=>$start,'end'=>$end));
        $total = $this->admin->getNotificationCount(array('post_type'=>'event'));
        $this->load->library('pagination');

        $config['base_url'] = site_url("admin/events");
        $config['total_rows'] = $total;        

        $this->pagination->initialize($config);

        $this->data['pagination']=$this->pagination->create_links();
        
        $this->load->view('admin/common/header', $this->data);
        $this->load->view('admin/common/left', $this->data);
        $this->load->view('admin/events', $this->data);
        $this->load->view('admin/common/footer');
    }
    
    public function news($page=0){
        $this->data['module_title'] = 'NEWS';
        $this->data['page_title'] = 'TMS-News';  
        $this->data['method_name'] = __FUNCTION__;
        $this->data['post_type'] = 'news';
        $start=$page; $end=PER_PAGE;
        $this->data['events'] = $this->admin->getNotification(array('post_type'=>'news','start'=>$start,'end'=>$end));
        $total = $this->admin->getNotificationCount(array('post_type'=>'news'));
        $this->load->library('pagination');

        $config['base_url'] = site_url("admin/news");
        $config['total_rows'] = $total;        

        $this->pagination->initialize($config);

        $this->data['pagination']=$this->pagination->create_links();

        $this->load->view('admin/common/header', $this->data);
        $this->load->view('admin/common/left', $this->data);
        $this->load->view('admin/events', $this->data);
        $this->load->view('admin/common/footer');
    }
    
    public function notification($post_type='event',$id=0){
        $this->data['module_title'] = (($post_type=='event') ? 'Event' : 'News');
        $this->data['page_title'] = 'TMS-'.(($post_type=='event') ? 'Event' : 'News');
        $this->data['method_name'] = __FUNCTION__;
        $this->data['post_type'] = $post_type;
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $user_data=$this->session->userdata('user_data');
        $this->data['event'] = $this->admin->getNotification(array('post_type'=>$post_type,'id'=>$id)); 
                
        $post['post_title'] = $this->input->post('post_title');
        $post['post_content'] = $this->input->post('post_content');
        if($post_type=='event'){
            $post['post_start_date'] = $this->input->post('post_start_date');
            $post['post_end_date'] = $this->input->post('post_end_date');
            $this->form_validation->set_rules('post_start_date', 'Start date', 'required');
            $this->form_validation->set_rules('post_end_date', 'End date', 'required');     
        }           
        $post['post_type'] = $post_type;
        
        $post['post_status'] = $this->input->post('post_status');        
        $post['inst_id'] = $user_data->institute_id;
        
        $this->form_validation->set_rules('post_title', 'Title', 'required');        
        $this->form_validation->set_rules('post_content', 'Content', 'required');
           

        if ($this->form_validation->run() == TRUE) {                
                if($this->input->post('post_id')){                   
                    $flag = $this->admin->addNotification($post,$this->input->post('post_id'));
                    if ($flag) {
                        $this->session->set_flashdata('success', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> '.(($post_type=='event') ? 'Event': 'News').' updated successfully !</div>');
                    }
                }else{
                    $post['post_date'] = date('Y-m-d H:i:s');
                    $flag = $this->admin->addNotification($post);
                    if ($flag) {
                        $this->session->set_flashdata('success', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> '.(($post_type=='event') ? 'Event': 'News').' added successfully !</div>');                        
                    }
                }
                redirect('admin/'.(($post_type=='event') ? 'events' : 'news'));
        }        
        
        $this->load->view('admin/common/header',$this->data);
        $this->load->view('admin/common/left');
        $this->load->view('admin/add_notifcation',$this->data);
        $this->load->view('admin/common/footer');
    }
    
    public function delete_event($id=0,$type=''){
        $json=array();
        if($id) {
            $json['id']=$id;
            $result = $this->admin->deleteEvent($id);
            if($result) {
                $json['success']=true;
                $this->session->set_flashdata('success', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> '.(($type=='event') ? 'Event' : 'News').' deleted successfully !</div>');
            }
        }
        echo json_encode($json);
        exit;
    }
    
    public function holidays(){
        $this->data['module_title'] = 'Holidays';
        $this->data['page_title'] = 'TMS-Holidays';  
        $this->data['method_name'] = __FUNCTION__;
        $user_data=$this->session->userdata('user_data');
        $inst_id = $user_data->institute_id;
        $this->data['branches'] = $this->admin->getHolidays($inst_id);
        $this->load->view('admin/common/header',$this->data);
        $this->load->view('admin/common/left');
        $this->load->view('admin/holiday',$this->data);
        $this->load->view('admin/common/footer');
        
    }
    
    }

?>
