<?php
/**
 * Created by JetBrains PhpStorm.
 * User: horsley
 * Date: 13-4-2
 * Time: 下午10:06
 * To change this template use File | Settings | File Templates.
  反bot快速提交模块，设定一个填表时间最小值，表单生成时间嵌入页面隐藏字段，并加上验证hash，提交的时候检查，使用config里面的加密密钥生成hash
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Antibot {
    private $CI;
    private $config;

    public function __construct($params = '') {
        $this->CI = & get_instance();
        $this->config = array(
            'field_name'    => '_ANTIBOT',
            'post_interval' => 15,
            'encrypt_key'   => '' //初始化的时候最好要指定加密参数
        );

        if (!empty($params)) {
            $this->config = $params;
        }
    }

    public function form_antibot() {
        return '<input type="hidden" name="' . $this->config['field_name'] . '" value="' . $this->check_value() .'" />'."\n";
    }

    public function check2fast($post_interval = 0) {
        if (empty($post_interval)) $post_interval = $this->config['post_interval'];
        $check_value = $this->CI->input->post($this->config['field_name']);

        $check_value_arr = explode('#', $check_value);
        if (count($check_value_arr) != 2) return false; //非法篡改，格式错
        if ($this->check_value($check_value_arr[0]) !== $check_value) return false; //验证失败
        //至此确定时间值无篡改，验证时间间隔
        if (time() - $check_value_arr[0] <= $post_interval) return false; //间隔太短，失败
        return true;
    }

    private function check_value($time = 0) {
        if (empty($time)) $time = time();
        return "{$time}#" . sha1(sha1($time) . $this->config['encrypt_key']);
    }
}