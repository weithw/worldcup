<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="panel">
                <div class="panel-body">
                    <?php
 $url = "http://worldcup.2014.163.com/schedule/calendar/?bdsc"; $contents = file_get_contents($url); preg_match_all('|<a class="match_team"(.*?)">(.*?)<\/a>|i',$contents,$match_team); $team = $match_team[2]; preg_match_all('|<span class="match_score">(\d-\d)|i',$contents,$match_score); $score = $match_score[1]; $finish_count = count($score)-1; echo '<table class="table table-striped table-condensed">'; for ($count = $finish_count+1; $count<count($team)/2; $count++) { echo '<form action="http://127.0.0.1:8083/index.php?m=feed&a=test" method="post">'; echo '<tr>'; echo '<td style="width:20%"><label class="radio"> <input name="opt" type="radio" value="0">' . $team[$count*2] . '胜</input></label>  </td>'; echo '<td><label class="radio"> <input name="opt" type="radio" value="1">' . '平局' .'</input></label>  </td>'; echo '<td><label class="radio"> <input name="opt" type="radio" value="2">' . $team[$count*2+1] .'胜</input></label>  </td>'; echo '<td><select  class="form-control" name="select"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>0</option></select><br></td>'; echo '<td><input type="submit" class="btn btn-primary" value="投注/改注"/></td>'; echo '<td><input type="hidden" name="username" value="' . $user["username"] . '" /></td>'; echo '<td><input type="hidden" name="match_id" value="' . $count . '" /></td>'; echo '</tr>'; echo '</form>'; } echo '</table>'; ?>                
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