<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="description" content=""><meta name="author" content=""><meta name="renderer" content="webkit|ie-comp|ie-stand"><title>世界杯赌球记 -  Powered by Weit </title><meta name="keywords" content="<?php echo C('site.keywords');?>" /><meta name="description" content="<?php echo C('site.des');?>" /><link href="__PUBLIC__/css/bootstrap.css" rel="stylesheet"><link href="__PUBLIC__/css/style.css" rel="stylesheet"><link rel="stylesheet" href="__PUBLIC__/css/font-awesome/css/font-awesome.min.css"><!--[if lt IE 9]><script src="__PUBLIC__/js/html5.js"></script><script src="__PUBLIC__/js/css3.js"></script><script src="__PUBLIC__/js/respond.min.js"></script><![endif]--></head><body><div class="navbar navbar-default navbar-static-top">	<div class="container">		<div class="navbar-header">			<button type="button" class="navbar-toggle needsclick" data-toggle="collapse" data-target=".navbar-collapse">				<span class="icon-bar"></span>				<span class="icon-bar"></span>				<span class="icon-bar"></span>			</button>			<a class="navbar-brand">铿锵三逗逼</a>		</div>	    <div class="navbar-collapse collapse">			<ul class="nav navbar-nav">				<li <?php if( MODULE_NAME == 'Feed' ): ?>class="active"<?php endif; ?> ><a href="<?php echo U('feed/index');?>">孤注一掷</a></li>				<li <?php if( MODULE_NAME == 'Topic' ): ?>class="active"<?php endif; ?> ><a href="<?php echo U('topic/index');?>">所剩无几</a></li>			</ul>			<ul class="nav navbar-nav navbar-right ">				<?php if(($mid) > "0"): ?><li>						<a>							<?php echo ($user["username"]); ?>						</a>					</li>					<li class="dropdown">						<a href="#" class="dropdown-toggle" data-toggle="dropdown">						<i class="fa fa-cog"></i>						</a>						<ul class="dropdown-menu" role="menu">			                <li><a href="<?php echo U('user/logout');?>"><i class="fa fa-power-off"></i>退出</a></li>			            </ul>					</li>				<?php else: ?>					<li><a href="<?php echo U('user/login');?>">登录</a></li><?php endif; ?>			</ul>	    </div>	</div></div>
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel">
                <div class="panel-heading">
                    公款                                                  
                </div>
                <div class="panel-body">
                   <?php echo ($record["public_money_all"]); ?>
                </div>
            </div>
            <div class="panel">
                <div class="panel-heading">
                    陈逗逼的帐面                                                  
                </div>
                <div class="panel-body">
                   <?php echo ($record["cyx_money_all"]); ?>
                </div>
            </div>
            <div class="panel">
                <div class="panel-heading">
                    谢逗逼的帐面                                                  
                </div>
                <div class="panel-body">
                   <?php echo ($record["xwj_money_all"]); ?>
                </div>
            </div>
            <div class="panel">
                <div class="panel-heading">
                    高逗逼的帐面                                                 
                </div>
                <div class="panel-body">
                   <?php echo ($record["ghw_money_all"]); ?>
                </div>                
            </div>
        </div>

        
        <div class="col-md-9">
            <div class="panel">
                <div class="panel-body">
                    <?php
 echo '<table class="table table-striped ">'; echo '<tr><td><strong>队伍</strong></td><td><strong>比分</strong></td><td><strong>队伍</strong></td><td><strong>陈逗逼下的注</strong></td><td><strong>谢逗逼下的注</strong></td><td><strong>高逗逼下的注</strong></td><td><strong>公款</strong></td></tr>'; for ($count = $finish_count; $count>=1; $count--) { $public_money[$count] = -round($record["xwj_money"][$count]+$record["cyx_money"][$count]+$record["ghw_money"][$count], 2); if ($public_money[$count]>=0) $public_money[$count] = " + ¥".$public_money[$count]; else $public_money[$count] = " - ¥".(-1*$public_money[$count]); echo '<tr>'; echo '<td>'. $teama[$count-1] .'</td>'. '<td>'.$score[$count-1] .'</td>'. '<td>'.$teamb[$count-1] .'</td>'; if ($record["cyx_money"][$count]>=0) $record["cyx_money"][$count] = " + ¥".$record["cyx_money"][$count]; else $record["cyx_money"][$count] = " - ¥".(-1*$record["cyx_money"][$count]); if ($record["xwj_money"][$count]>=0) $record["xwj_money"][$count] = " + ¥".$record["xwj_money"][$count]; else $record["xwj_money"][$count] = " - ¥".(-1*$record["xwj_money"][$count]); if ($record["ghw_money"][$count]>=0) $record["ghw_money"][$count] = " + ¥".$record["ghw_money"][$count]; else $record["ghw_money"][$count] = " - ¥".(-1*$record["ghw_money"][$count]); echo '<td>'. $record["cyx_bet"][$count].$record["cyx_money"][$count] .'</td><td>'. $record["xwj_bet"][$count].$record["xwj_money"][$count].'</td><td>' .$record["ghw_bet"][$count]. $record["ghw_money"][$count].'</td>'; echo '<td>'.$public_money[$count].'</td>'; echo '</tr>'; } echo '</table>'; ?>                              
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