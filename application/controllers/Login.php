<?php
class Login extends CI_Controller{
  function __construct(){
    parent::__construct();
    //$this->load->helper('html');
    $this->load->model('login_model');
  }
 
  function index(){
    $this->load->helper('html');
    $this->load->view('login_view');
  }
  
 
  function auth(){
    $email    = $this->input->post('email',TRUE);
    $password = md5($this->input->post('password',TRUE));
    $validate = $this->login_model->validate($email,$password);
    
    
  
     //if($validate[0]->num_rows() > 0)
     //if ($count($validate) > 0)
     if($validate)
     {
        //$this->session->set_userdata('uid',$validate);
        //return redirect('dashboard');
        // $data  = $validate->row_array();
        //$this->session->set_userdata('uid',$userid);
		//print_r($this->session->set_userdata('uid',$userid));exit;
		//$empId = $data['empId'];
        $user_id = $validate[0]->empId;
        $first_name = $validate[0]->first_name;
        $last_name = $validate[0]->last_name;
        $email = $validate[0]->email;
		$departmentId = $validate[0]->departmentId;
        $name  = $validate[0]->user_name;
        $level = $validate[0]->user_level;
        $profileImage = $validate[0]->profileImage;
        
        
         $sesdata = array(  
		 	'user_id'   => $user_id,
		 	'firstname'   => $first_name,
		 	'lastname'    => $last_name,
		 	'email'        => $email,
		 	'departmentId' => $departmentId,
		 	'username'     => $name,
             'level'        => $level,
             'profileImage' => $profileImage,
             'logged_in'    => TRUE
             
         );
         
         $this->session->set_userdata($sesdata);
         //$this->session->set_userdata($sesdata);
         //print_r($this->session->set_userdata($sesdata));exit;
        // access login for admin
        if($level === '1'){
            //$data = array('status' => "idle");
			//$this->chat_model->update($this->session->userdata('id'),$data);
            redirect('page');
 
        // access login for emp
        }elseif($level === '2'){
            redirect('page/emp');
            //$this->session->set_userdata('uid',$validate);
            //redirect('dashboard');
 
        // access login for author
        }
		//else{
         //   redirect('page/author');
        //}
     }
    
     else{
         echo $this->session->set_flashdata('msg','Username or Password is Wrong');
         redirect('login');
     }


  }
 
  function logout(){
      //$this->session->unset_userdata('uid');
      $this->session->sess_destroy();
      redirect('login');
  }
 
}