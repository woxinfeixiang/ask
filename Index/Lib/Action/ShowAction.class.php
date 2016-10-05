<?php 

/**
 * 问题展示控制器
 */
Class ShowAction extends CommonAction {
	public function index () {
		$id= $this->_get('id', 'intval');
		$this->display();
	}
}


?>