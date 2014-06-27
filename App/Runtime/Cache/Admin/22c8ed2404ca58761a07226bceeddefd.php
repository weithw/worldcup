<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>TalkPiece 后台管理</title>
	<link href="__PUBLIC__/css/bootstrap.css" rel="stylesheet">
	<link href="__PUBLIC__/css/admin.css" rel="stylesheet">
	<link rel="stylesheet" href="__PUBLIC__/css/font-awesome/css/font-awesome.min.css">
	<!--[if lt IE 9]>
	  	<script src="assets/js/html5.js"></script>
		<script src="assets/js/css3.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	<script  src="__PUBLIC__/js/jquery.js"></script>
	<script  src="__PUBLIC__/js/bootstrap.js"></script>
</head>
<body>
    <div class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">TalkPiece</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo U('home/topic/index');?>"><i class="fa fa-cloud"></i> 返回社区</a></li>
                    <li><a href="<?php echo U('public/logout');?>">退出</a></li>
                </ul>
            </div>
        </div>
    </div>
   
    <div class="container-fluid">
        <div class="row">
           <div class="sidebar col-sm-1 col-md-2">        <ul class="nav nav-sidebar">        <li><a href="<?php echo U('index/index');?>"><i class="fa fa-bar-chart-o"></i>控制面板</a></li>        <li>            <a  href="#"><i class="fa fa-cog"></i>系统设置</a>            <ul class="sub-menu">                <li><a href="<?php echo U('settings/index');?>">基本设置</a></li>                <li><a href="<?php echo U('settings/email');?>">邮件设置</a></li>                <li><a href="<?php echo U('settings/score');?>">积分设置</a></li>                <li><a href="<?php echo U('cache/index');?>">更新缓存</a></li>            </ul>        </li>        <li>            <a href="#"><i class="fa fa-user"></i> 用户</a>            <ul class="sub-menu" id="user">                <li>                    <a href="<?php echo U('user/index');?>">用户列表</a>                </li>            </ul>        </li>        <li>            <a href="#"><i class="fa fa-edit"></i> 话题</a>            <ul class="sub-menu">                <li>                    <a href="<?php echo U('topic/index');?>">话题列表</a>                </li>                <li>                    <a href="<?php echo U('topic/category');?>">分类列表</a>                </li>            </ul>        </li>    </ul></div>
            <div class="col-sm-11  col-md-10 main">
                <h3>站点设置</h3>
                <form class="form-horizontal" action="<?php echo U('settings/update');?>" method="post">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="name">网站名称：</label>
                        <div class="col-md-4">
                            <input type="text" name="settings[name]" class="form-control" value="<?php echo ($settings['site']['name']); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="name">文字LOGO：</label>
                        <div class="col-md-4">
                            <input type="text" name="settings[logo]" class="form-control" value="<?php echo ($settings['site']['logo']); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="name">SEO关键词：</label>
                        <div class="col-md-4">
                            <input type="text" name="settings[keywords]" class="form-control" value="<?php echo ($settings['site']['keywords']); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="name">SEO信息描述：</label>
                        <div class="col-md-4">
                            <input type="text" name="settings[des]" class="form-control" value="<?php echo ($settings['site']['des']); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="name">版权信息：</label>
                        <div class="col-md-4">
                            <input type="text" name="settings[copyright]" class="form-control"  value="<?php echo ($settings['site']['copyright']); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="name">操作时间间隔：(秒)</label>
                        <div class="col-md-1">
                            <input type="text" name="settings[interval]" class="form-control"  value="10">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="name">第三方统计代码：</label>
                        <div class="col-md-4">
                            <textarea name="settings[statis]" class="form-control" cols="30" rows="5"><?php echo ($settings['site']['statis']); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="name">词语屏蔽：</label>
                        <div class="col-md-4">
                            <textarea name="settings[badwords]" class="form-control" cols="30" rows="10"><?php echo ($settings['site']['badwords']); ?></textarea>
                        </div>
                        <div class="col-md-2">使用 | 隔开</div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-4">
                            <input type="hidden" name="type" value="site">
                            <button type="submit" class="btn btn-primary">更新</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>