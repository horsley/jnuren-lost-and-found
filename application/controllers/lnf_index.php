<?php
/**
 * Created by JetBrains PhpStorm.
 * User: horsley
 * Date: 13-3-27
 * Time: 上午11:48
 * To change this template use File | Settings | File Templates.
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lnf_index extends CI_Controller {
    const PAGE_SIZE     = 10;

    const ITEM_FOUND    = 1;
    const ITEM_LOST     = 2;

    const PLACE_BENBU   = 1;
    const PLACE_ZHUQU   = 2;
    const PLACE_HUAWEN  = 3;
    const PLACE_SHENLV  = 4;

    private $_url = array(
        self::ITEM_FOUND    => 'found',
        self::ITEM_LOST     => 'lost',
    );

    private $_place = array(
        self::PLACE_BENBU   => '本部',
        self::PLACE_ZHUQU   => '珠区',
        self::PLACE_HUAWEN  => '华文',
        self::PLACE_SHENLV  => '深旅'
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->model('items');
    }

    public function index() {
        $this->found();
    }

    public function lost($page = 1) {
        $this->list_item(self::ITEM_LOST, $page);
    }

    public function found($page = 1) {
        $this->list_item(self::ITEM_FOUND, $page);
    }

    public function search($keyword = '') {
        $keyword = trim($this->input->get('s'));
        $search_type = $this->input->get('type');

        if (!in_array($search_type, $this->_url)) $search_type = 'found'; //默认搜索失物
        $data = array(
            'place'         => $this->_place,
            'nav_active'    => 'search', //hack, not to active anyone
            'pagination'    => ' ', //get + search + pagination = headache, 主要是url的问题，还有模型的搜索方法也要写
            'items'         => $this->items->search_items($keyword, $search_type),
            'search_type'   => $search_type,
            'keyword'       => $keyword
        );
        $this->load->view('common/header', $data);
        $this->load->view('search_type');
        $this->load->view('lnf_index');
        $this->load->view('common/footer');
    }

    private function list_item($type, $page = 1) {
        //分页
        $this->load->library('pagination');
        $config['base_url']     = base_url($this->_url[$type]);
        $config['total_rows']   = $this->items->count_items($type);
        $config['per_page']     = self::PAGE_SIZE;
        $config['uri_segment']  = 2;
        $this->pagination->initialize($config);

        $data = array(
            'place'         => $this->_place,
            'nav_active'    => $this->_url[$type],
            'pagination'    => $this->pagination->create_links(),
            'items'         => $this->items->get_items($type, $page, self::PAGE_SIZE)
        );
        $this->load->view('common/header', $data);
        $this->load->view('lnf_index');
        $this->load->view('common/footer');
    }
}