<?php 
  class Profile extends CI_Controller{
   function __construct(){
   parent::__construct();
   $this->load->helper('html');
   }
   function display(){
    //  print_r($this->session->userdata);exit;
    //$this->load->helper('html');
    $this->load->view('profile_view');
   }
   function data_display(){
    $this->load->model('profile_model');
    $profile=$this->profile_model->show();
    if($profile){
    $data=array(
     'first_name'=>$profile[0]->first_name,
     'last_name'=>$profile[0]->last_name,
     'email'    =>$profile[0]->email,
     'profileImage'=>$profile[0]->profileImage
     //'dob'=>$profile[0]->dob,
     //'profileImage'=>$profile[0]->profileImage
    );
    $this->load->view('profile_view',$data);
    }else{
    $data['profile_err']="No data to display";
    $this->load->view('profile_view',$data);
    }
   }
   function update_data() {
    $data_session = array(
     'firstname' => $this->input->post('firstname'),
     'lastname' => $this->input->post('lastname'),
     'email'    => $this->input->post('email')
     //'profileImage'=>$this->input->post('profileImage')
    );
    $data = array(
     'first_name' => $this->input->post('firstname'),
     'last_name' => $this->input->post('lastname'),
     'email'    => $this->input->post('email')
     //'profileImage'=>$this->input->post('profileImage')
    );

    $this->session->set_userdata($data_session);
    // $id = $this->session->userdata('firstname');
    $this->load->model('profile_model');
    if($this->profile_model->update_data($data))
        //{
            $this->data_display();
      //  $this->session->set_flashdata('success','Profile updated successfully.');
    //}
    //else {
       // $this->session->set_flashdata('error', 'Something went wrong. Please try again with valid format.');
    //redirect('user_profile');
    //}
  }
}
 ?>