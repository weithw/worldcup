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
		
		var_dump(D('feed')->where("MatchID={$match_id}")->save($data));
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

	public   function   getFeedLists($uid){

		$follow_users = D('UserFollow')->where(array('from_uid'=>$uid, 'status'=>1))->select();

		foreach ($follow_users as $key => $follow) {
			$follow_uids[]  =  $follow['to_uid'];
		}

		if ($follow_uids) {

			$map['uid']  = array('IN', implode(',', $follow_uids));

			$result['data']  = $this->where($map)->order( 'create_time DESC' )->selectPage( 10 );
			if (!empty($result['data'])) {
				foreach ($result['data'] as $key => $feed) {
					$result['data'][$key] = D('Feed')->parseFeed($feed);
				}
			}
			if ( !empty( $this->page ) ) {
				$result['page']  = $this->page;
			}
		}
		return  $result;
	}
	public   function   addFeed($id, $type){
		switch ($type) {
			case 'topic':
				$topic =  D('Topic')->getAuthorTopic($id);
				$data  = array(
					'uid'  => $topic['uid'],
					'id'   => $id,
					'type' => 'topic',
					'template'  => '{subject}',
					'data'      => array(
									'subject' => '<a href="'.U('topic/detail', array('tid'=>$id)).'" target="_blank" >' . $topic['subject'] . '</a>'								
								    ),
					'create_time'    => $topic['create_time'] 
				);
				break;
			
			default:
				break;
		}

		$data['data']  = serialize($data['data']);

		D('Feed')->add($data);
	}

	public function parseFeed($feed){
		$feed['data']  = !empty($feed['data']) ? unserialize($feed['data']) :  array();
		if($feed['data'] && is_array($feed['data'])) {
			foreach (array_keys($feed['data']) as $key) {
				$searchs[]  = '{'.$key.'}';
				$replaces[] = $feed['data'][$key];
			}
		}
		$feed['template']  = str_replace($searchs,  $replaces, $feed['template']);
		return $feed;
	}
}
?>