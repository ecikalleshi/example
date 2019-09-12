<?php
class Chatmode extends CI_Model
{
	function __construct()
	{
		parent::__construct(); 
	}
		
	function getMsg($limit = 10)
	{
		$sql = "SELECT * FROM messages ORDER BY id DESC LIMIT $limit";	
		//print_r($sql);exit;
		return $this->db->query($sql);
		//print_r($sql);exit;

	}
	
	function insertMsg($name, $message, $current)
	{
		$sql = "INSERT INTO messages SET user='$name', msg='$message', time='$current'";
		//print_r($sql);exit;
		return $this->db->query($sql);

	}
}