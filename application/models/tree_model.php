<?php
class tree_model extends CI_Model{

function tree_all() {
        $result = $this->db->query("SELECT  departmentId, departmentName, departmentCode , id_dep FROM tbl_departments")->result_array();
            foreach ($result as $row) {
                $data[] = $row;
            }
            return $data;
    }

/*function show_emp() 
{
    $result = $this->db->query("SELECT empId, first_name, last_name, email FROM tbl_employees
                                JOIN tbl_departments
                                ON tbl_employees.departmentId=tbl_departments.departmentId")->result_array();
    foreach ($result as $row) 
    {
        $data[] = $row;
    }
    return $data;
}*/

function emp_list(){
    $hasil=$this->db->get_where('tbl_employees',array('user_level'=>'2'));
    return $hasil->result();
}


	}