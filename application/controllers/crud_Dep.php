<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class Crud_Dep extends CI_Controller {  
      //functions  
      function index(){  
           $data["title"] = "Codeigniter Ajax CRUD with Data Tables and Bootstrap Modals";  
           $this->load->view('crud_view_Dep', $data);  
      }  
      function fetch_user(){  
           $this->load->model("crud_model_Dep");  
           $fetch_data = $this->crud_model_Dep->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                //$sub_array[] = '<img src="'.base_url().'upload/'.$row->image.'" class="img-thumbnail" width="50" height="35" />';  
				$sub_array[] = $row->departmentId;
				$sub_array[] = $row->departmentName;
				$sub_array[] = $row->departmentCode;
                $sub_array[] = '<button type="button" name="update" id="'.$row->departmentId.'" class="btn btn-warning btn-xs">Update</button>';  
                $sub_array[] = '<button type="button" name="delete" id="'.$row->departmentId.'" class="btn btn-danger btn-xs">Delete</button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->crud_model_Dep->get_all_data(),  
                "recordsFiltered"     =>     $this->crud_model_Dep->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }  
 }  