<?php
/**
 * TalkPiece  开源社区
 *
 * @author     talkpiece <service@talkpiece.com>
 * @copyright  2014  talkpiece
 * @license    http://www.talkpiece.com/license
 * @version    1.0
 * @link       http://www.talkpiece.com
 */

class TopicModel  extends Model{
	protected $tableName = 'record';
	/**
	 * 最新话题列表
	 *
	 * @param [type]  $condition [description]
	 * @param [type]  $pagesize  [description]
	 * @return [type]            [description]
	 */
	public function getNotFinishRecord($user_id) {
		$username = D('user')->getUserName($user_id);
		return $this->getField($username, true);
	}

	public function getFinishRecord($count, $score) {
		// $redis = new Redis();
		// $redis->connect("127.0.0.1",6379); 
		$public_money = array();
		//$this->field( '*' )->where( $condition )
		
		for ($match_id=$count; $match_id>=1; $match_id--) {
			$row = $this->where("MatchID={$match_id}")->find();
			if ($row) {
				$cyx_bet[$match_id] = $row["cyx"];
				$xwj_bet[$match_id] = $row["xwj"];
				$ghw_bet[$match_id] = $row["ghw"];
			} else {
				$cyx_bet[$match_id] = "[0,0,0]";
				$xwj_bet[$match_id] = "[0,0,0]";
				$ghw_bet[$match_id] = "[0,0,0]";
			}
			$pubilc_money[$match_id] = 0.0;
			$all_bet_win[$match_id] += $cyx_bet[$match_id][1]+$xwj_bet[$match_id][1]+$ghw_bet[$match_id][1];
			$all_bet_draw[$match_id] += $cyx_bet[$match_id][3]+$xwj_bet[$match_id][3]+$ghw_bet[$match_id][3];
			$all_bet_lost[$match_id] += $cyx_bet[$match_id][5]+$xwj_bet[$match_id][5]+$ghw_bet[$match_id][5];	
			$cyx_bet_all[$match_id] = $cyx_bet[$match_id][1]+$cyx_bet[$match_id][3]+$cyx_bet[$match_id][5];
			$xwj_bet_all[$match_id] = $xwj_bet[$match_id][1]+$xwj_bet[$match_id][3]+$xwj_bet[$match_id][5];
			$ghw_bet_all[$match_id] = $ghw_bet[$match_id][1]+$ghw_bet[$match_id][3]+$ghw_bet[$match_id][5];
			
			$all_bet[$match_id] = '[' . $all_bet_win[$match_id].',' . $all_bet_draw[$match_id].',' . $all_bet_lost[$match_id]. ']';
			$sum[$match_id] = $all_bet[$match_id][1]+$all_bet[$match_id][3]+$all_bet[$match_id][5];
			if ($score[$match_id-1][0] == $score[$match_id-1][2]){
				$cyx_money[$match_id] = $sum[$match_id] * 2 * ($cyx_bet[$match_id][3]/$all_bet_draw[$match_id]) - 2*$cyx_bet_all[$match_id];
				$xwj_money[$match_id] = $sum[$match_id] * 2 * ($xwj_bet[$match_id][3]/$all_bet_draw[$match_id]) - 2*$xwj_bet_all[$match_id];
				$ghw_money[$match_id] = $sum[$match_id] * 2 * ($ghw_bet[$match_id][3]/$all_bet_draw[$match_id]) - 2*$ghw_bet_all[$match_id];
			} else if ($score[$match_id-1][0] > $score[$match_id-1][2]) {
				$cyx_money[$match_id] = $sum[$match_id] * 2 * ($cyx_bet[$match_id][1]/$all_bet_win[$match_id]) - 2*$cyx_bet_all[$match_id];
				$xwj_money[$match_id] = $sum[$match_id] * 2 * ($xwj_bet[$match_id][1]/$all_bet_win[$match_id]) - 2*$xwj_bet_all[$match_id];
				$ghw_money[$match_id] = $sum[$match_id] * 2 * ($ghw_bet[$match_id][1]/$all_bet_win[$match_id]) - 2*$ghw_bet_all[$match_id];				
			} else if ($score[$match_id-1][0] < $score[$match_id-1][2]) {
				$cyx_money[$match_id] = $sum[$match_id] * 2 * ($cyx_bet[$match_id][5]/$all_bet_lost[$match_id]) - 2*$cyx_bet_all[$match_id];
				$xwj_money[$match_id] = $sum[$match_id] * 2 * ($xwj_bet[$match_id][5]/$all_bet_lost[$match_id]) - 2*$xwj_bet_all[$match_id];
				$ghw_money[$match_id] = $sum[$match_id] * 2 * ($ghw_bet[$match_id][5]/$all_bet_lost[$match_id]) - 2*$ghw_bet_all[$match_id];				
			}		
			$pubilc_money[$match_id] = $ghw_money[$match_id] + $xwj_money[$match_id] + $cyx_money[$match_id];
			
			$cyx_money[$match_id] = round($cyx_money[$match_id],2);
			$xwj_money[$match_id] = round($xwj_money[$match_id],2);
			$ghw_money[$match_id] = round($ghw_money[$match_id],2);
			
			$public_money_all += $pubilc_money[$match_id];
			$cyx_money_all += $cyx_money[$match_id];
			$xwj_money_all += $xwj_money[$match_id];
			$ghw_money_all += $ghw_money[$match_id];
		}
		return array(
				"cyx_bet" => $cyx_bet,
				"xwj_bet" => $xwj_bet,
				"ghw_bet" => $ghw_bet,
				"cyx_money" => $cyx_money,
				"xwj_money" => $xwj_money,
				"ghw_money" => $ghw_money,
				"cyx_money_all" => $cyx_money_all,
				"xwj_money_all" => $xwj_money_all,
				"ghw_money_all" => $ghw_money_all,
				"public_money" => $public_money,
				"public_money_all" => $public_money_all,
			);
		
	}

