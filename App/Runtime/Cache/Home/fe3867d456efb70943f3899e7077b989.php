<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="description" content=""><meta name="author" content=""><meta name="renderer" content="webkit|ie-comp|ie-stand"><title><?php echo ($title); ?> - <?php echo C('site.name');?> -  Powered by Weit </title><meta name="keywords" content="<?php echo C('site.keywords');?>" /><meta name="description" content="<?php echo C('site.des');?>" /><link href="__PUBLIC__/css/bootstrap.css" rel="stylesheet"><link href="__PUBLIC__/css/style.css" rel="stylesheet"><link rel="stylesheet" href="__PUBLIC__/css/font-awesome/css/font-awesome.min.css"><!--[if lt IE 9]><script src="__PUBLIC__/js/html5.js"></script><script src="__PUBLIC__/js/css3.js"></script><script src="__PUBLIC__/js/respond.min.js"></script><![endif]--></head><body><div class="navbar navbar-default navbar-static-top">	<div class="container">		<div class="navbar-header">			<button type="button" class="navbar-toggle needsclick" data-toggle="collapse" data-target=".navbar-collapse">				<span class="icon-bar"></span>				<span class="icon-bar"></span>				<span class="icon-bar"></span>			</button>			<a class="navbar-brand">World Cup</a>		</div>	    <div class="navbar-collapse collapse">			<ul class="nav navbar-nav">				<li <?php if( MODULE_NAME == 'Feed' ): ?>class="active"<?php endif; ?> ><a href="<?php echo U('feed/index');?>">赛程一览</a></li>				<li <?php if( MODULE_NAME == 'Topic' ): ?>class="active"<?php endif; ?> ><a href="<?php echo U('topic/index');?>">我的投注</a></li>			</ul>			<ul class="nav navbar-nav navbar-right ">				<?php if(($mid) > "0"): ?><li>						<a href="<?php echo U('user/index', array('uid'=>$user['uid']));?>">							<?php echo ($user["username"]); ?>						</a>					</li>					<li class="notify">						<a href="<?php echo U('message/notify');?>">							<i class="fa fa-bell"></i>							<?php if(($user["at_num"]) > "0"): ?><span class="badge" id="notify"><?php echo ($user["at_num"]); ?></span><?php endif; ?>						</a>					</li>					<li class="inbox">						<a href="<?php echo U('message/index');?>">							<i class="fa fa-envelope-o"></i>							<?php if(($user["inbox_num"]) > "0"): ?><span class="badge" id="inbox"><?php echo ($user["inbox_num"]); ?></span><?php endif; ?>						</a>					</li>					<li class="dropdown">						<a href="#" class="dropdown-toggle" data-toggle="dropdown">						<i class="fa fa-cog"></i>						</a>						<ul class="dropdown-menu" role="menu">			                <li><a href="<?php echo U('account/settings');?>"><i class="fa fa-user"></i>账号设置</a></li>			                <li class="divider"></li>            				<?php if(($user["flag"]) == "1"): ?><li><a href="<?php echo U('admin/public/login');?>"><i class="fa fa-dashboard"></i>后台管理</a></li>			               	<li class="divider"></li><?php endif; ?>						                <li><a href="<?php echo U('user/logout');?>"><i class="fa fa-power-off"></i>退出</a></li>			            </ul>					</li>				<?php else: ?>					<li><a href="<?php echo U('user/signup');?>">注册</a></li>					<li><a href="<?php echo U('user/login');?>">登录</a></li><?php endif; ?>			</ul>	    </div>	</div></div>

<div class="container">
	<div class="row">
		<div class="panel talk-form">
	 		<form id="talk-signup" action="<?php echo U('user/signup');?>" method="post" class="form-horizontal">
				<div class="panel-heading">
					欢迎加入<?php echo C('site.name');?>
				</div>
				<div class="form-group">
					<label for="email" class="col-md-3 control-label">邮箱：</label>
					<div class="col-md-8">
						<input type="text" class="form-control" id="email" name="email" value="">
					</div>
				</div>
				<div class="form-group">
			        <label for="password" class="col-md-3 control-label">密码：</label>
			        <div class="col-md-8">
						<input type="password" class="form-control" id="password" name="password">
			        </div>
				</div>
				<div class="form-group">
			        <label for="repassword" class="col-md-3 control-label">确认密码：</label>
			        <div class="col-md-8">
			        	<input type="password" class="form-control" name="repassword">
			        </div>
				</div>
				<div class="form-group">
					<label for="email" class="col-md-3 control-label">用户名：</label>
					<div class="col-md-8">
						<input type="text" class="form-control" id="username" name="username" value="">
					</div>
				</div>
				<div class="form-group">
			        <label for="verify" class="col-md-3 control-label">验证码：</label>
			        <div class="col-md-3">
			        	<input type="text" class="form-control" name="verify" id="captcha">
			        </div>
			        <div class="col-md-3">
			        	<img src="<?php echo U('user/verify');?>" alt="" id="verify">
			        </div>
			        <div class="col-md-3">
			        	<a href="javascript:;" id="reloadVerify" title="换一张">换一张？</a>
			        </div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-3 col-md-2">
						<button type="submit" class="btn btn-primary">注册</button>
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
<script>
	$("#talk-signup").validate({
	   
        submitHandler: function(e) {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "<?php echo U('user/signup');?>",
                data: $("#talk-signup").serialize(),
                success: function(data){
                	if (data.status == 0) {
                		bootbox.alert(data.info);
    	            	return  false;
                	} else {
                		window.location.href = data.url;
                	}

                }
            })
        }
	});
	$('#reloadVerify').click(function(){
	    var captchaUrl = "<?php echo U('user/verify');?>&t=";
	    $('#verify').attr('src', captchaUrl + Math.random());
	});
</script>
</body>
</html>