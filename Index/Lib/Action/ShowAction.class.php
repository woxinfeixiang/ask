<?php 

/**
 * 问题展示控制器
 */
Class ShowAction extends CommonAction {
	public function index () {
		$id= $this->_get('id', 'intval');
		
		//问题详细
		$ask = D('AskInfoView')->find($id);
		if (!$ask) {
			redirect(U('List/index'));
		}
		
		$ask['level'] = exp_to_level($ask['level']);		
		$this->ask = $ask;

		//全部回答
		import('ORG.Util.Page');
		$where = array('aid' => $id, 'adopt' => 0);
		//计算分页条数
		$count = M('answer')->where($where)->count();
		$page = new Page($count, 10);
		$limit = $page->firstRow . ',' . $page->listRows;
		$answer = D("AnswerInfoView")->limit($limit)->select();
		$this->answer = $answer;
		$this->page = $page->show();
		$this->count = $count;
		//p($answer);die;
		$this->display();
	}

	//回答问题表单处理
	Public function answer () {
		if (!$this->isPost()) halt('页面不存在');

		$data = array(
			'content' => $this->_post('content'),
			'time' => time(),
			'aid' => $this->_post('aid', 'intval'),
			'uid' => session('uid')
		);

		if (M('answer')->data($data)->add()) {
			M('ask')->where(array('id' => $data['aid']))->setInc('answer');

			$db = M('user');
			$where=array('id' => $data['uid']);

			//增加分值，经验，回答数
			$db->where($where)->setInc('answer');
			$db->where($where)->setInc('exp', C('LV_ANSWER'));
			$db->where($where)->setInc('point', C('ANSWER'));

			$this->success('回答成功', $_SERVER['HTTP_REFERER']);
		} else {
			$this->error('回答失败, 请重试...');
		}



	}
}


?>