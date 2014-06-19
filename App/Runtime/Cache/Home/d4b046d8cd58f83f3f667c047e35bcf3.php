<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="panel">
                <div class="panel-heading">
                    <h4>私信</h4>
                </div>
                <div class="panel-body">
                    <?php if(!empty($message_lists["data"])): ?><ul class="media-list  message-list">
                        <?php if(is_array($message_lists["data"])): $i = 0; $__LIST__ = $message_lists["data"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$message): $mod = ($i % 2 );++$i;?><li class="media">
                                <a href="<?php echo U('user/index',array('uid'=>$message['uid']));?>" class="pull-left">
                                    <img src="<?php echo uavatar($message['uid']);?>" alt="" class="talk-avatar middle">
                                </a>
                                <div class="media-body">
                                    <span class="pull-right"><a href="<?php echo U('message/detail',array('id'=>$message['id']));?>">查看对话</a></span>
                                    <h5 class="media-heading">
                                        <a href="<?php echo U('user/index',array('uid'=>$message['uid']));?>"><?php echo ($message['username']); ?></a>
                                        <small><?php echo friendly_date($message['update_time']);?></small>
                                    </h5>
                                    <div class="content">
                                        <?php if($message['last_uid'] == $mid): ?><strong><i class="fa fa-mail-reply"></i></strong><?php endif; ?>
                                        <?php echo ($message['last_content']); ?>
                                    </div>
                                </div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <div class="text-center">
                        <?php echo ($message_lists['page']); ?>
                    </div>
                    <?php else: ?>
                        还没有私信<?php endif; ?>
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
</body>
</html>