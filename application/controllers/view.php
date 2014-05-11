<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class view extends CI_Controller {
    const PAGE_SIZE     = 10;

    const ITEM_FOUND    = 1;
    const ITEM_LOST     = 2;

    private $_url = array(
        self::ITEM_FOUND    => 'found',
        self::ITEM_LOST     => 'lost',
    );

    public function __construct(){
        parent::__construct();
        $this->load->model('items_model');
    }

    public function index() {
        $this->lost();
    }

    public function lost($page = 1) {
        $this->list_item(self::ITEM_LOST, $page);
    }

    public function found($page = 1) {
        $this->list_item(self::ITEM_FOUND, $page);
    }

    public function search($keyword = '') {
        $keyword = trim($this->input->get('q'));

        $data = array(
            'nav_active'    => 'search', //hack, not to active anyone
            'pagination'    => ' ', //get + search + pagination = headache, 主要是url的问题，还有模型的搜索方法也要写
            'items'         => $this->items_model->search_items($keyword),
            'keyword'       => $keyword
        );
        $this->load->view('template/header', $data);
        $this->load->view('view/item.php');
        $this->load->view('template/footer');
    }

    private function list_item($type, $page = 1) {
        $this->load->library('pagination');
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['last_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $this->pagination->initialize($config); 
        $config['base_url']     = base_url($this->_url[$type]);
        $config['total_rows']   = $this->items_model->count_items($type);
        $config['per_page']     = self::PAGE_SIZE;
        $config['uri_segment']  = 2;
        $this->pagination->initialize($config);

        $items = $this->items_model->get_items($type, $page, self::PAGE_SIZE);
        $num = count($items); 
        for($i=0;$i<$num;++$i){ 
            $items[$i]['delete_url'] = base_url('delete/' . $items[$i]['id'] . '/' . $this->items_model->modify_hash($items[$i]['id'])); 
        } 

        $data = array(
            'nav_active'    => $this->_url[$type],
            'pagination'    => $this->pagination->create_links(),
            'items'         => $items,
            'admin'         => $this->admin_model->valid(),
        );
        $this->load->view('template/header',$data);
        $this->load->view('view/item.php',$data);
        $this->load->view('js/item_js.php');

        if($this->admin_model->valid()){
            $this->load->view('js/edit_js.php');
        }

        $this->load->view('template/footer');
    }
}