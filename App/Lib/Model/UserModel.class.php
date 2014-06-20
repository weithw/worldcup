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

class UserModel  extends Model{

	protected $tableName = 'user';
	public function isEmailExists($email) {
		$user = $this->where( array( 'email'=>$email ) )->find();
		if ( $user ) {
			return  false;
		}else {
			return  true;
		}
	}

	public  function  getAllUsers($map){
		$result['data']  = $this->where($map)->order( 'create_time desc' )->selectPage(50);
		if ( !empty( $this->page ) ) {
			$result['page']  = $this->page;
		}
		return $result;
	}
	public function getUserField( $wheresql,$field) {
		$data = $this->where($wheresql)->getField($field);
		if (!empty($data)) {
			return  $data;
		}
	}

	public  function  getUserList($condition, $field='*'){
		$data = $this->field($field)->where($condition)->find();
		if (!empty($data)) {
			return  $data;
		}
	}

	public function getUserName( $uid ) {
		$user_list = $this->getUserField( array( 'ID'=>$uid ), 'username' );
		return $user_list;
	}

    public function getUserUid( $username ) {
    	$user_list = $this->getUserField(array( 'username'=>$username ), 'uid' );
    	return $user_list['uid'];
    }
	public function incAtNum($uid){
		$result  = $this->where('uid='.$uid)->setInc('at_num');
		return $result;
	}

	public  function setPassword($uid, $password){
		$salt     =  rand_string( 10 );
		$password =  sha1( md5( $password ) . $salt );
		$result = $this->where(array('uid'=>$uid))->save(array('password'=>$password, 'salt'=>$salt));
		if ($result) {
			return  true;
		} else {
			return  false;
		}
	}
	public  function checkPassword($user, $password){
		$curPassword =  sha1( md5( $password ) . $user['salt'] );
		if ($user['password'] !== $curPassword) {
			$this->error ='当前密码不正确';
			return  false;
		}
		return  true;
	}

	public  function checkNameExists($username){
		$result = $this->where(array('username'=>$username))->find();
		return  $result;
	}

	public  function login($username, $password, $admin=false) {

		$user = $this->where( array( 'username'=>$username ) )->getField( 'ID, username,password' );

		if (!$user) {
			$this->error = '用户不存在或被禁用！';
			return false;
		} elseif($user['password'] !== $password ){
			$this->error = '用户名或者密码错误';
			return false;
		} 
		
		if ($admin) {
			if ($user['flag'] != 1 ) {
				$this->error = '用户没有管理权限！';
				return  false ;
			}
		}
		$this->autoLogin($user, $admin ? true : false);
		return  $user;
	}

	public  function  autoLogin($user, $admin=false) {

		// $this->getCredit($user['ID'], 'login');
		// $data = array(
		// 	'last_login_time' => time()
		// );
		// $this->where(array('ID'=>$user['ID']))->save($data);

		$auth = array(
			'ID'             => $user['ID'],
			'username'        => $user['username'],
		);
		session('user_auth', $auth);		
		session('user_auth_sign', data_auth_sign($auth));
	}

	public function  setLastPost($uid){
		$result = $this->where(array('uid'=>$uid,'is_active'=>1))->setField('last_post', time());
		if ($result) {
			return  true;
		} else{
			return  false;
		}
	} 

}
?>
