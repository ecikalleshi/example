<?php
class Login_model extends CI_Model{
 
  function validate($email,$password){
    $this->db->where('email',$email);
    $this->db->where('user_password',$password);
    $query = $this->db->get('tbl_employees',1);
    $num = $this->db->count_all_results('tbl_employees');
    $data = $query->result();
    return  $data;
  }

  // public function validate($email,$password){

  //   $this->db->where('email', $email);
  //   $this->db->where('user_password', $password);
  //   // Run the query
  //   $query = $this->db->query("SELECT * FROM tbl_employees;");
  //   $data = $query->result();
  //   print_r($data);exit;

  //   $query = $this->db->get('tbl_employees')->result_array();
   
    

  //   print($query);exit;

  //   // Let's check if there are any results
  //   if($query->num_rows == 1)
  //   {
  //     // If there is a user, then create session data
  //     $row = $query->row();
  //     $data = array(
        
  //       'userid' => $row->userid,
  //       'fname' => $row->fname,
  //       'lname' => $row->lname,
  //       'username' => $row->username,
  //       'validated' => true
  //     );
  //      $this->session->set_userdata($data);
  //       return true;
  //     }
  //     return false;
  // }
 
}