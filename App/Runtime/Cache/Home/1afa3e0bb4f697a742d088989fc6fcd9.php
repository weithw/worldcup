<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<div class="container">
	<div class="row">
		<div class="panel talk-form">
			<div class="panel-heading">
				找回密码
			</div>
			<form  id="find-password" action=""  method="post" class="form-horizontal">
				<fieldset>
					<div class="form-group">
						<label for="email" class="col-md-3 control-label">邮箱：</label>
						<div class="col-md-6">
							<input type="text" id="email"  name="email" class="form-control"  value="">
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-md-3 control-label">验证码：</label>
						<div class="col-md-3">
							<input type="text" id="captcha"  name="verify" class="form-control"  value="" >
						</div>
						<div class="col-md-3">
							<img src="<?php echo U('user/verify');?>" alt="" class="" id="verify">
						</div>
						<div class="col-md-2">
							<a href="javascript:;" id="reloadVerify" title="换一张">换一张？</a>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-3 col-md-6">
							<button type="submit" class="btn btn-primary">确定</button>
						</div>
					</div>
				</fieldset>
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
	$("#find-password").validate({
	    rules: {
	        email: {
	            required: true,
	            email: true
	        },
	        verify: {
	        	required: true,
	        	remote: {
	        		url : '<?php echo U("user/checkVerify");?>',
	        		type: 'post',
	        		dataType: "json",
	        		data: {
	        			captcha: function(){return $('#captcha').val();}
	        		},
	        		dataFilter: function(data, type){
	        			if (data) {
	        			 	return true;
	        			} else {
	        				return false;
	        			}
	        		}
	        	}
	        }
	    },
	    messages: {

	        email: {
	            required: "邮箱不能为空",
	            email: "邮箱格式不正确"
	        },
	        verify: {
	        	required: "验证码不能为空",
	        	remote: "验证码错误"
	        }
	    },
	    submitHandler: function() {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "<?php echo U('user/password');?>",
                data: $("#find-password").serialize(),
                success: function(data){
                	if (data.status == 0) {
    	            	bootbox.alert(data.info);
    	            	return  false;
                	} else {
                		bootbox.alert(data.info);
                		return  false;
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