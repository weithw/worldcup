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
       <div class="container-fluid">        <div class="row">           <div class="sidebar col-sm-1 col-md-2">        <ul class="nav nav-sidebar">        <li><a href="<?php echo U('index/index');?>"><i class="fa fa-bar-chart-o"></i>控制面板</a></li>        <li>            <a  href="#"><i class="fa fa-cog"></i>系统设置</a>            <ul class="sub-menu">                <li><a href="<?php echo U('settings/index');?>">基本设置</a></li>                <li><a href="<?php echo U('settings/email');?>">邮件设置</a></li>                <li><a href="<?php echo U('settings/score');?>">积分设置</a></li>                <li><a href="<?php echo U('cache/index');?>">更新缓存</a></li>            </ul>        </li>        <li>            <a href="#"><i class="fa fa-user"></i> 用户</a>            <ul class="sub-menu" id="user">                <li>                    <a href="<?php echo U('user/index');?>">用户列表</a>                </li>            </ul>        </li>        <li>            <a href="#"><i class="fa fa-edit"></i> 话题</a>            <ul class="sub-menu">                <li>                    <a href="<?php echo U('topic/index');?>">话题列表</a>                </li>                <li>                    <a href="<?php echo U('topic/category');?>">分类列表</a>                </li>            </ul>        </li>    </ul></div>            <div class="col-sm-11  col-md-10 main">                <h3 class="page-header">用户列表</h3>                <form action="<?php echo U('user/index');?>"  method="post" class="form-horizontal" >                    <div class="form-group">                        <label for="username" class="col-md-1 control-label">用户名：</label>                        <div class="col-md-3">                            <input type="text" class="form-control" name="username" value="<?php echo ($username); ?>">                        </div>                    </div>                    <div class="form-group">                        <label for="email" class="col-md-1 control-label">邮箱：</label>                        <div class="col-md-3">                            <input type="text" class="form-control" name="email" value="<?php echo ($email); ?>">                        </div>                    </div>                    <div class="form-group">                        <div class="col-md-offset-3 col-md-6">                            <button type="submit" class="btn btn-primary">搜索</button>                        </div>                    </div>                </form>                <table class="table table-striped">                    <thead>                        <tr>                            <th>#</th>                            <th>用户名</th>                            <th>邮箱</th>                            <th>加入时间</th>                            <th>积分</th>                            <th>状态</th>                            <th>操作</th>                        </tr>                    </thead>                    <tbody>                        <?php if(is_array($users["data"])): $i = 0; $__LIST__ = $users["data"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><tr>                            <td><?php echo ($user["uid"]); ?></td>                            <td><?php echo ($user["username"]); ?></td>                            <td><?php echo ($user["email"]); ?></td>                            <td><?php echo date('Y-m-d H:i:s', $user['create_time']);?></td>                            <td><?php echo ($user['credit']); ?></td>                             <td>                                <?php if($user["flag"] == 0): ?>正常                                <?php elseif($user["flag"] == -1): ?>                                    锁定                                <?php elseif($user["flag"] == 1): ?>                                    <span style="color:red">保护</span><?php endif; ?>                            </td>                            <td>                                <?php if($user["is_active"] == 1): ?>已激活                                <?php else: ?>                                    <a href="<?php echo U('user/active',array('uid'=>$user['uid']));?>">激活</a><?php endif; ?>&nbsp;|&nbsp;                                <?php if($user["flag"] == -1): ?><a href="<?php echo U('user/unblock',array('uid'=>$user['uid']));?>">解除锁定</a>                                <?php elseif($user["flag"] == 0): ?>                                    <a href="<?php echo U('user/block',array('uid'=>$user['uid']));?>">锁定</a>                                <?php elseif($user["flag"] == 1): ?>                                    <span style="color:red">管理员</span><?php endif; ?>                            </td>                         </tr><?php endforeach; endif; else: echo "" ;endif; ?>                    </tbody>                </table>                <div class="text-center">                    <?php echo ($users["page"]); ?>                </div>                            </div>        </div>    </div></body>
</html>