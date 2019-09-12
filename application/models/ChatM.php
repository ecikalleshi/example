<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ChatM extends CI_Model {

  public function __construct() {
        parent::__construct();
    }

    public function getUsers($conditions = array(), $fields = '') {
        if (count($conditions) > 0) {
            $this->db->where($conditions);
        }
        $this->db->from('tbl_employees');

        $this->db->order_by("tbl_employees.empId", "asc");


        if ($fields != '') {
            $this->db->select($fields);
        } else {
            $this->db->select('tbl_employees.empId,tbl_employees.user_name,tbl_employees.email,tbl_employees.status');
        }
        $resultt = $this->db->get();

        return $resultt->result();
    }

    public function getOnlineUsers() {
        $queryGet = $this->db->query("SELECT status,user_name,profileImage FROM tbl_employees ORDER BY user_name ASC");
        if ($queryGet->num_rows() > 0) {
            return $queryGet->result_array();
        }
    }

    //?????
    public function heartBeatGet($username) {
        $queryGet = $this->db->query("SELECT * FROM chat WHERE (chat.to='$username' AND recd = 0) order by empId ASC")->result_array();
        return $queryGet;
    }

    public function heartBeatUpdate($username) {
        $this->db->query("UPDATE chat SET recd = 1 WHERE chat.to ='$username' AND recd = 0");
    }

    public function chatInsert($from, $to, $message) {
        $this->db->query("INSERT INTO chat(chat.from,chat.to,message,sent) values ('$from','$to','$message',NOW())");
    }

}
