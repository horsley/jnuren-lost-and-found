<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <title>武生院失物招领</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/static/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/static/css/main.css" rel="stylesheet">
</head>

<body>
<div id="navbar-wrapper">
    <div id="navigation" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="sr-only">生院寻物</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">生院寻物</a>
           </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li <?php if(empty($nav_active) || $nav_active == 'found') echo 'class="active"';?>><a href="/found">失物招领</a></li>
                    <li <?php if(!empty($nav_active) && $nav_active == 'lost') echo 'class="active"';?> ><a href="/lost">寻物启事</a></li>
                    <li <?php if(!empty($nav_active) && $nav_active == 'create') echo 'class="active"';?> ><a href="/create">物品信息发布</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <form class="form-inline navbar-left" style="margin-top: 8px;" role="search" action="/search" method="get" target="_blank">
                        <div class="form-group">
                            <input type="text" class="form-control" name="q" placeholder="搜索物品...">
                        </div>
                    </form>               
                </ul>
            </div>
        </div>
    </div>
</div>
