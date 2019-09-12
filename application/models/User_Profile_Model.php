<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_Profile_Model extends CI_Model{

public function getprofile($userid){
       $this->db->select('first_name,last_name,email');
       $this->db->where(array('empId'=>$userid);
      // $this->db->where(array('profile_details.profile_id'=>$id));
       $this->db->from('tbl_employees');
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
        return $query->row();
    }
  //return $query->row();  
  //return $query->result_array();
  //return $query->result();
}

public function update_profile($fname,$lname,$userid){
$data = array(
               'first_name' =>$fname,
               'last_name' => $lname
            );

$sql_query=$this->db->where('empId', $userid)
                ->update('tbl_employees', $data); 


}


}