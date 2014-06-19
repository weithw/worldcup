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
            <div class="sidebar col-sm-1 col-md-2">
            <div class="col-sm-11  col-md-8 main">
            	<h3>数据统计</h3>
            	 <table class="table table-bordered">
					<thead>
						<tr>
							<th>用户数</th>
							<th>话题数</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo ($users_num); ?></td>
							<td><?php echo ($topics_num); ?></td>
						</tr>
					</tbody>			
				</table>
            </div>
           
        </div>
    </div>
</body>
</html>