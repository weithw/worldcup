<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="description" content=""><meta name="author" content=""><meta name="renderer" content="webkit|ie-comp|ie-stand"><title>铿锵三逗逼 -  Powered by Weit </title><meta name="keywords" content="<?php echo C('site.keywords');?>" /><meta name="description" content="<?php echo C('site.des');?>" /><link href="__PUBLIC__/css/bootstrap.css" rel="stylesheet"><link href="__PUBLIC__/css/style.css" rel="stylesheet"><link rel="stylesheet" href="__PUBLIC__/css/font-awesome/css/font-awesome.min.css"><!--[if lt IE 9]><script src="__PUBLIC__/js/html5.js"></script><script src="__PUBLIC__/js/css3.js"></script><script src="__PUBLIC__/js/respond.min.js"></script><![endif]--></head><body><div class="navbar navbar-default navbar-static-top">	<div class="container">		<div class="navbar-header">			<button type="button" class="navbar-toggle needsclick" data-toggle="collapse" data-target=".navbar-collapse">				<span class="icon-bar"></span>				<span class="icon-bar"></span>				<span class="icon-bar"></span>			</button>			<a class="navbar-brand">世界杯赌球记</a>		</div>	    <div class="navbar-collapse collapse">			<ul class="nav navbar-nav">				<li <?php if( MODULE_NAME == 'Feed' ): ?>class="active"<?php endif; ?> ><a href="<?php echo U('feed/index');?>">孤注一掷</a></li>				<li <?php if( MODULE_NAME == 'Topic' ): ?>class="active"<?php endif; ?> ><a href="<?php echo U('topic/index');?>">所剩无几</a></li>			</ul>			<ul class="nav navbar-nav navbar-right ">				<?php if(($mid) > "0"): ?><li>						<a href="<?php echo U('user/index', array('uid'=>$user['uid']));?>">							<?php echo ($user["username"]); ?>						</a>					</li>					<li class="dropdown">						<a href="#" class="dropdown-toggle" data-toggle="dropdown">						<i class="fa fa-cog"></i>						</a>						<ul class="dropdown-menu" role="menu">			                <li><a href="<?php echo U('account/settings');?>"><i class="fa fa-user"></i>账号设置</a></li>			                <li class="divider"></li>            				<?php if(($user["flag"]) == "1"): ?><li><a href="<?php echo U('admin/public/login');?>"><i class="fa fa-dashboard"></i>后台管理</a></li>			               	<li class="divider"></li><?php endif; ?>						                <li><a href="<?php echo U('user/logout');?>"><i class="fa fa-power-off"></i>退出</a></li>			            </ul>					</li>				<?php else: ?>					<li><a href="<?php echo U('user/login');?>">登录</a></li><?php endif; ?>			</ul>	    </div>	</div></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="account-setting">
                        <div class="panel-heading">
                            <h4>账号设置</h4>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li><a href="<?php echo U('account/settings');?>">基本信息</a></li>
                                <li><a href="<?php echo U('account/avatar');?>">修改头像</a></li>
                                <li class="active"><a href="#">密码安全</a></li>
                            </ul>
                            <div class="talk-account">
                                <form id="password" class="form-horizontal" action="<?php echo U('account/password');?>" method="post">
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="password">当前密码：</label>
                                            <div class="col-lg-4">
                                                <input type="password" class="form-control" id="username" name="password" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="newPassword">新密码：</label>
                                            <div class="col-lg-4">
                                                <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="reNewPassword">确认密码：</label>
                                            <div class="col-lg-4">
                                                <input type="password" class="form-control" name="reNewPassword" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-6">
                                                <button type="submit" class="btn btn-primary">保存</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    $(function() {

        $("#password").validate({
            rules: {
                password: "required",
                newPassword: "required",
                reNewPassword: {
                    required: true,
                    equalTo: "#newPassword"
                },
            },
            messages: {
                password: {
                    required: "当前密码不能为空",
                },
                newPassword: {
                    required: "新密码不能为空"
                },
                reNewPassword: {
                    required: "确认密码不能为空"
                }
            },
            submitHandler: function(form) {
               $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "<?php echo U('account/password');?>",
                    data: $("#password").serialize(),
                    success: function(data){
                        bootbox.alert(data.info);
                    }
                })
            }
        });
    });
</script>