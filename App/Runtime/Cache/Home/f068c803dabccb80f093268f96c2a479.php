<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h4>账号设置</h4>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-tabs">
                            <li><a href="<?php echo U('account/settings');?>">基本信息</a></li>
                            <li class="active"><a href="<?php echo U('account/avatar');?>">修改头像</a></li>
                            <li><a href="<?php echo U('account/password');?>">密码安全</a></li>
                        </ul>
                        <div class="talk-account">
                            <div class="col-md-2">
                                <img id="user-avatar" src="<?php echo uavatar($user['uid'], 'big');?>" alt="" class="talk-avatar big" >
                            </div>
                            <div class="col-md-4">
                                <span class="btn btn-success fileinput-button">
                                    <span>上传头像...</span>
                                    <input id="fileupload" type="file" name="files" data-url="<?php echo U('account/upload');?>">
                                </span>
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
<script  src="__PUBLIC__/js/jquery.ui.widget.js"></script>
<script  src="__PUBLIC__/js/jquery.iframe-transport.js"></script>
<script  src="__PUBLIC__/js/jquery.fileupload.js"></script>

<script type="text/javascript">
$(function() {
    $('#fileupload').fileupload({
        dataType: 'json',
        done:  function(e,json) {
            var data = json.result;
            if (data.status ==0) {
                bootbox.alert(data.msg);
            }else{
                $('#user-avatar').attr('src', data.avatar + '?r=' + Math.random());
            }
        }
    });
 });
</script>