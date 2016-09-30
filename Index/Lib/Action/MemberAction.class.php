<?php 
/**
 * 会员中心
 */
Class MemberAction extends CommonAction {

	Public function index () {
		$id = $this->_get('id', 'intval');
		$msg = M('user')->field(array('point', 'exp', 'adopt', 'answer', 'ask'))->find($id);
		if (!$msg) {
			redirect(__APP__);
			die();
		}
		$this->msg = $msg;	
		


		//我的提问
		$where = array('uid' => $id);
		$this->myAsk = D('AskView')->where($where)->order('time DESC')->limit(10)->select();
		
		$this->display();
	}
}

?>