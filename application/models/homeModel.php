<?php
class HomeModel extends CI_Model{
    
    public function verifyUser($usrDetails=array()) {
        $q = $this
                ->db
                ->where('user_email', $usrDetails['user_email'])
                ->where('user_password', md5($usrDetails['user_password']))
                ->limit(1)
                ->get(TBL_USER);
           
        if ($q->num_rows > 0) {
            $result=$q->row();
            if($result->user_status=='1'){
                return "1"; //if user not activated his account
            }else if($result->user_status=='0'){
                return "2";
            }
        }
        return false; //IF USER STATUS IS NOT ACTIVE
    }
}

?>
