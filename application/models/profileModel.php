<?php
class ProfileModel extends CI_Model {

    function getUserDetails($userId='') {
        $this->db->select('tu.*,tuinfo.*,bar.*,state.state,city.city');
        $this->db->from(TBL_USER . ' AS tu '); // I use aliasing make things joins easier
        $this->db->join(TBL_USR_INFO . ' AS tuinfo ', ' tuinfo.usr_id = tu.usr_id', 'LEFT');
        $this->db->join(TBL_BAR .' AS bar', ' bar_user_id = tu.usr_id', 'LEFT');
        $this->db->join(TBL_STATE.' AS state ', ' bar.bar_state = state.state_id', 'LEFT');
        $this->db->join(TBL_CITY .' AS city', ' bar.bar_city = city.city_id', 'LEFT');
        $this->db->where('tu.usr_id', $userId);
        $result = $this->db->get();
        return $result->row();
    }

}

?>