	public  function getRecentTopic( $condition, $pagesize =10) {
		
		$result['data']  = $this->field( '*' )->where( $condition )->order( 'last_post_time desc' )->selectPage( $pagesize );
		$result['data'] =  $this->getExtraTopic($result['data']);

		if ( !empty( $this->page ) ) {
			$result['page']  = $this->page;
		}
		return  $result;
	}

	public function  getStickTopic($order='create_time', $limit=5){
		$result = $this->where(array('is_stick'=>1,'status'=>1))->order($order)->limit($limit)->select();
		$result = $this->getExtraTopic($result);
		return $result;
	}
	public  function  getExtraTopic($data){
		if (!empty($data)) {
			foreach ( $data as $key => $v ) {
				$category  = D( 'TopicCategory' )->where( array( 'id'=>$v['cid'] ) )->getField( 'name, des' );
				$data[$key]['username'] = get_username( $v['uid'] );
				if ($category) {
					$data[$key]['cate_list'] = $category;
				}
			}
		}
		return  $data;
	}

	public  function insert( $cid, $uid, $subject, $content ) {

		$tid = $this->add( array(
				'cid'         => $cid,
				'uid'         => $uid,
				'subject'     => $subject,
				'create_time' => time(),
				'update_time'  => time(), 
				'last_post_time' => time(),
				'last_post_uid'  =>  $uid
			) );
		if ( $tid ) {
			D( 'User' )->getCredit( $uid, 'add_topic' );
			D( 'TopicPost' )->insert( $tid, $uid, 1, $content );
			D( 'TopicCategory' )->incTopicNum( $cid );
			return  $tid;
		}
	}

	public  function update( $tid, $cid, $uid, $subject, $content ) {
		$result =   $this->where( array( 'tid'=>$tid, 'uid'=>$uid ) )->save( array( 'cid'=>$cid, 'subject'=>$subject, 'update_time' =>time() ) );
		if ( !$result ) {
			return  false;
		}
		D( 'TopicPost' )->update( $tid, $uid, $content );
		return  true;
	}

	public   function  del($tid, $topic){

		$this->where(array('tid'=>$tid))->delete();
		D('TopicPost')->where(array('tid'=>$tid))->delete();

		return true;
	}

