<?php
$config = array(
    'create/index' => array(
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
    'admin/login' => array(
        array(
            'field' => 'username',
            'label' => '用户名',
            'rules' => 'required'
        ),
        array(
            'field' => 'password',
            'label' => '密码',
            'rules' => 'required|callback_password_check'
        ),
    ),
    'admin/edit' => array(
        array(
            'field' => 'thisid',
            'label' => 'thisid',
            'rules' => 'required'
        ),
        array(
            'field' => 'thisclass',
            'label' => 'thisclass',
            'rules' => 'required'
        ),
        array(
            'field' => 'thisvalue',
            'label' => 'thisvalue',
            'rules' => 'required'
        ),
    ),
);