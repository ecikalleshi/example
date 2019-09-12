<?php
class Dep extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('dep_model');
	}

	
	//public 
	function index(){
		//$data['mainDep'] = $this->Dep_model->get_mainDeps();
		//$this->load->view('dep_view',$data);
		$this->load->view('dep_view');
		
	}

	
	//public 
	/*function read()
	{
		//$this->dep_model->id_dep = $id_dep;
		$data= $this->dep_model->get_DepCode($id_dep);
		echo json_encode($data);
        //$object['controller']=$this; 
        //$this->load->view('dep_view',$data);
	}*/

	function dep_data(){
		$data=$this->dep_model->dep_list();
		echo json_encode($data);
	}

	function save(){
		$data=$this->dep_model->save_dep();
		echo json_encode($data);
	}

	function update(){
		$data=$this->dep_model->update_dep();
		echo json_encode($data);
	}

	function delete(){
		$data=$this->dep_model->delete_dep();
		echo json_encode($data);
	}

}