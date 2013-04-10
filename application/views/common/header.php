<?php
/**
 * Created by JetBrains PhpStorm.
 * User: horsley
 * Date: 13-3-28
 * Time: 上午12:57
 * To change this template use File | Settings | File Templates.
 */?><!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <title>暨南大学失物招领</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="暨南大学线上失物招领与寻物启事系统">
    <meta name="author" content="horsley,shol">

    <!-- Le styles -->
    <link href="<? echo base_url() ?>css/a.css" rel="stylesheet">
    <style type="text/css">
        body {padding-top: 60px;}
        .pagination {margin: 0;}
    </style>
    <link href="<? echo base_url() ?>css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="<? echo base_url() ?>js/html5shiv.js"></script>
    <![endif]-->

</head>

<body>

<div class="navbar  navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="<?php echo site_url(); ?>">暨大寻物</a>
            <div class="nav-collapse collapse">
                <form class="navbar-form pull-right" id="search" action="<?php echo base_url('search')?>" method="get" style="padding-top: 5px;">
                    <div class="input-append input-prepend">
                        <span class="add-on"><i class="icon-search"></i></span>
                        <input class="span2" type="text" name="s" placeholder="物品信息" value="<?php if(!empty($keyword)) echo $keyword ?>">
                        <input type="hidden" name="type" value="<?php
                            if (!empty($nav_active) && in_array($nav_active, array('lost', 'found'))) echo $nav_active;
                            else echo 'found'; //默认搜索类型 ?>">
                        <button type="submit" class="btn btn-primary"> 搜索</button>
                    </div>
                </form>

                <ul class="nav">
                    <li <?php if(empty($nav_active) || $nav_active == 'found') echo 'class="active"';?> >
                        <a href="<?php echo site_url('found')?>">失物招领<? // var_dump($nav_active)?></a>
                    </li>
                    <li <?php if(!empty($nav_active) && $nav_active == 'lost') echo 'class="active"';?> >
                        <a href="<?php echo site_url('lost')?>">寻物启事</a>
                    </li>
                    <li <?php if(!empty($nav_active) && $nav_active == 'post') echo 'class="active"';?> >
                        <a href="<?php echo site_url('post')?>">物品信息发布</a>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>