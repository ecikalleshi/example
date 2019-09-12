<?php
class Emp_model extends CI_Model{

	function emp_list()
	{
		$hasil=$this->db->get_where('tbl_employees',array('user_level'=>'2'));
		return $hasil->result();
	}

	/*
	function EmpList()
	{
		$this->db->select('empId,user_name,profileImage');
		$this->db->from('tbl_employees');
		$this->db->where("user_level","2");
		$this->db->where("status","1");
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}*/

	/*public function GetName($id)
	{  
 		$this->db->select('empId,user_name');
		$this->db->from('tbl_employees');
		$this->db->where("id",$id);
		$this->db->limit(1);
  		$query = $this->db->get();
		$res = $query->row_array();
 		return $res['user_name']; 
	}*/
	   
	function save_emp()
	{
		$data = array(
		//'empId'      	=> $this->input->post('empId'),
		'first_name' 	=> $this->input->post('first_name'),
		'last_name' 	=> $this->input->post('last_name'),
		'email'			=> $this->input->post('email'), 
		'user_level'    => $this->input->post('user_level'), 
		//'departmentId'	=> $this->input->post('departmentId'),
		);

		$result=$this->db->insert('tbl_employees',$data);
		return $result;
	}

	function update_emp()
	{
		$empId=$this->input->post('empId');
		$first_name=$this->input->post('first_name');
		$last_name=$this->input->post('last_name');
		$email=$this->input->post('email');
		//$departmentId=$this->input->post('departmentId');

		$this->db->set('empId', $empId);
		$this->db->set('first_name', $first_name);
		$this->db->set('last_name', $last_name);
		$this->db->set('email', $email);
		//$this->db->set('departmentId', $departmentId);
		$this->db->where('empId', $empId);
		$result=$this->db->update('tbl_employees');
		return $result;
	}

	function delete_emp()
	{
		$empId=$this->input->post('empId');
		$this->db->where('empId', $empId);
		$result=$this->db->delete('tbl_employees');
		return $result;
	}
	
}