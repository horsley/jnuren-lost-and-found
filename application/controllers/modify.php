<?php
/**
 * Created by JetBrains PhpStorm.
 * User: horsley
 * Date: 13-4-10
 * Time: 下午8:36
 * To change this template use File | Settings | File Templates.
 */

class Modify extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function delete($item_id, $modify_hash) {
        $this->load->model('items');
        if ($this->items->modify_hash($item_id) !== $modify_hash) show_error('删除密钥不正确！');

        $this->items->delete_item($item_id);

        $this->load->view('common/header', array('nav_active' => 'none'));
        $this->load->view('delete_success');
        $this->load->view('common/footer');
    }
}