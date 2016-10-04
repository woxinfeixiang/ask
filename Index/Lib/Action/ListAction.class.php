<?php 
/**
 * 列表页控制器
 */
Class ListAction extends Action {

	Public function index () {
		$id = $this->_get('id', 'intval');
		
		//分类列表
		$db = M('category');
		$cate = $db->where(array('pid' => $id))->select();
		$cid = only_array($cate, 'id');
		$cid[] = $id;
		if (!$cate) {
			$pid = $db->where(array('id' => $id))->getField('pid');
			$cate = $db->where(array('pid' => $pid))->select();
			$cid[] = $id;

			if (!$cate) {
				$cate = $db->where(array('pid' => 0))->select();
				$cid = only_array($cate, 'id');
			}
		}

		//问题列表
		$where = array('cid' => array('IN', $cid));

		//分页处理
		$count = M('ask')->where($where)->count('id');
		import('ORG.Util.Page');
		$page = new Page($count, 15);
		$limit = $page->firstRow . ',' . $page->listRows;

		$db = D('AskView');
		$this->ask = $db->where($where)->order('time DESC')->limit($limit)->select();
		
		$this->page = $page->show();
		$this->cate = $cate;
		$this->display();
	}
}

?>