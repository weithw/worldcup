<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="description" content=""><meta name="author" content=""><meta name="renderer" content="webkit|ie-comp|ie-stand"><title>铿锵三逗逼 -  Powered by Weit </title><meta name="keywords" content="<?php echo C('site.keywords');?>" /><meta name="description" content="<?php echo C('site.des');?>" /><link href="__PUBLIC__/css/bootstrap.css" rel="stylesheet"><link href="__PUBLIC__/css/style.css" rel="stylesheet"><link rel="stylesheet" href="__PUBLIC__/css/font-awesome/css/font-awesome.min.css"><!--[if lt IE 9]><script src="__PUBLIC__/js/html5.js"></script><script src="__PUBLIC__/js/css3.js"></script><script src="__PUBLIC__/js/respond.min.js"></script><![endif]--></head><body><div class="navbar navbar-default navbar-static-top">	<div class="container">		<div class="navbar-header">			<button type="button" class="navbar-toggle needsclick" data-toggle="collapse" data-target=".navbar-collapse">				<span class="icon-bar"></span>				<span class="icon-bar"></span>				<span class="icon-bar"></span>			</button>			<a class="navbar-brand">世界杯赌球记</a>		</div>	    <div class="navbar-collapse collapse">			<ul class="nav navbar-nav">				<li <?php if( MODULE_NAME == 'Feed' ): ?>class="active"<?php endif; ?> ><a href="<?php echo U('feed/index');?>">孤注一掷</a></li>				<li <?php if( MODULE_NAME == 'Topic' ): ?>class="active"<?php endif; ?> ><a href="<?php echo U('topic/index');?>">所剩无几</a></li>			</ul>			<ul class="nav navbar-nav navbar-right ">				<?php if(($mid) > "0"): ?><li>						<a href="<?php echo U('user/index', array('uid'=>$user['uid']));?>">							<?php echo ($user["username"]); ?>						</a>					</li>					<li class="dropdown">						<a href="#" class="dropdown-toggle" data-toggle="dropdown">						<i class="fa fa-cog"></i>						</a>						<ul class="dropdown-menu" role="menu">			                <li><a href="<?php echo U('account/settings');?>"><i class="fa fa-user"></i>账号设置</a></li>			                <li class="divider"></li>            				<?php if(($user["flag"]) == "1"): ?><li><a href="<?php echo U('admin/public/login');?>"><i class="fa fa-dashboard"></i>后台管理</a></li>			               	<li class="divider"></li><?php endif; ?>						                <li><a href="<?php echo U('user/logout');?>"><i class="fa fa-power-off"></i>退出</a></li>			            </ul>					</li>				<?php else: ?>					<li><a href="<?php echo U('user/login');?>">登录</a></li><?php endif; ?>			</ul>	    </div>	</div></div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-body">
	<ul class="media-list talk-user">
		<li class="media">
			<img src="<?php echo uavatar($user_list['uid'], 'big');?>" class="talk-avatar big pull-left">
			<div class="media-body">
				<?php if(($mid > 0) AND ( $uid != $mid)): ?><div class="profile-action pull-right">
						<?php if(($is_follow) == "1"): ?><a href="javascript:;" class="btn btn-success" id="unfollow" data-uid="<?php echo ($user_list["uid"]); ?>">取消关注</a>
						<?php else: ?>
							<a href="javascript:;" class="btn btn-default" id="follow" data-uid="<?php echo ($user_list["uid"]); ?>">关注</a><?php endif; ?>&nbsp;
						<button class="btn btn-primary" data-toggle="modal">私信</button>
					</div><?php endif; ?>
				<h3><?php echo ($user_list['username']); ?></h3>
				<ul>
					<li>
						<strong><?php echo date('Y-m-d', $user_list['create_time']);?></strong> 加入 
						<span class="slant">•</span> <strong><?php echo ($user_list['credit']); ?></strong> 积分
					</li>
					<li>
						<?php if(!empty($user_list["area"])): echo ($user_list["area"]); endif; ?>
					</li>
					<li>
						<?php if(!empty($user_list["intro"])): echo ($user_list["intro"]); ?>
						<?php else: ?>
							还没有个人介绍<?php endif; ?>
					</li>
				</ul>
			</div>
		</li>
	</ul>
