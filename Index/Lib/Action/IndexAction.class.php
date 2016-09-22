<?php

/**
 * 前台首页控制器
 */

Class IndexAction extends CommonAction {

	//后台首页视图
	Public function index () {
		if (S('category')) {
			$cate = S('category');
		} else {			
			$db = M('category');
			$cate = $db->where(array('pid' => 0))->select();
			foreach ($cate as $k => $v) {
				$cate[$k]['child'] = $db->where(array('pid' => $v['id']))->select();		
			}
			S('category', $cate, 3600 * 24);
		}
		
		$this->cate = $cate;
		//p($cate);die;	
		$this->display();
	}
}


?>