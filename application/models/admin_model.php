<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class admin_model extends CI_Model {
    const TABLE_MEMBER = 'member';

    public function __construct(){
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('security');
    }

    public function login($username,$password){
        $data = array(
            'username' => $username,
            'password' => do_hash(do_hash($username) . do_hash($password)),
        );
        $query = $this->db->get_where(self::TABLE_MEMBER, $data);
        return $query->row_array();
    }

    public function set_session($username){
        $data = array(
            'username'  => $username,
        );

        $this->session->set_userdata($data);
    }

    public function del_session(){
        $this->session->sess_destroy();;
    }

    public function valid(){
        $username = $this->session->userdata('username');
        if($username){
            $query = $this->db->get_where(self::TABLE_MEMBER, array('username'=>$username));
            return $query->row_array();
        }else{
            return False;
        }
    }
}