</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="user-action panel">
					<ul class="nav nav-tabs">
						<li class="active"><a href="<?php echo U('user/index', array('uid'=>$user_list['uid']));?>">话题</a></li>
						<li><a href="<?php echo U('user/followers', array('uid'=>$user_list['uid']));?>">关注</a></li>
						<li><a href="<?php echo U('user/fans',array('uid'=>$user_list['uid']));?>">粉丝</a></li>
					</ul>
					<div class="tab-content">
						<?php if(!empty($topic_lists["data"])): ?><ul class="media-list talk-topic ">
				      		<?php if(is_array($topic_lists["data"])): $i = 0; $__LIST__ = $topic_lists["data"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$topic): $mod = ($i % 2 );++$i;?><li class="media">
								<a class="pull-left" href="<?php echo U('user/index', array('uid'=>$topic['uid']));?>">
									<img src="<?php echo uavatar($topic['uid']);?>" class="talk-avatar" width="50" height="50">
								</a>
								<div class="media-body">
									<?php if(($topic["post_num"]) > "0"): ?><div class="badge pull-right"><?php echo ($topic['post_num']); ?></div><?php endif; ?>
									<h4 class="media-heading"><a  href="<?php echo U('topic/detail', array('tid'=>$topic['tid']));?>"> <?php echo ($topic['subject']); ?></a></h4>
									<p><a href="<?php echo U('user/index', array('uid'=>$topic['uid']));?>"><?php echo ($topic['username']); ?></a> 发布于 <?php echo friendly_date($topic['create_time']);?></p>
								</div>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
						<?php else: ?>
							还没有发表话题<?php endif; ?>
						<?php if(!empty($topic_lists['page'])): ?><div class="text-center">
						        <?php echo ($topic_lists['page']); ?>
							</div><?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="message" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">发私信</h4>
			</div>
			<form id="send-message" class="form-horizontal">
				<div class="modal-body">
					<div class="form-group">
						<div class="col-md-2 control-label"><label for="message_receiver" class="required">发给：</label></div>
						<div class="col-md-8">
							<input type="text" class="form-control"  value="<?php echo ($user_list['username']); ?>" disabled/>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 control-label"><label>内容</label></div>
						<div class="col-md-8">
							<textarea id="content" name="content"  class="form-control" rows="5"></textarea>
						</div>
					</div>
					<div class="form-group">
					      <div class="col-md-offset-2 col-md-2">
					      	<input type="hidden" name="touid" id="touid" value="<?php echo ($user_list['uid']); ?>">
					        <button class="btn btn-primary" type="submit">发送</button>
					      </div>
					      <div class="col-md-4">
					      		<div id="error"></div>
					      </div>
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
	$(function(){
		$('[data-toggle="modal"]').on('click', function(e) {
				$('#message').modal();
			});
		$('#send-message').on('submit',function(e) {
			e.preventDefault();
			var touid = $('#touid').val(),
			    content =$.trim($('#content').val());
			if (content == '') {
				$('#error').html('内容不能为空!');
				return  false;
			}
			$.ajax({
				url: '<?php echo U('message/send');?>',
				type: 'post',
				dataType: 'json',
				data: { touid:touid, content:content},
				success: function(data) {
					$('#content').val('');
					$('#message').modal('hide');
				}
			});

		});

		$('#follow').on('click', function(e) {
			var touid = $(this).attr('data-uid');
			$.ajax({
				url: '<?php echo U("user/follow");?>',
				type: 'POST',
				dataType: 'json',
				data: { touid: touid},
				success: function(data) {
					if (data.status ==0) {
						bootbox.alert(data.info);
					} else {
						location.reload();
					}
				}
			});
			
		});

		$('#unfollow').on('click', function(e) {
			var touid = $(this).attr('data-uid');
			$.ajax({
				url: '<?php echo U("user/unfollow");?>',
				type: 'POST',
				dataType: 'json',
				data: { touid: touid},
				success: function(data) {
					if (data.status ==0) {
						bootbox.alert(data.info);
					} else {
						location.reload();
					}
				}
			});
		});
	});
</script>
</body>
</html>