<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="description" content=""><meta name="author" content=""><meta name="renderer" content="webkit|ie-comp|ie-stand"><title>世界杯赌球记 -  Powered by Weit </title><meta name="keywords" content="<?php echo C('site.keywords');?>" /><meta name="description" content="<?php echo C('site.des');?>" /><link href="__PUBLIC__/css/bootstrap.css" rel="stylesheet"><link href="__PUBLIC__/css/style.css" rel="stylesheet"><link rel="stylesheet" href="__PUBLIC__/css/font-awesome/css/font-awesome.min.css"><!--[if lt IE 9]><script src="__PUBLIC__/js/html5.js"></script><script src="__PUBLIC__/js/css3.js"></script><script src="__PUBLIC__/js/respond.min.js"></script><![endif]--></head><body><div class="navbar navbar-default navbar-static-top">	<div class="container">		<div class="navbar-header">			<button type="button" class="navbar-toggle needsclick" data-toggle="collapse" data-target=".navbar-collapse">				<span class="icon-bar"></span>				<span class="icon-bar"></span>				<span class="icon-bar"></span>			</button>			<a class="navbar-brand">铿锵三逗逼</a>		</div>	    <div class="navbar-collapse collapse">			<ul class="nav navbar-nav">				<li <?php if( MODULE_NAME == 'Feed' ): ?>class="active"<?php endif; ?> ><a href="<?php echo U('feed/index');?>">孤注一掷</a></li>				<li <?php if( MODULE_NAME == 'Topic' ): ?>class="active"<?php endif; ?> ><a href="<?php echo U('topic/index');?>">所剩无几</a></li>			</ul>			<ul class="nav navbar-nav navbar-right ">				<?php if(($mid) > "0"): ?><li>						<a>							<?php echo ($user["username"]); ?>						</a>					</li>					<li class="dropdown">						<a href="#" class="dropdown-toggle" data-toggle="dropdown">						<i class="fa fa-cog"></i>						</a>						<ul class="dropdown-menu" role="menu">			                <li><a href="<?php echo U('user/logout');?>"><i class="fa fa-power-off"></i>退出</a></li>			            </ul>					</li>				<?php else: ?>					<li><a href="<?php echo U('user/login');?>">登录</a></li><?php endif; ?>			</ul>	    </div>	</div></div>

<div class="container">
	<div class="row">
		<div class="panel talk-form">
			<div class="panel-heading">
			 	登录
		    </div>
	 		<form id="talk-login" action="<?php echo U('user/login');?>"  method="post" class="form-horizontal" >
				<div class="form-group">
					<label for="username" class="col-md-3 control-label">用户名：</label>
					<div class="col-md-6">
						<input type="text" class="form-control" id="username" name="username" value="">
					</div>
				</div>
				<div class="form-group">
			        <label for="password" class="col-md-3 control-label">密码：</label>
			        <div class="col-md-6">
			        	<input type="password" class="form-control" id="password" name="password">
			        </div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-3 col-md-4">
						<label for=""><input type="checkbox" name="is_remember" value="1"> 记住我</label>
					</div>
					<div class="col-md-2">
						<a href="<?php echo U('user/password');?>">忘记密码?</a>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-3 col-md-6">
						<button type="submit" class="btn btn-primary">登录</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<a href="#" class="scroll-up hidden-xs">回到顶部</a>
<footer>
	<div class="container">
		<div class="row">
			<p><?php echo C('site.copyright');?></p>
		</div>
	</div>
</footer>
<script  src="__PUBLIC__/js/jquery.js"></script>
<script  src="__PUBLIC__/js/jquery-migrate.js"></script>
<script  src="__PUBLIC__/js/jquery.validate.js"></script>
<script  src="__PUBLIC__/js/bootstrap.js"></script>
<script  src="__PUBLIC__/js/bootbox.js"></script>
<script  src="__PUBLIC__/js/jquery.tmpl.js"></script>
<script  src="__PUBLIC__/js/main.js"></script>
<?php if(($mid) > "0"): ?><script>
	$(function(){
		var getUnread =  function(){
			$.get("<?php echo U('message/unread');?>", function(data){
			 	if (data.at_num >0) {
			 		$('#notify').show().text(data.at_num);
			 	} 
			 	if (data.inbox_num >0) {
			 		$('#inbox').show().text(data.inbox_num);
			 	}
			 	
			},'json');
		};
		setInterval(getUnread, 50000);
	});
</script><?php endif; ?>

</body>
</html>