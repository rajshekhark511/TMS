<?php
class CommonModel extends CI_Model{

    function getAllStates($country_id='') {
        $this->db->select('*');
        $this->db->from(TBL_STATES . ' AS ts '); // I use aliasing make things joins easier
        if($country_id){
            $this->db->where('ts.country_id', $country_id);
            $result = $this->db->get();
             return $result->row_array();
        }else{
            $result = $this->db->get();
             return $result->result_array();
        }
    }

    function getAllDistricts($state_id='') {
        $this->db->select('*');
        $this->db->from(TBL_DISTRICT . ' AS td '); // I use aliasing make things joins easier
        if($state_id){
            $this->db->where('td.state_id', $state_id);
        }
         $result = $this->db->get();
         return $result->result_array();
    }

    function getAllCities($district_id){
         $this->db->select('*');
        $this->db->from(TBL_CITY . ' AS tc '); // I use aliasing make things joins easier
        if($district_id){
            $this->db->where('tc.district_id', $district_id);
        }
         $result = $this->db->get();
         
         return $result->result_array();
    }

    function getUserRoles($role_id=''){
         $this->db->select('*');
        $this->db->from(TBL_ROLES . ' AS tr '); // I use aliasing make things joins easier
       if($role_id){
            $this->db->where('tr.role_id', $role_id);
            $result = $this->db->get();
             return $result->row_array();
        }else{
             $result = $this->db->get();
             return $result->result_array();
        }
    }

    public function updateUserLog($data=array(),$user_id='') {
        if($user_id)
            $this->db->where('user_id',$user_id)->order_by('log_id','DESC')->limit(1)->update(TBL_LOG, $data);
        else
            $this->db->insert(TBL_LOG, $data);        
                
    }

    public function getUserLog() {
        $result=$this->db->select('*')
                 ->from(TBL_LOG)
                 ->where('user_id',$this->session->userdata('userId'))
                 ->order_by('log_id','DESC')
                 ->limit(1,1)
                 ->get();        
     return $result->row_array();
    }
    
    public function getAllBranches($institute_id='',$branch_id=''){
        $this->db->select('*');
        $this->db->from(TBL_BRANCHES . ' AS tb '); // I use aliasing make things joins easier
        if($branch_id){
            $this->db->where('tb.br_id', $branch_id);
            $result = $this->db->get();
            return $result->row_array();
        }else{
            $this->db->where('tb.inst_id', $institute_id);
            $result = $this->db->get();
            return $result->result_array();
        }
    }
    
    public function getAllStandard($branch_id='',$standard_id=''){
        $this->db->select('*');
        $this->db->from(TBL_STANDARD . ' AS ts '); // I use aliasing make things joins easier
        if($standard_id){
            $this->db->where('ts.br_id', $branch_id);
            $result = $this->db->get();
             return $result->row_array();
        }else{
            $this->db->where('ts.br_id', $branch_id);
            $result = $this->db->get();
             return $result->result_array();
        }
    }
    
    public function getAllBatches($standard_id='',$batch_id=''){
        $this->db->select('*');
        $this->db->from(TBL_BATCHES . ' AS tb '); // I use aliasing make things joins easier
        if($batch_id){
            $this->db->where('tb.batch_id', $batch_id);
            $result = $this->db->get();
            return $result->row_array();
        }else{
            $this->db->where('tb.std_id', $standard_id);
            $result = $this->db->get();
            return $result->result_array();
        }
    }
    
    public function isLogged(){
        if($this->session->userdata('userId')){
           if ($this->session->userdata('userType') == 111) {   // Super Admin
                redirect('super_admin/home');
                exit;
           }else if($this->session->userdata('userType') == 222) {
               redirect('admin/home');
                exit;
           }
        }
    }
    
}

?>
