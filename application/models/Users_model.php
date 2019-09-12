<?php
	class Users_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function login($email, $password){
			$query = $this->db->get_where('tbl_employees', array('email'=>$email, 'user_password'=>$password));
			return $query->row_array();
		}

	}
?>