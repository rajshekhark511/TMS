<?php
class SuperAdminModel extends CI_Model {

    public function getInstitute($id=''){
         $this->db
                    ->select('*')
                    ->from(TBL_INSTITUTE.' AS ti ')                    
                    ->join(TBL_DISTRICT.' AS td ', 'td.d_id = ti.inst_district')
                    ->join(TBL_STATES.' AS ts ', 'ts.state_id = ti.inst_state')
                    ->where('ti.inst_del_status',1);
         if($id){
             $this->db->where('ti.inst_id',(int)$id);
         }         
         $result=$this->db->get();
         if($id){
             return $result->row_array();
         }else{
            return $result->result_array();
         }        
    }

    public function registerInstitute($instituteData=array(),$id=''){
        if(isset($instituteData) && !empty($instituteData)){
            if($id){
                $result=$this->db->where('inst_id', $id)->update(TBL_INSTITUTE,$instituteData);
                return true;
            }else{
                $flag = $this->db
                    ->set($instituteData)
                    ->insert(TBL_INSTITUTE);
                return $this->db->insert_id();
            }
            
        }
    }

    public function deleteInstitute($id){        
        $this->db->where('inst_id', $id)->update(TBL_INSTITUTE, array('inst_del_status'=>0));
        return true;
    }

    /*
     * This function return all feedbacks
     * @returns feedbacks array
     */
    public function getFeedbacks() {
        $result = $this->db
                        ->select('*')
                        ->from(TBL_FEEDBACK)
                        ->order_by('fd_date', 'desc')
                        ->get();
        
        if($result)
           return $result->result_array();
        return array();
    }
}

?>
