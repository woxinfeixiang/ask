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
		$this->display();
	}
}

?>