	public  function reply( $tid, $uid, $content ) {

		$content = parseAtUname($content);
		$topic = D( 'Topic' )->where( array( 'tid'=>$tid ) )->getField( 'uid, cid' );

		$data    = array (
			'tid'         => $tid,
			'content'     => $content,
			'uid'         => $uid,
			'create_time' => time()
		);
		$pid = D( 'TopicPost' )->add( $data );

		$this->parseAtContent($content, $topic['uid']);
		$this->incPostNum( $tid, $uid );
		D( 'User' )->getCredit( $uid, 'add_post' );
		
		if ($uid != $topic['uid']) {
			D( 'Notify' )->addNotify( $uid, $topic['uid'], 1, $tid, $pid );
		}
		
		return  $pid;
	}
	public  function  parseAtContent($content, $topic_uid){
		if ( strpos( $content, '@' ) ) {
			preg_match_all( "/@([\w\x{2e80}-\x{9fff}\-]+)/u", $content, $matches );

			if ( !empty( $matches ) ) {
				foreach ( $matches[1] as $key => $name ) {
					$at_uid = D( 'User' )->where( array( 'username'=>$name ) )->getField( 'uid' );
					if ( $at_uid ) {
						$at_uids[] =$at_uid;
					}
				}
				$at_uids = array_unique( $at_uids );
				foreach ( $at_uids as $k => $to_uid ) {
					if ($to_uid != $topic_uid) {
						D( 'Notify' )->addNotify( $uid, $to_uid, 3, $tid, $pid );
					}
				}
			}
		}
	}

	public  function getRelationTopic( $tid, $cid ) {
		$map['tid'] = array( 'neq', $tid );
		$map['cid'] = array( 'eq', $cid );
		$relation_topics = $this->field( 'tid, uid, subject' )->where( $map )->order( 'rand()' )->limit( 6 )->select();

		if ( $relation_topics ) {
			return  $relation_topics;
		} else {
			return  false;
		}
	}
	/**
	 *  话题详情页
	 *
	 * @param integer $tid 话题ID
	 * @return [type]       [description]
	 */
	public function getTopicList( $tid ) {
		$topic = $this->where( 'tid='.$tid )->find();
		if ( !empty( $topic ) ) {
			$topic['username'] =  D( 'User' )->where( 'uid='.$topic['uid'] )->getField( 'username' );
			$topic['catename'] =  D( 'TopicCategory' )->where( array( 'id'=>$topic['cid'] ) )->getField( 'name' );
			$topic['post_lists'] =D( 'TopicPost' )->getPostLists( array('tid'=>$tid), 50);

			return $topic;
		}

	}
	public function getAuthorTopic( $tid) {
		$result = $this->where( array( 'tid'=>$tid, 'status'=>1 ) )->find();
		if ( !$result ) {
			return  false;
		}
		$content = D( 'TopicPost' )->where( array( 'tid'=>$tid, 'uid'=>$result['uid'], 'first'=>1 ) )->getField( 'content' );
		$result['content'] = $content;
		return  $result;
	}


	/**
	 * 话题回复数
	 *
	 * @param [type]  $tid [description]
	 * @return [type]      [description]
	 */
	public function incPostNum( $tid, $uid ) {
		$this->where( array( 'tid'=>$tid ) )->setInc( 'post_num' );
		$data = array(
		   'last_post_time'=>time(),
		   'last_post_uid' =>$uid               
		);
		$this->where(array('tid'=>$tid, 'status'=>1))->save($data);
		D( 'User' )->setLastPost($uid);
		return true;
	}

	public function decPostNum( $tid ) {
		
		$last_post = D('TopicPost')->where(array('tid'=>$tid, 'status'=>1))->order('create_time desc')->limit(1)->find();
		$data =  array(
			'last_post_time' => $last_post['create_time'],
			'last_post_uid'  => $last_post['uid']
		);
		$this->where(array('tid'=>$tid, 'status'=>1))->save($data);
		$this->where( array( 'tid'=>$tid ) )->setDec( 'post_num' );
		return true;
	}


	/**
	 * 话题浏览量
	 *
	 * @param [type]  $tid [description]
	 * @return [type]      [description]
	 */
	public function incViewNum( $tid ) {
		$result = $this->where( array( 'tid'=>$tid ) )->setInc( 'view_num' );
		return $result;
	}
}
?>
