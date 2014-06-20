<?php
/**
 * TalkPiece  开源垂直社区
 *
 * @author     thinkphper <service@talkpiece.com>
 * @copyright  2014  talkpiece
 * @license    http://www.talkpiece.com/license
 * @version    1.0
 * @link       http://www.talkpiece.com
 */

class FeedModel  extends  Model{
	protected $tableName = 'record';
	public function update($username, $option, $match_id, $bet_num) {
		// $redis = new Redis();
		// $redis->connect("127.0.0.1",6379); 

		// $key = "worldcup_bet_" . $username;
		// $bet = json_decode($redis->hget($key,$match_id));
		//var_dump($bet);
		//key:worldcup_bet_ghw  field:1(match_id)  value:{"0":"1","1":"2","2":"0"}
		$bet[0] = 0;
		$bet[1] = 0;
		$bet[2] = 0;
		
		$bet[$option] = (int)$bet_num;
		$data = array($username=>json_encode($bet));
		
		D('feed')->where("MatchID={$match_id}")->save($data);
		// if ($username == "cyx") {
		// 	$data = array("cyx"=>json_encode($bet));
		// 	$this->where("MatchID={$match_id}")->save($data);
		// }
		// else if ($username == "xwj") {
		// 	$data = array($username=>json_encode($bet));
		// 	$this->where("MatchID={$match_id}")->save($data);
		// }
		// else if ($username == "ghw") {
		// 	$data = array("ghw"=>json_encode($bet));
		// 	$this->where("MatchID={$match_id}")->save($data);

		//$redis->hset($key,$match_id,json_encode($bet));
	}

	
}
?>