<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="panel">
                <div class="panel-heading">
                    <h4>消息</h4>
                </div>
                <div class="panel-body">
                    <?php if(!empty($notify_list["data"])): ?><ul class="media-list notify-list">
                            <?php if(is_array($notify_list["data"])): $i = 0; $__LIST__ = $notify_list["data"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$notify): $mod = ($i % 2 );++$i;?><li class="media">
                                    <a href="<?php echo U('user/index', array('uid'=>$notify['from_uid']));?>" class="pull-left">
                                        <img src="<?php echo uavatar($notify.from_uid);?>" alt="" width="50" height="50" class="avatar">
                                    </a>
                                    <div class="media-body">
                                        <?php switch($notify["type"]): case "1": ?><h5 class="media-heading"><a href="<?php echo U('user/index', array('uid'=>$notify['from_uid']));?>"><?php echo ($notify["from_uname"]); ?></a> 评论你的话题 <a href="<?php echo U('topic/detail',array('tid'=>$notify['tid']));?>"><?php echo ($notify["subject"]); ?></a>
                                                    <small><?php echo friendly_date($notify['create_time']);?></small>
                                                </h5>
                                                <?php if(!empty($notify["content"])): ?><div class="alert alert-warning">
                                                    <p><?php echo ($notify["content"]); ?></p>
                                                </div>
                                                <?php else: ?>
                                                <div class="alert alert-warning">
                                                    抱歉,该评论已被作者删除
                                                </div><?php endif; break;?>
                                            <?php case "2": ?><h5 class="media-heading"><a href="<?php echo U('user/index', array('uid'=>$notify['from_uid']));?>"><?php echo ($notify["from_uname"]); ?></a> 关注了你
                                                    <small><?php echo friendly_date($notify['create_time']);?></small>
                                                </h5><?php break;?>
                                            <?php case "3": ?><h5 class="media-heading"><a href="<?php echo U('user/index', array('uid'=>$notify['from_uid']));?>"><?php echo ($notify["from_uname"]); ?></a> 评论话题 <a href="<?php echo U('topic/detail',array('tid'=>$notify['tid']));?>"><?php echo ($notify["subject"]); ?></a>时提到了你
                                                    <small><?php echo friendly_date($notify['create_time']);?></small>
                                                </h5>
                                                <?php if(!empty($notify["content"])): ?><div class="alert alert-warning">
                                                    <p><?php echo ($notify["content"]); ?></p>
                                                </div>
                                                <?php else: ?>
                                                <div class="alert alert-warning">
                                                    抱歉,该评论已被作者删除
                                                </div><?php endif; break; endswitch;?>
                                    </div>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <div class="text-center">
                            <?php echo ($notify_list["page"]); ?>
                        </div>
                    <?php else: ?>
                        还没有提醒<?php endif; ?>
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