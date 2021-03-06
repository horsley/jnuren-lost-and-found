-- phpMyAdmin SQL Dump
-- version 3.4.8
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 04 月 02 日 01:41
-- 服务器版本: 5.1.60
-- PHP 版本: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 数据库: `s455484db0`
--

-- --------------------------------------------------------

--
-- 表的结构 `xunwu_items`
--

CREATE TABLE IF NOT EXISTS `xunwu_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '物品ID',
  `name` varchar(20) NOT NULL COMMENT '物品名',
  `place` tinyint(4) NOT NULL COMMENT '校区',
  `place_detail` varchar(50) NOT NULL COMMENT '详细地点',
  `item_detail` varchar(80) NOT NULL COMMENT '物品简述',
  `pub_date` date NOT NULL COMMENT '发布时间',
  `pic_related` varchar(255) DEFAULT NULL COMMENT '配图路径',
  `contact` varchar(80) NOT NULL COMMENT '领取联系',
  `status` tinyint(4) DEFAULT NULL COMMENT '状态',
  `type` tinyint(4) NOT NULL COMMENT '物品类型，捡到还是丢失',
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `name` (`name`,`item_detail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
