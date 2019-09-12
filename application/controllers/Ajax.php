<?php
class Ajax extends CI_Controller {
  
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->database();
    }
 
    public function image()
    {
      $this->load->view('Profile_view');
    }
 
    function ajaxImageStore()  
    {  
         if(isset($_FILES["image_file"]["name"]))  
         {  
              $config['upload_path'] = './upload/';  
              $config['allowed_types'] = 'jpg|jpeg|png|gif';  
              $this->load->library('upload', $config);  
              if(!$this->upload->do_upload('image_file'))  
              {  
                  $error =  $this->upload->display_errors(); 
                  echo json_encode(array('msg' => $error, 'success' => false));
              }  
              else 
              {  
                   /*$data = $this->upload->data(); 
                   $insert['profileImage'] = $data['file_name'];
                   $this->db->insert('tbl_employees',$insert);
                   $getId = $this->db->insert_id();*/

                   $data = $this->upload->data(); 
                   $insert['profileImage'] = $data['file_name'];
                   $id= $this->session->userdata('user_id');
                   $this->db->where('empId', $id);
                   $this->db->update('tbl_employees',$insert);

                
 
                   $arr = array('msg' => 'Image has not uploaded successfully', 'success' => false);
 
                   if($id){
                   $arr = array('msg' => 'Image has been uploaded successfully', 'success' => true);
                   }
                   echo json_encode($arr);
              }  
         }  
    } 
     
}