<?php
class Home extends CI_Controller{

    public function __construct() {
        parent::__construct();        
        $this->load->model('homemodel', 'hmodel');
        $this->load->model('commonmodel', 'common');
    }
    
    public function index(){
        $this->common->isLogged();
        $this->load->helper('form');
        $this->load->view('common/header');
        $this->load->view('common/css');                
        $this->load->view('home');
        $this->load->view('common/js');
        $this->load->view('common/footer');
    }

    

    public function authenticate(){
        $this->common->isLogged();
        $flag = NULL;
        $this->load->library('form_validation');        
        $data['user_email'] = $this->input->post('user_email');
        $data['user_password'] = $this->input->post('user_password');
        $this->form_validation->set_rules('user_email', 'Email Address', 'valid_email|required');
        $this->form_validation->set_rules('user_password', 'Password', 'required|min_length[4]');        
        if ($this->form_validation->run() == TRUE) {
            $flag = $this->hmodel->verifyUser($data);
        }
        
        if ($flag == '2') { // Inactivate user
            $this->session->set_flashdata('Unauthorised', 'Please activate your account.You must click on the validation link that was sent to you.');
            redirect('');
        } else if ($flag == "1") {  // Activate user
            $this->load->model('usermodel', 'umodel');
            $result = $this->umodel->getUser($data);
            $name = $result->user_fname . " " . $result->user_lname;
            
            $this->session->set_userdata('userId', $result->userid);
            $this->session->set_userdata('userEmail', $result->user_email);
            $this->session->set_userdata('userType', $result->user_type);            
            $this->session->set_userdata('userRole', $result->role_name);
            $this->session->set_userdata('username', ucwords($name));            
            $this->session->set_userdata('userphoto',$result->user_photo);
            $this->session->set_userdata('instituteId',$result->institute_id);
            $this->session->set_userdata('user_data', $result);

            $this->common->updateUserLog(array('log_ip'=>$_SERVER['REMOTE_ADDR'],'log_date'=>date('Y-m-d H:i:s'),'log_browser'=>$_SERVER['HTTP_USER_AGENT'],'user_id'=>$result->userid));            
            if ($this->session->userdata('userType') == 111) {   // Super Admin
                redirect('super_admin/home');
                exit;
            }else if ($this->session->userdata('userType') == 222) {   //Admin
                redirect('admin/home');
                exit;
            }else {   
                if($this->session->userdata('userType') == 555){        // Teacher
                    $teacherResult = $this->umodel->getTeacherDataByID($result->userid);
                    $this->session->set_userdata('branchId', $teacherResult['th_branch']);
                }
                redirect('user');
                exit;
            }
        } else {
            $this->session->set_flashdata('invaliduser', 'Email or Password does not match.');
            redirect('');
        }
    }

    public function logout() {     
        $this->common->updateUserLog(array('log_out_date'=>date('Y-m-d H:i:s')),$this->session->userdata('userId'));
        $this->session->unset_userdata('userId');
        $this->session->unset_userdata('userEmail');
        $this->session->unset_userdata('userType');
        $this->session->unset_userdata('username');
        redirect('home');
    }
   
}

?>
