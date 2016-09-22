<?php
/**
 * 公共控制器
 */
Class CategoryAction extends CommonAction {

	//分类列表视图
	Public function index () {
		$cate = M('category')->select();
		$this->cate = recursive($cate);
		$this->display();
	}

	//添加顶级分类视图
	Public function addTop () {
		$this->display();
	}

	//添加子分类视图
	Public function addChild () {
		$this->cate = M('category')->find($this->_get('pid', 'intval'));
		$this->display();
	}

	//添加分类表单处理
	Public function addCate () {				
		$catename = $_POST['name'];
		//判断添加类别是否为空字段
		if (empty($catename)) {
			$this->error('添加失败，类别名不能为空', 'index');
		}
		//根据传入的类别名在数据库中做判断，是否存在，如果存在返回ID		
		$id = M('category')->getFieldByName($catename, 'id');
		if ($id) {
			$this->error('添加失败，类别已存在', 'index');
		} else {
			if (M('category')->data($_POST)->add()) {
				$this->success('添加成功', 'index');
			} else {
				$this->error('添加失败', 'index');
			}
		}		
		
	}

	//修改分类视图
	Public function edit () {
		$this->cate = M('category')->find($this->_get('id', 'intval'));
		$this->display();
	}

	//修改分类操作	
	Public function editCategory () {		
		if (M('category')->save($_POST)) {
		 	$this->success('修改成功', 'index');
		} else {
			$this->error('修改失败');
		} 
	}

	//删除分类
	Public function del () {
		$id = $this->_get('id', 'intval');
		$db = M('category');
		$cateid = $db->field(array('id', 'pid'))->select();
		$delid = get_all_child($cateid, $id);
		//delete from hd_category where is in (16, 17)
		$delid[] = $id;
		
		$where = array('id' => array('IN', $delid));

		if (!$db->where($where)->delete()) {
			$this->error('删除失败');
		}

		$this->success('删除成功', U('index'));


	}
}




?>