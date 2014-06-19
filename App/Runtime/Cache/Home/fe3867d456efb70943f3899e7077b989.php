<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

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