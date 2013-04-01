<?php
/**
 * Created by JetBrains PhpStorm.
 * User: horsley
 * Date: 13-3-28
 * Time: 上午1:10
 * To change this template use File | Settings | File Templates.
 */

class Post extends CI_Controller {
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
            $this->load->view('common/header', array('nav_active' => 'post'));
            $this->load->view('post_form');
            $this->load->view('common/footer');
        } else {
            $this->load->model('items');
            //图片上传
            $this->load->library('upload');

            $pic = NULL;
            if ($this->upload->do_upload('item_pic')) {
                $pic = $this->upload->data();
                $pic = $pic['file_name'];
            }

            if ($this->items->add_item( //add_item($item_type, $item_name, $place, $place_detail, $item_detail, $pic, $contact) {
                $this->input->post('info_type'),
                $this->input->post('item_name'),
                $this->input->post('place'),
                $this->input->post('place_detail'),
                $this->input->post('item_detail'),
                $pic,
                $this->input->post('contact')
            )) {
                redirect($this->_url[$this->input->post('info_type')]);
            } else {
                show_error('信息发布失败！请稍后重试');
            }
        }

    }

}