<?php 
/**
 * 列表页控制器
 */
Class ListAction extends Action {

	Public function index () {
		$id = $this->_get('id', 'intval');
		echo $id;
	}
}

?>