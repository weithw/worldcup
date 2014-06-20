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
class FeedAction extends BaseAction {

	public  function _initialize(){
        parent::_initialize();
        $this->checkLogin();
    }

	public  function index() {
		if (IS_POST) {
			$username = $_REQUEST['username'];
			$match_id = $_REQUEST['match_id']+1;
			$option = $_REQUEST['opt'];
			$bet_num = $_REQUEST['select'];
			if ($option=='0'||$option=='1'||$option=='2') {
				D('Feed')->update($username, $option, $match_id, $bet_num);
			} else {
				$this->error( '请选择一个投注' );
			}
		}

		$result = D('Match')->getAll();
		$finish_count = D('Match')->getFinishCount();
		
		foreach ($result as $key => $value) {
			$score[$key] = $value['score'];
			$teama[$key] = $value['teama'];
			$teamb[$key] = $value['teamb'];
		} 
		
		$bet = D('Topic')->getNotFinishRecord(is_login());
		$this->assign( 'bet' , $bet);
        $this->assign( 'finish_count', $finish_count);
        $this->assign( 'teama', $teama);
        $this->assign( 'teamb', $teamb);
        $this->assign( 'score', $score);

		$this->display();
	}

	public function test(){
		//var_dump($_REQUEST);
		
	}
}
?>