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

class NotifyModel extends Model {
	protected $tableName = 'notify';
	/**
	 * 通知列表
	 * @param  [type] $uid      [description]
	 * @param  [type] $pagesize [description]
	 * @return [type]           [description]
	 */
	public function getNotifyList( $uid, $pagesize ) {

		$result['data'] = $this->where(array('to_uid'=>$uid, 'status'=>1))->order('id desc')->selectPage($pagesize);
		if (!empty($result['data'])) {
			$result['data'] = $this->parseNotifyData($result['data']);
		}
		$result['page'] =$this->page;
		return $result;
	}

	public  function  parseNotifyData($result){
		foreach ($result as $key => $value) {
			$result[$key]['from_uname'] = D('User')->where('uid='.$value['from_uid'])->getField('username');
			if ($value['type'] ==1 || $value['type'] ==3) {
				$subject  =  D('Topic')->where(array('tid'=>$value['source_id'],'status'=>1))->getField('subject');
				$content  =  D('TopicPost')->where(array('pid'=>$value['appid'], 'status'=>1))->getField('content');
				$result[$key]['subject']    = $subject;
				$result[$key]['tid']        = $value['source_id'];
				$result[$key]['content']    = $content;
			}
		}
		return  $result;
	}

	/**
	 * 发送通知
	 * @param [type] $from_uid [description]
	 * @param [type] $to_uid   [description]
	 * @param [type] $type     [description]
	 * @param [type] $pid      [description]
	 */
	public function  addNotify($from_uid, $to_uid, $type, $source_id, $pid){
		$data = array(
			'from_uid'    => $from_uid,
			'to_uid'      => $to_uid,
			'type'		  => $type,
			'source_id'   => $source_id,
			'appid'		  => $pid,
			'create_time' => time()
		);
		$result = D('Notify')->add($data);
		if (!$result) {
			return  false;
		}
		D('User')->incAtNum($to_uid);
		return  true;
	}

}
?>
