<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class User_profile extends CI_Controller {
function __construct(){
parent::__construct();
//$this->load->library('form_validation');
if(! $this->session->userdata('uid'))
redirect('login');
$this->load->model('User_Profile_Model');
}


 
public function index(){
	$this->load->helper('html');
$userid = $this->session->userdata('uid');
$profiledetails=$this->User_Profile_Model->getprofile($userid);
$this->load->view('user_profile',['profile'=>$profiledetails]);
}


public function updateprofile(){
$this->form_validation->set_rules('first_name','First Name','required|alpha');
$this->form_validation->set_rules('last_name','Last Name','required|alpha');

if($this->form_validation->run()){
$fname=$this->input->post('first_name');
$lname=$this->input->post('last_name');
$userid = $this->session->userdata('uid');
$this->User_Profile_Model->update_profile($fname,$lname,$userid);
$this->session->set_flashdata('success','Profile updated successfull.');
return redirect('user_profile');

} else {
	$this->session->set_flashdata('error', 'Something went wrong. Please try again with valid format.');
redirect('user_profile');
}

}
}
