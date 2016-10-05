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
		$this->display();
	}
}


?>