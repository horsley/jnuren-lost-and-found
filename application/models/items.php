<?php
/**
 * Created by JetBrains PhpStorm.
 * User: horsley
 * Date: 13-3-27
 * Time: 上午11:04
 * To change this template use File | Settings | File Templates.
 */

class Items extends CI_Model {
    const TB_NAME = 'items';

    public function __construct() {
        $this->load->database();
    }

    /**
     * 插入物品信息
     * @param $item_type
     * @param $item_name
     * @param $place
     * @param $place_detail
     * @param $item_detail
     * @param $pic
     * @param $contact
     * @return mixed
     */
    public function add_item($item_type, $item_name, $place, $place_detail, $item_detail, $pic, $contact) {
        return $this->db->insert(self::TB_NAME, array(
            'name'          => $item_name,
            'place'         => $place,
            'place_detail'  => $place_detail,
            'item_detail'   => $item_detail,
            'pub_date'     => date('Y-m-d'),
            'pic_related'   => $pic,
            'contact'       => $contact,
            'type'          => $item_type
        )) ? $this->db->insert_id() : false; //成功返回插入的id，失败返回假
    }

    /**
     * 查询物品条目
     * @param $type 1 found  2  lost
     * @param $page 注意页码从1开始
     * @param $pagesize 每页数量
     */
    public function get_items($type, $page, $pagesize) {
        $this->db->where('type', $type);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get(self::TB_NAME, $pagesize, ($page - 1) * $pagesize);
        return $query->result_array();
    }

    /**
     * 获取一种类型的物品的总数，分页用
     * @param $type
     * @return mixed
     */
    public function count_items($type) {
        $this->db->where('type', $type);
        return $this->db->count_all_results(self::TB_NAME);
    }

    /**
     * 搜索
     * @param $keyword
     */
    public function search_items($keyword) {
        $this->db->order_by('id', 'desc');
        $this->db->like('name', $keyword);
        $this->db->limit(10);
        $this->db->or_like('item_detail', $keyword);

        $query = $this->db->get(self::TB_NAME);
        return $query->result_array();
    }

    /**
     * 修改删除用的密钥
     * @param $item_id
     * @return string
     */
    public function modify_hash($item_id) {
        return sha1(sha1($item_id) . $this->config->item('encryption_key'));
    }

    /**
     * 删除物品
     * @param $item_id
     */
    public function delete_item($item_id) {
        $this->db->delete(self::TB_NAME, array('id' => $item_id));
    }
}