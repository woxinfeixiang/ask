<?php 
/**
 * 提问控制器
 */

Class AskAction extends CommonAction {
	Public function index () {
		$this->cate = M('category')->where(array('pid' => 0))->select();

		if (isset($_SESSION['uid']) && isset($_SESSION['username'])) {
			$this->point = M('user')->where(array('id' => session('uid')))->getField('point');
		} 
		$this->display();
	}

	//异步提取子分类
	Public function getCate () {
		if (!$this->isAjax()) halt('页面不存在');

		$pid = $this->_get('pid', 'intval');
		$where = array('pid' => $pid);

		if ($cate = M('category')->where($where)->select()) {
			echo json_encode($cate);
		} else {
			echo 0;
		}
	}
}  



?>