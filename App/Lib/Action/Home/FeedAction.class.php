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
	public   function index(){
		$feeds = D('Feed')->getFeedLists($this->mid);
		$this->assign('feeds', $feeds);
		$this->display();
	}
	public function test(){
		var_dump($_REQUEST);
		$username = $_REQUEST['username'];
		$match_id = $_REQUEST['match_id'];
		$option = $_REQUEST['opt'];
		$bet_num = $_REQUEST['select'];
		if ($option=='0'||$option=='1'||$option=='2') {
			D('Feed')->update($username, $option, $match_id, $bet_num);
			$this->display('index');
		} else {
			$this->error( '请选择一个投注' );
		}
	}
}
?>