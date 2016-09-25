<?php 
/**
 * 会员中心
 */
Class MemberAction extends CommonAction {

	Public function index () {
		$id = $this->_get('id', 'intval');
		echo $id;
	}
}

?>