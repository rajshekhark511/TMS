<?php

class UserModel extends CI_Model {

    public function getUser($usrDetails=array()) {
        $q = $this->db
                ->select('*')
                ->from(TBL_USER)
                ->join(TBL_ROLES, 'role_id = user_type')
                ->where('user_email', $usrDetails['user_email'])
                ->where('user_password', md5($usrDetails['user_password']))
                ->limit(1)
                ->get();
        if ($q->num_rows > 0) {
            return $q->row();
        }
        return false; //IF USER STATUS IS NOT ACTIVE
    }

    public function getUserByID($id) {
        $q = $this->db
                ->select('*')
                ->from(TBL_USER)
                ->join(TBL_ROLES, 'role_id = user_type')
                ->where('userid', $id)
                ->limit(1)
                ->get();
        if ($q->num_rows > 0) {
            return $q->row_array();
        }
        return false; 
    }
    
    public function getTeacherDataByID($id){
        $q = $this->db
                ->select('*')
                ->from(TBL_USER)
                ->join(TBL_ROLES, 'role_id = user_type')
                ->join(TBL_TEACHER, 'user_id = userid')
                ->where('userid', $id)
                ->limit(1)
                ->get();
        if ($q->num_rows > 0) {
            return $q->row_array();
        }
        return false; 
    }
    
    public function getStudentDataByID($id){
        $q = $this->db
                ->select('*')
                ->from(TBL_USER)
                ->join(TBL_ROLES, 'role_id = user_type')
                ->join(TBL_STUDENT, 'user_id = userid')
                ->where('user_id', $id)
                ->limit(1)
                ->get();
        if ($q->num_rows > 0) {
            return $q->row_array();
        }
        return false; 
    }
    
    public function getParentDataByID($id){
        $q = $this->db
                ->select('*')
                ->from(TBL_USER)
                ->join(TBL_ROLES, 'role_id = user_type')
                ->join(TBL_PARENT, 'user_id = userid')
                ->where('user_id', $id)
                ->limit(1)
                ->get();
        if ($q->num_rows > 0) {
            return $q->row_array();
        }
        return false; 
    }

    public function addUser($userData=array(),$user_type='') {        
        if(isset($userData) && !empty($userData)) {
            if(isset($user_type) && $user_type==555){
                $tableName = TBL_TEACHER;
            }else if(isset($user_type) && $user_type==333){
                $tableName = TBL_STUDENT;
            }else if(isset($user_type) && $user_type==444){
                $tableName = TBL_PARENT;
            }else{
                $tableName = TBL_USER;
            }
            $flag = $this->db
                    ->set($userData)
                    ->insert($tableName);            
            return $this->db->insert_id();
        }
    }

    public function getAllUser($userData,$user_type='') {
        $this->db->select('*')
                ->from(TBL_USER.' AS tu ')
                ->join(TBL_ROLES.' AS tr ', 'tr.role_id = tu.user_type')
                ->join(TBL_INSTITUTE.' AS ti ', 'tu.institute_id = ti.inst_id');
        if(trim($userData->user_type)==111){    // If login user is Super Admin
                $this->db->where('user_type', 222);             
        }else if(trim($userData->user_type)==222){  // If login user is Institute Admin
                if(trim($user_type)!=''){
                    if(trim($user_type)==555){
                        $this->db->join(TBL_TEACHER.' AS tt ', 'tu.userid = tt.user_id');
                        $this->db->where('tu.institute_id', $userData->institute_id);
                        $this->db->where('tu.user_type', $user_type);
                    }else if(trim($user_type)==333){
                        $this->db->join(TBL_STUDENT.' AS ts ', 'tu.userid = ts.user_id');
                        $this->db->join(TBL_STANDARD.' AS tst ', 'ts.st_class = tst.std_id');
                        $this->db->join(TBL_BATCHES.' AS tb ', 'ts.st_batch = tb.batch_id');
                        $this->db->where('tu.institute_id', $userData->institute_id);
                        $this->db->where('tu.user_type', $user_type);
                    }else if(trim($user_type)==444){
                        $this->db->join(TBL_PARENT.' AS tp ', 'tp.studentid = tu.userid');
                        $this->db->where('tu.institute_id', $userData->institute_id);
                        $this->db->where('tu.user_type', 333);
                    }
                }
        }
        $query = $this->db->get();
        //echo $this->db->last_query(); 
        if ($query->num_rows > 0) {
            return $query->result_array();
        }
        return false; //IF USER STATUS IS NOT ACTIVE
    }
    
    public function getAllStudents($instituteId) {
        $this->db->select('*')
                ->from(TBL_USER)
                ->join(TBL_ROLES, 'role_id = user_type')
                ->join(TBL_INSTITUTE, 'institute_id = inst_id')
                ->join(TBL_STUDENT, 'userid = user_id');
        $this->db->where('institute_id', $instituteId);
        $query = $this->db->get();
        //echo $this->db->last_query(); 
        if ($query->num_rows > 0) {
            return $query->result_array();
        }
        return false; //IF USER STATUS IS NOT ACTIVE
    }

    public function editUser($id, $data,$user_type='') {
        if($user_type!='' && $user_type==555){
            $this->db->where('user_id', $id);
            $result = $this->db->update(TBL_TEACHER, $data);
            return $result;
        }else if($user_type!='' && $user_type==333){
            $this->db->where('user_id', $id);
            $result = $this->db->update(TBL_STUDENT, $data);
            return $result;
        }else if($user_type!='' && $user_type==444){
            $this->db->where('user_id', $id);
            $result = $this->db->update(TBL_PARENT, $data);
            return $result;
        }else{
            $this->db->where('userid', $id);
            $result = $this->db->update(TBL_USER, $data);
            return $result;
        }
    }

    public function deleteUser($id){
        $this->db->where('userid', $id)->delete(TBL_USER);
        return true;
    }
    
    public function deleteTeacherUser($id){
        $this->db->where('user_id', $id)->delete(TBL_TEACHER);
        return true;
    }
    /*
     * This method is used add feedback 
     * @params Feedback array
     * $return Boolean true and false 
     */
    public function addFeedBack($data = array()) { 
        if (!empty($data)) {
            $flag = $this->db
                    ->set($data)
                    ->insert(TBL_FEEDBACK);            
            return (($flag) ?  $this->db->insert_id() : false);
        }
        return false;
    }

}

?>
