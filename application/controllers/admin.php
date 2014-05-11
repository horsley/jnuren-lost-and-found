<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function login(){
        $data['admin'] = $this->admin_model->valid();
        if($data['admin']){
            redirect('/', 'refresh');
        }else{
            if($this->form_validation->run() == TRUE){
                $this->admin_model->set_session($this->input->post('username'));
                redirect('/', 'refresh');
            }else{
                $this->load->view('template/header',$data);
                $this->load->view('admin/login',$data);
                $this->load->view('template/footer',$data);
            }
        }
    }

    public function password_check($password){
        $username = $this->input->post('username');
        $pass = $this->admin_model->login($username,$password);
        if($pass){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function edit(){
        $this->load->model('items_model');
        $data['admin'] = $this->admin_model->valid();
        if($data['admin'] and $this->form_validation->run()){
            $thisid = $this->input->post('thisid');
            $thisclass = $this->input->post('thisclass');
            $thisvalue = $this->input->post('thisvalue');
            if($this->items_model->edit_item($thisid,$thisclass,$thisvalue)){
                exit('Success.');
            }else{
                show_error('Something wrong.', 500);
            }
        }else{
            show_error('No access.', 403);
        }
    }

    public function delete($item_id, $modify_hash) {
        $this->load->model('items_model');
        if ($this->items_model->modify_hash($item_id) !== $modify_hash) show_error('删除密钥不正确！');

        $this->items_model->delete_item($item_id);

        $this->load->view('template/header', array('nav_active' => 'none'));
        $this->load->view('admin/delete_success');
        $this->load->view('template/footer');
    }
}