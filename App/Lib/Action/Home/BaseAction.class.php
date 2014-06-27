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

class BaseAction extends Action{

	public function _initialize() {

		D('Settings')->getSettings();

		$cookie_uid = authcode(I('cookie.talkpiece_uid'),'DECODE');
		if($cookie_uid >0 ){
			$user = D('User')->where(array('ID'=>$cookie_uid))->find();
			D('User')->autoLogin($user);
		} else {
			cookie('talkpiece_uid', null);
		}
		$this->mid = is_login();
		$this->uid = isset($_REQUEST['uid']) ? intval($_REQUEST['uid']) : $this->mid; 
		
		if ($this->mid >0 ) {
			$user  = D('User')->where(array('ID'=>$this->mid))->find();	
		}
		$this->assign('user', $user) ;
		$this->assign('mid', $this->mid);
		$this->assign('uid', $this->uid);
	}
    public function  checkInterval($uid){
		$last_post  = D('User')->where(array('uid'=>$uid, 'is_active'=>1))->getField('last_post');
		$interval     = C('site.interval') - (time() - $last_post);
		if ($interval >0) {
			$this->error('你说的太快了');
		}
	}
	protected function checkLogin(){
		is_login() || $this->error('你还没有登录，请先登录！', U('User/login'));
	}
}
?>
