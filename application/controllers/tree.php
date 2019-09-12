<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class tree extends CI_Controller{
	
function __construct(){
		parent::__construct();
		$this->load->model('tree_model');
	}
	
	function index(){
		$this->load->view('show_tree');
	}
	
function show_tree()
    {
        $this->form_validation->set_error_delimiters("", "");
        $this->form_validation->set_rules('node', 'node ', 'trim|required');
    
        if($this->form_validation->run()== false){
            $this->load->view('show_tree');
        }else{
            redirect('tree/show_tree/');
        }
    }
	

	
	
function getChildren()
    {
        $result = $this->tree_model->tree_all();

        $itemsByReference = array();

// Build array of item references:
        foreach($result as $key => &$item) {
            $itemsByReference[$item['departmentId']] = &$item;
            // Children array:
            $itemsByReference[$item['departmentId']]['children'] = array();
            // Empty data class (so that json_encode adds "data: {}" )
            $itemsByReference[$item['departmentId']]['data'] = new StdClass();
        }

// Set items as children of the relevant parent item.
        foreach($result as $key => &$item)
            if($item['id_dep'] && isset($itemsByReference[$item['id_dep']]))
                $itemsByReference [$item['id_dep']]['children'][] = &$item;

// Remove items that were added to parents elsewhere:
        foreach($result as $key => &$item) {
            if($item['id_dep'] && isset($itemsByReference[$item['id_dep']]))
                unset($result[$key]);
        }
        foreach ($result as $row) {
            $data[] = $row;
        }

// Encode:
        echo json_encode($data);
    }


    function emp_data(){
		$data=$this->tree_model->emp_list();
		echo json_encode($data);
	}
}