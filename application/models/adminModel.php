<?php

class AdminModel extends CI_Model {

    public function getBranches($filter=array()) {
        $this->db->select('b.*,s.name as state,d.d_name as district,i.inst_name')
                ->from(TBL_BRANCHES . ' AS b ')
                ->join(TBL_DISTRICT . ' AS d ', 'd.d_id = b.br_district')
                ->join(TBL_STATES . ' AS s ', 's.state_id = b.br_state')
                ->join(TBL_INSTITUTE . ' AS i ', 'i.inst_id = b.inst_id')
                ->where('br_delete_status', '1');
        if (isset($filter['id']) && $filter['id']) {
            $this->db->where('br_id', $filter['id']);
        }
        if (isset($filter['inst_id']) && $filter['inst_id']) {
            $this->db->where('b.inst_id', $filter['inst_id']);
        }
        $result = $this->db->get();
        if (isset($filter['id']) && $filter['id']) {
            return $result->row_array();
        } else {
            return $result->result_array();
        }
    }

    public function addBranch($data=array(),$id=''){
        if($id)
            $result=$this->db->where('br_id', $id)->update(TBL_BRANCHES,$data);
        else
            $result=$this->db->insert(TBL_BRANCHES,$data);
        return true;
    }

    public function deleteBranch($id=''){
        $this->db->where('br_id', $id)->update(TBL_BRANCHES, array('br_delete_status'=>0));
        return true;
    }

    public function getStandards($filter=array()){
        $this->db->select('s.*,b.br_name')
                        ->from(TBL_STANDARD . ' AS s ')
                        ->join(TBL_BRANCHES . ' AS b', 'b.br_id = s.br_id')
                        ->join(TBL_INSTITUTE . ' AS i', 'b.inst_id = i.inst_id')
                        ->where('std_del_status', '1');
        if (isset($filter['id']) && $filter['id']) {
            $this->db->where('std_id', $filter['id']);
        }
        if (isset($filter['inst_id']) && $filter['inst_id']) {
            $this->db->where('i.inst_id', $filter['inst_id']);
        }
        if (isset($filter['br_id']) && $filter['br_id']) {
            $this->db->where('b.br_id', $filter['br_id']);
        }
        $result =$this->db->get();
        //echo $this->db->last_query();exit;
        if (isset($filter['id']) && $filter['id']) {
            return $result->row_array();
        } else {
            return $result->result_array();
        }
    }

    public function addStandard($data=array(),$id=''){
        if($id)
            $result=$this->db->where('std_id', $id)->update(TBL_STANDARD,$data);
        else
            $result=$this->db->insert(TBL_STANDARD,$data);
        return true;
    }

    public function deleteStandard($id){
        $this->db->where('std_id', $id)->update(TBL_STANDARD, array('std_del_status'=>0));
        return true;
    }

    public function getSubjects($filter=array()){
        $this->db->select('sb.*,b.br_name') //,s.std_name
                        ->from(TBL_SUBJECT . ' AS sb ')
                        //->join(TBL_STANDARD . ' AS s', 's.std_id = sb.std_id')
                        ->join(TBL_BRANCHES . ' AS b', 'b.br_id = sb.br_id')
                        ->join(TBL_INSTITUTE . ' AS i', 'b.inst_id = i.inst_id')
                        ->where('sub_del_status', '1')
                        ->order_by("sub_id", "desc"); 
        if (isset($filter['id']) && $filter['id']) {
            $this->db->where('sub_id', $filter['id']);
        }
        if (isset($filter['inst_id']) && $filter['inst_id']) {
            $this->db->where('i.inst_id', $filter['inst_id']);
        }
        $result =$this->db->get();
        //echo $this->db->last_query();exit;
        if (isset($filter['id']) && $filter['id']) {
            return $result->row_array();
        } else {
            return $result->result_array();
        }
    }

    public function addSubject($data=array(),$id=''){
       if($id)
            $result=$this->db->where('std_id', $id)->update(TBL_SUBJECT,$data);
        else
            $result=$this->db->insert(TBL_SUBJECT,$data);
        return true;
    }

    public function deleteSubject($id){
        $this->db->where('sub_id', $id)->update(TBL_SUBJECT, array('sub_del_status'=>0));
        return true;
    }
    
    public function addNotification($data=array(),$id=0){
        if($id) 
            $result=$this->db->where('post_id', $id)->update(TBL_POST,$data);
        else
            $result=$this->db->insert(TBL_POST,$data);
        return true;
    }
    
    public function getNotificationCount($filter=array()){
        $this->db->select('p.*,i.inst_name') //,s.std_name
                        ->from(TBL_POST . ' AS p ')                        
                        ->join(TBL_INSTITUTE . ' AS i', 'p.inst_id = i.inst_id')                        
                        ->order_by("post_id", "desc"); 
        if (isset($filter['id']) && $filter['id']) {
            $this->db->where('post_id', $filter['id']);
        }
        if (isset($filter['post_type']) && $filter['post_type']) {
            $this->db->where('p.post_type', $filter['post_type']);
        }        
        $result =$this->db->get();        
        return $result->num_rows();
    }
    
    public function getNotification($filter=array()){
        $this->db->select('p.*,i.inst_name') //,s.std_name
                        ->from(TBL_POST . ' AS p ')                        
                        ->join(TBL_INSTITUTE . ' AS i', 'p.inst_id = i.inst_id')                        
                        ->order_by("post_id", "desc"); 
        if (isset($filter['id']) && $filter['id']) {
            $this->db->where('post_id', $filter['id']);
        }
        if (isset($filter['post_type']) && $filter['post_type']) {
            $this->db->where('p.post_type', $filter['post_type']);
        }
        $end=isset($filter['end']) ? $filter['end'] : 1;
        $start=isset($filter['start']) ? $filter['start'] : 0;
        $this->db->limit($end,$start);
        
        $result =$this->db->get();       
        
        if (isset($filter['id']) && $filter['id']) {
            return $result->row_array();
        } else {
            return $result->result_array();
        }
    }
    
    public function deleteEvent($id){
        $this->db->where('post_id', $id)->delete(TBL_POST);
        return true;        
    }
    
    public function getBatches($filter=array()) {
        $this->db->select('b.*,s.name as state,d.d_name as district,i.inst_name')
                ->from(TBL_BATCHES . ' AS b ')
                ->join(TBL_DISTRICT . ' AS d ', 'd.d_id = b.br_district')
                //->join(TBL_DISTRICT . ' AS d ', 'd.d_id = b.br_district')
                ->join(TBL_STATES . ' AS s ', 's.state_id = b.br_state')
                ->join(TBL_INSTITUTE . ' AS i ', 'i.inst_id = b.inst_id')
                ->where('br_delete_status', '1');
        if (isset($filter['id']) && $filter['id']) {
            $this->db->where('br_id', $filter['id']);
        }
        if (isset($filter['inst_id']) && $filter['inst_id']) {
            $this->db->where('b.inst_id', $filter['inst_id']);
        }
        $result = $this->db->get();
        if (isset($filter['id']) && $filter['id']) {
            return $result->row_array();
        } else {
            return $result->result_array();
        }
    }
    
    public function getHolidays($inst_id){
        
    }
}

?>
