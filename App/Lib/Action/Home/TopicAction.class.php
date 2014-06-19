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

class TopicAction extends  BaseAction {


	public  function _initialize(){
		parent::_initialize();
		$cate_lists   = D('TopicCategory')->getAllCates();
		$this->assign('cate_lists',$cate_lists);
	}

	/**
	 * 话题最新列表
	 *
	 * @return [type] [description]
	 */
	public  function index() {
		//debug_print_backtrace();
		$topics       = D( 'Topic' )->getRecentTopic( array( 'status'=>1 ), 10 );
		$stick_topics = D( 'Topic' )->getStickTopic();

		$url = "http://worldcup.2014.163.com/schedule/calendar/?bdsc";
        $contents = file_get_contents($url); 
        preg_match_all('|<a class="match_team"(.*?)">(.*?)<\/a>|i',$contents,$match_team);
        $team = $match_team[2];
        preg_match_all('|<span class="match_score">(\d-\d)|i',$contents,$match_score);
        $score = $match_score[1];
        $finish_count = count($score)-1;

        $record = D('Topic')->getRecord($finish_count, $score);
        $this->assign( 'record', $record);
        $this->assign( 'finish_count', $finish_count);
        $this->assign( 'team', $team);
        $this->assign( 'score', $score);
		$this->assign( 'topics', $topics );
		$this->assign( 'stick_topics', $stick_topics );
		$this->assign('title', '话题列表');
		$this->display();
	}

	/**
	 * 话题详情页
	 *
	 * @return [type] [description]
	 */
	public function detail() {
		$tid = I( 'get.tid', 0, 'intval' );
		if (I('cookie.topic_id') != 'tid_'.$tid) {
			D( 'Topic' )->incViewNum( $tid );
			cookie('topic_id', 'tid_' .$tid);
		}
		$topic = D( 'Topic' )->getTopicList( $tid );
		if ( empty( $topic ) ) {
			$this->error( '你想访问的页面不存在' );
		}

		$relation_topics = D( 'Topic' )->getRelationTopic( $tid, $topic['cid'] );
		$this->assign( 'relation_topics', $relation_topics );

		$this->assign( 'topic', $topic );
		$this->assign( 'title', $topic['subject'] );
		$this->display();
	}
	/**
	 * 分类的话题列表
	 *
	 * @return [type] [description]
	 */
	public function category() {
		$cid   = I( 'get.cid', 0, 'intval' );
		$topic = D( 'Topic' )->getRecentTopic( array( 'cid'=>$cid, 'status'=>1 ) );

		$category =  D( 'TopicCategory' )->getCateList( 'name, des', array( 'id'=>$cid ) );
		if ( !$category ) {
			$this->error( '你想访问的页面不存在' );
		}
		$this->assign( 'category', $category );
		$this->assign('title', $category['name']);
		$this->assign( 'cid', $cid );
		$this->assign( 'topic', $topic );
		$this->display();
	}

	/**
	 * 创建话题
	 *
	 * @return [type] [description]
	 */
	public function add() {
		$this->checkLogin();
		$this->checkInterval($this->mid);
		if ( IS_POST ) {
			$cid      = I( 'post.cid', 0 , 'intval' );
			$subject  = I( 'post.subject', '', 'safe' );
			$content  = I( 'post.content', '', '' );
			empty( $cid ) &&  $this->error( '分类不能为空' );
			empty( $subject ) && $this->error( '标题不能为空' );
			empty( $content ) && $this->error( '内容不能为空' );
			if (banwords($subject)) {
				$this->error('对不起，发布的内容包含站点屏蔽的文字');
			}
			if (banwords($content)) {
				$this->error('对不起，发布的内容包含站点屏蔽的文字');
			}
			$subject  = msubstr( $subject, 0, 50 );
			if ( str_strlen( $subject ) <= 2 ) {
				$this->error( '标题太短了' );
			}
			$tid = D( 'Topic' )->insert( $cid, $this->mid, $subject, $content );
			if ( $tid ) {
				D('Feed')->addFeed($tid, 'topic');
				$this->success( '创建成功', U( 'topic/detail', array( 'tid'=>$tid ) ) );
			} else {
				$this->error( '创建话题失败' );
			}
		} else {
			$cid = I( 'get.cid', 0, 'intval' );
			$this->assign( 'cid', $cid );

			$cate_lists   = D('TopicCategory')->getAllCates();
			if (empty($cate_lists)) {
				$this->error('还没有创建分类');
			}
			$this->assign('cate_lists',$cate_lists);
			$this->assign('title', '创建话题');
			$this->display();
		}

	}

	public  function edit() {
		$this->checkLogin();
		$tid   = I( 'get.tid', 0, 'intval' );
		empty( $tid ) && $this->error( '话题ID不能为空', U( 'topic/index' ) );

		$this->checkTopicPerm( $tid, $this->mid );

		$topic = D( 'Topic' )->getAuthorTopic( $tid);
		if ( $topic ) {
			$cate_lists   = D('TopicCategory')->getAllCates();
			$this->assign('cate_lists',$cate_lists);
			$this->assign('title', '编辑话题');
			$this->assign( 'topic', $topic );
			$this->display();
		} else {
			$this->error( '你想访问的页面不存在' );
		}
	}

