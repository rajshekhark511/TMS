<?php
class User extends CI_Controller{
    
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
            $this->data['photo']=base_url('images/'.$this->session->userdata('userphoto'));
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
    
    public function Index(){
        $this->load->view('teacher/common/header', $this->data);        
        $this->load->view('teacher/home');        
        $this->load->view('teacher/common/footer');
    }
    
    public function tution(){
        $branches = $this->admin->getBranches(array('inst_id'=>$this->session->userdata('instituteId')));
        if(!empty($branches)){
            $this->data['branches']['']='[--Select--]';
            while(list($branchKey,$branchVal) = each($branches)){
                $this->data['branches'][$branchVal['br_id']]=$branchVal['br_name'];
            }
        }
        $standard = $this->common->getAllStandard($this->session->userdata('branchId'));
        if(!empty($standard)){
            $this->data['standard']['']='[--Select--]';
            while(list($stdKey,$stdVal) = each($standard)){
                $this->data['standard'][$stdVal['std_id']]=$stdVal['std_name'];
            }
        }
        $this->data['branchId'] = $this->session->userdata('branchId');
        $this->load->view('teacher/common/header', $this->data);     
        $this->load->view('teacher/common/left-menu', $this->data);
        $this->load->view('teacher/tution', $this->data);        
        $this->load->view('teacher/common/footer');
    }
    
    public function feedback() {
        //Form validation and post data
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');                

        $this->form_validation->set_rules('userName', 'User name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');


        if ($this->form_validation->run() == TRUE) {
            $feedback = array();
            $feedback['fd_name'] = $this->input->post('userName');
            $feedback['fd_email'] = $this->input->post('email');
            $feedback['fd_phone'] = $this->input->post('phone');
            $feedback['fd_subject'] = $this->input->post('subject');
            $feedback['fd_message'] = $this->input->post('message');
            $feedback['fd_status'] = 1;
            $feedback['fd_date'] = date('Y-m-d H:i:s');
            $result = $this->user->addFeedBack($feedback);
            if ($result) 
                $this->session->set_flashdata('success', '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button><strong>Success!</strong> Thank you for your valuable feedback. We will get back to you asap !</div>');
        }
        
        $this->load->view('teacher/common/header', $this->data);        
        $this->load->view('teacher/feedback');        
        $this->load->view('teacher/common/footer');
    }
}

