<?php
class MatchAction extends Action{
	public function update($match_id, $score) {
	   D('Match')->updateScore($match_id, $score);
	}
    public function add($teama,$teamb,$match_id=0) {
       D('Match')->addRecord($teama,$teamb,$match_id);
    }

	// public function update() {
	// 	$url = "http://worldcup.2014.163.com/schedule/calendar/?bdsc";
 //        $contents = file_get_contents($url); 
 //        preg_match_all('|<a class="match_team"(.*?)">(.*?)<\/a>|i',$contents,$match_team);
 //        $team = $match_team[2];
 //        preg_match_all('|<span class="match_score">(\d-\d)|i',$contents,$match_score);
 //        $score = $match_score[1];
 //        $finish_count = count($team)/2;    
 //        for ($i=0;$i<$finish_count;$i++) 
 //        {
 //        	echo "[".($i+1)."]".$team[$i*2].$score[$i].$team[$i*2+1];
 //        	if (!$score[$i])
 //        		$score[$i] = "-";
 //        	D('Update')->update($i+1,$team[$i*2],$score[$i],$team[$i*2+1]);
 //        }		
	// }
}
