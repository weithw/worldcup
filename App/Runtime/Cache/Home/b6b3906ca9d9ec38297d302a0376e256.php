<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="panel">
                <div class="panel-body">
                    <?php
 echo '<table class="table table-striped ">'; echo '<tr><td><strong>队伍</strong></td><td><strong>比分</strong></td><td><strong>队伍</strong></td><td><strong>陈逗逼下的注</strong></td><td><strong>谢逗逼下的注</strong></td><td><strong>高逗逼下的注</strong></td><td><strong>公款</strong></td></tr>'; for ($count = $finish_count; $count>=1; $count--) { $public_money[$count] = -round($record["xwj_money"][$count]+$record["cyx_money"][$count]+$record["ghw_money"][$count], 2); if ($public_money[$count]>=0) $public_money[$count] = " + ¥".$public_money[$count]; else $public_money[$count] = " - ¥".(-1*$public_money[$count]); echo '<tr>'; echo '<td>'. $teama[$count-1] .'</td>'. '<td>'.$score[$count-1] .'</td>'. '<td>'.$teamb[$count-1] .'</td>'; if ($record["cyx_money"][$count]>=0) $record["cyx_money"][$count] = " + ¥".$record["cyx_money"][$count]; else $record["cyx_money"][$count] = " - ¥".(-1*$record["cyx_money"][$count]); if ($record["xwj_money"][$count]>=0) $record["xwj_money"][$count] = " + ¥".$record["xwj_money"][$count]; else $record["xwj_money"][$count] = " - ¥".(-1*$record["xwj_money"][$count]); if ($record["ghw_money"][$count]>=0) $record["ghw_money"][$count] = " + ¥".$record["ghw_money"][$count]; else $record["ghw_money"][$count] = " - ¥".(-1*$record["ghw_money"][$count]); echo '<td>'. $record["cyx_bet"][$count].$record["cyx_money"][$count] .'</td><td>'. $record["xwj_bet"][$count].$record["xwj_money"][$count].'</td><td>' .$record["ghw_bet"][$count]. $record["ghw_money"][$count].'</td>'; echo '<td>'.$public_money[$count].'</td>'; echo '</tr>'; } echo '</table>'; ?>                              
                </div>
        
            </div>
        </div>
        <div class="col-md-3">
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