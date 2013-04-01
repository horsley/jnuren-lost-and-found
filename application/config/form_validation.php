<?php
/**
 * Created by JetBrains PhpStorm.
 * User: horsley
 * Date: 13-4-1
 * Time: 上午12:53
 * To change this template use File | Settings | File Templates.
 */
$config = array(
    'post/index' => array(
          array(
              'field' => 'info_type',
              'label' => '发布类型',
              'rules' => 'required|greater_than[0]|less_than[3]'
          ),
        array(
            'field' => 'item_name',
            'label' => '物品名称',
            'rules' => 'required'
        ),
        array(
            'field' => 'place',
            'label' => '所在校区',
            'rules' => 'required|greater_than[0]|less_than[5]'
        ),
        array(
            'field' => 'place_detail',
            'label' => '详细地点',
            'rules' => 'required'
        ),
        array(
            'field' => 'item_detail',
            'label' => '物品描述',
            'rules' => 'required'
        ),
        array(
            'field' => 'contact',
            'label' => '联系方式',
            'rules' => 'required'
        ),
    ),
);