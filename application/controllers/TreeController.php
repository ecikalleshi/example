<?php
//prevents direct access to the controller if the request didn't come through index.php. 
//this is for security purposes
defined('BASEPATH') OR exit('No direct script access allowed');
 
class TreeController extends CI_Controller {
  
   
    public function __construct() 
    {
       parent::__construct();
       if($this->session->userdata('logged_in') !== TRUE)
		{
			redirect('login');
		}
       $this->load->database();
    }
  
   
    public function index()
    {
        $this->load->view('tree');
    }
   
   
    public function getItem()
    {
          $data = [];
          $id_dep = '0'; //pass the parent key of all the child under the specific key
          $row = $this->db->query('SELECT departmentId, departmentName, departmentCode from tbl_departments');
            
          if($row->num_rows() > 0)
          {
              $data = $this->membersTree($id_dep);
          }else{
              $data=["departmentId"=>"0","departmentName"=>"No Members present in list","text"=>"No Members is present in list","nodes"=>[]];
          }
   
          echo json_encode(array_values($data));
    }
   
    function emp_data(){
        $hasil=$this->db->get_where('tbl_employees',array('user_level'=>'2'));
		$data=$hasil->result();
		echo json_encode($data);
    }
    
    function emp_info()
    {
        $id_dep = $this->input->post('id'); //parameter passed using Ajax
        $data = [];
        $hasil=$this->db->get_where('tbl_employees',array('user_level'=>'2','departmentId'=>"$id_dep"));
		$data=$hasil->result();
		echo json_encode($data);
    }
    
   
    public function membersTree($id_dep)
    {
        $row1 = [];
        // Fetch the all data which comes under the parent_key
        $row = $this->db->query('SELECT departmentId, departmentName, departmentCode from tbl_departments WHERE id_dep="'.$id_dep.'"')->result_array();
         //assign the current element's key to the $key variable on each iteration
        foreach($row as $key => $value)
        {
           $departmentId = $value['departmentId'];
           $row1[$key]['departmentId'] = $value['departmentId'];
           $row1[$key]['departmentName'] = $value['departmentName'];
           $row1[$key]['text'] = $value['departmentName'];
		   //$row1[$key]['departmentCode'] = $value['departmentCode'];
           //$row1[$key]['text'] = $value['departmentCode'];
           $row1[$key]['nodes'] = array_values($this->membersTree($value['departmentId']));
        }
        //Creating Tree by all fetched value and make a tree format of bootstrap
  
        return $row1; // Return all the value to index() method.
    }
      
}