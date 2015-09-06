<?php
class Common extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('userId')) {
            
        }
        $this->load->model('commonmodel', 'common');
    }

    // Get district onchange of state
    public function district($state_id=''){
        $json=array();
        $json['district'] = $this->common->getAllDistricts($state_id);
         echo json_encode($json);exit;
    }

    // Get city onchange of district
    public function city($district_id=''){
        $json=array();
        $json['city'] = $this->common->getAllCities($district_id);
         echo json_encode($json);exit;
    }

    public function profile_photo(){
        $json=array();
        if(isset($_FILES['upload-profile-file']) && trim($_FILES['upload-profile-file']['tmp_name'])) {
            $this->load->model('usermodel', 'user');
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

                if(!$this->upload->do_upload('upload-profile-file')) {
                    $json['error']="file uplaod error";
                }else {           
                    if(file_exists(PHOTO_UPLOAD_PATH.'/'.$this->session->userdata('userphoto'))){
                        unlink(PHOTO_UPLOAD_PATH.'/'.$this->session->userdata('userphoto'));
                    }
                    $logo_data=$this->upload->data();
                    $userData['user_photo'] = 'user/'.$this->session->userdata('username').$this->session->userdata('userId').'/'.$logo_data['file_name'];
                    $flag = $this->user->editUser($this->session->userdata('userId'),$userData);
                    $this->session->set_userdata('userphoto','user/'.$this->session->userdata('username').$this->session->userdata('userId').'/'.$logo_data['file_name']);                    
                    $json['file']=base_url('images/'.'user/'.$this->session->userdata('username').$this->session->userdata('userId').'/'.$logo_data['file_name']);
                }
                
            }
            echo json_encode($json);exit;
    }
    
        // Get city onchange of district
    public function standard($branch_id=''){
        $json=array();
        $json['standards'] = $this->common->getAllStandard($branch_id);
        echo json_encode($json);exit;
        //print_r($json);
    }
    
    //This function is used for fetching batches of selectd standard
    public function batches($standard_id=''){
        $json=array();
        $json['batches'] = $this->common->getAllBatches($standard_id);
        echo json_encode($json);exit;
        //print_r($json);
    }
}
?>