	public  function editPost(){
		$this->checkLogin();
		$pid   = I( 'get.pid', 0, 'intval' );
		if (!$pid) {
			$this->redirect('topic/index');
		}
		$this->checkPostPerm($pid, $this->mid);
		$post = D('TopicPost')->getTopicByPid($pid);
		$this->assign('post', $post);
		$this->display();
	}

	public function update() {
		$this->checkLogin();

		$tid      = I( 'post.tid', 0, 'intval' );
		$cid      = I( 'post.cid', 0 , 'intval' );
		$subject  = I( 'post.subject', '', 'safe' );
		$content  = I( 'post.content', '', '' );

		empty( $tid ) &&  $this->error( '话题ID不能为空' );
		empty( $cid ) &&  $this->error( '分类不能为空' );
		empty( $subject ) && $this->error( '标题不能为空' );
		empty( $content ) && $this->error( '内容不能为空' );

		$this->checkTopicPerm( $tid, $this->mid );

		if (banwords($subject)) {
			$this->error('对不起，发布的内容包含站点屏蔽的文字');
		}
		if (banwords($content)) {
			$this->error('对不起，发布的内容包含站点屏蔽的文字');
		}

		$result = D( 'Topic' )->update( $tid, $cid, $this->mid, $subject, $content );
		if ( $result ) {
			$this->success('修改成功', U('topic/detail', array('tid' => $tid)));
		} else {
			$this->error( '修改话题失败' );
		}
	}

	public  function  updatePost(){
		$this->checkLogin();
		$tid      = I( 'post.tid', 0, 'intval' );
		$pid      = I( 'post.pid', 0, 'intval' );
		$content  = I( 'post.content', '', 'safe' );
		$this->checkPostPerm($pid, $this->mid);
		empty( $content ) && $this->error( '内容不能为空' );
		if ( str_strlen($content) <=2) {
			$this->error('多说两句吧');
		}
		$content  =  parseAtUname($content);
		$result = D('TopicPost')->where(array('tid'=>$tid, 'pid'=>$pid))->save(array('content'=>$content, 'update_time'=>time()));
		if ($result) {
			$this->success('修改成功', U('topic/detail', array('tid' => $tid)));
		} else{
			$this->error('修改失败');
		}
	}

	/**
	 * 回复话题
	 *
	 * @return [type] [description]
	 */
	public function reply() {
		$this->checkLogin();
		$this->checkInterval($this->mid);
		if ( IS_POST ) {
			$tid   = I( 'post.tid', 0, 'intval' );
			$content = I( 'post.content', '' , 'safe' );
			empty( $tid ) && $this->error( '你想访问的页面不存在', U( 'topic/index' ) );
			empty( $content ) && $this->error( '回复的内容不能为空' );
			if (banwords($content)) {
				$this->error('对不起，发布的内容包含站点屏蔽的文字');
			}
			$content   =  link_it($content);
			$pid = D( 'Topic' )->reply( $tid, $this->mid, $content );
			$data['content']     = parseAtUname($content);
			$data['pid']         = $pid;
			$data['avatar']      = uavatar( $this->mid );
			$data['username']    = get_username( $this->mid );
			$data['space']       = U( 'user/index', array( 'uid'=>$this->mid ) );
			$this->ajaxReturn($data);
		}
	}
	public   function checkTopicPerm( $tid, $mid ) {
		$topic_uid = D( 'Topic' )->where( array( 'tid'=>$tid ) )->getField( 'uid' );
		if ( $topic_uid != $mid ) {
			$this->error( '没有权限编辑' );
		}
	}

	public  function  checkPostPerm( $pid, $mid ){
		$post_uid  =  D('TopicPost')->where(array('pid'=>$pid))->getField('uid');
		if ($post_uid != $mid) {
			$this->error('没有权限编辑');
		}
	}

	public function upload() {
		$this->checkLogin();

		import( 'ORG.Net.UploadFile' );
		$uploader = new UploadFile();
		$uploader->allowExts  = array( 'jpg', 'gif', 'png', 'jpeg' );
		$uploader->autoSub =true ;
		$uploader->hashLevel = 3;
		$uploader->thumb = true;
		$uploader->thumbPrefix = '';
		$uploader->thumbSuffix = '_thumb';
		$uploader->thumbMaxWidth = '600';
		$uploader->thumbMaxHeight = '600';
		$uploader->thumbType = '0';
		$uploader->savePath = 'Public/upload/attach/';
		$uploader->saveRule = uniqid;
		if ( $uploader->upload() ) {
			$info =  $uploader->getUploadFileInfo();
			$thumbImage =  explode( '.', $info[0]['savename'] );
			$url   = $thumbImage[0] .'_thumb.' .$thumbImage[1];
			echo json_encode( array(
					'url'=>$url,
					'title'=>htmlspecialchars( $_POST['pictitle'], ENT_QUOTES ),
					'original'=>$info[0]['name'],
					'state'=>'SUCCESS'
				) );
		}else {
			echo json_encode( array(
					'state'=>$uploader->getErrorMsg()
				) );
		}
	}
}
?>
