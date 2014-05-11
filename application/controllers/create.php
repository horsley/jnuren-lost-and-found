<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class create extends CI_Controller {
    const ITEM_FOUND    = 1;
    const ITEM_LOST     = 2;
    private $_url = array(
        self::ITEM_FOUND => 'found',
        self::ITEM_LOST => 'lost',
    );

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
    }

    public function index() {
        $this->load->library('form_validation');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', array(
                'nav_active'    => 'create',
            ));
            $this->load->view('create/create');
            $this->load->view('js/create_js');
            $this->load->view('template/footer');
        } else {
            $this->load->model('items_model');

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            $pic = NULL;
            if ($this->upload->do_upload('item_pic')) {
                $pic = $this->upload->data();
                $pic = $pic['file_name'];
            }

            if ($item_id = $this->items_model->add_item(
                $this->input->post('info_type'),
                $this->input->post('item_name'),
                $this->input->post('place_detail'),
                $this->input->post('item_detail'),
                $pic,
                $this->input->post('contact')
            )) {
                $modify_hash = $this->items_model->modify_hash($item_id);
                $this->load->view('template/header', array(
                    'nav_active'    => 'post_success',
                    'delete_url'    => base_url('delete/' . $item_id . '/' . $modify_hash),
                    'return_url'    => base_url($this->_url[$this->input->post('info_type')]),
                ));
                $this->load->view('create/create_success');
                $this->load->view('template/footer');
            } else {
                show_error('信息发布失败！请稍后重试');
            }
        }

    }

}