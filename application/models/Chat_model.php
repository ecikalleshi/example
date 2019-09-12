<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_model extends CI_Model {  
  
	function add_message($message, $nickname, $guid)
	{
		$data = array(
			'message'	=> (string) $message,
			'nickname'	=> (string) $nickname,
			'guid'		=> (string)	$guid,
			'timestamp'	=> time(),
		);
		  
		$this->db->insert('messages', $data);
	}

	//The method get_messages() lets us retrieve all messages written from a specific point in time.
	
	function get_messages($timestamp)
	{
		$this->db->where('timestamp >', $timestamp);
		$this->db->order_by('timestamp', 'DESC');
		// $this->db->limit(10); 
		$query = $this->db->get('messages');

		//foreach ($query->result() as $row)
    	//{
      	//	$results[] = array($row->message,$row->time);
    	//}
    	//return array_reverse($results);

		//$mesg = $query->result_array();
		return array_reverse($query->result_array());
	}

	function getAllEmp()
    {
        //$query = $this->db->query('SELECT user_name FROM tbl_employees');
		//return $query->result();
		
		$this->db->select('user_name');
		$this->db->from('tbl_employees');
		$this->db->where("user_level","2");
		$this->db->where("status","1");
		$query = $this->db->get();
		return $query->result();
	}
	
 	
}
