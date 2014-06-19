<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel">
                    <div class="panel-heading">
                        <h4>账号设置</h4>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#">基本信息</a></li>
                            <li><a href="<?php echo U('account/password');?>">密码安全</a></li>
                        </ul>
                        <div class="talk-account">
                            <form class="form-horizontal" action="<?php echo U('account/settings');?>"  method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="username">用户名：</label>
                                        <div class="col-md-4">
                                            <p>是逗逼，没办法</p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="gender">性别：</label>
                                        <div class="col-md-4">
                                            <input type="radio" name="gender" id="gender" value="1"
                                                <?php if(($user['gender']) == "1"): ?>checked="checked"<?php endif; ?> >男
                                            <input type="radio" name="gender" id="sex" value="2"
                                                <?php if(($user['gender']) == "2"): ?>checked="checked"<?php endif; ?>>女
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="area">地区：</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="area" name="area" value="<?php echo ($user['area']); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="area">个人介绍：</label>
                                        <div class="col-md-6">
                                            <textarea class="form-control"  name="intro" rows="6" cols="5"><?php echo ($user['intro']); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-offset-2 col-md-6">
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