<?php 
class Profile_model extends CI_Model{
 function show(){
    //$id=120;
    $id= $this->session->userdata('user_id');
    //print_r($id);exit;
    //$query=$this->db->query("SELECT first_name,last_name FROM tbl_employees");
    //print_r($query);exit;
    $query=$this->db->query("SELECT first_name,last_name,email,profileImage FROM tbl_employees WHERE empId='$id'");
    //print_r($query->num_rows());exit;
    //print_r($query->result());exit;
    // print_r($query);exit;
    if($query->num_rows()>0){
        return $query->result();
    }else{
        return FALSE;
    }
    //print_r($query->result());exit;
 }

  function update_data($data){
  //$id=120;
  //$this->db->where('empId', $id);
    $id= $this->session->userdata('user_id');
    $this->db->where('empId', $id);
    if($this->db->update('tbl_employees', $data)){
        return TRUE;
    } 
  }
}