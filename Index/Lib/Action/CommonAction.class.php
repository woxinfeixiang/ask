<?php 
/**
 * 公用控制器
 */
Class CommonAction extends Action {

	Protected function _initialize () {
		if (!C('WEB_STATE')) {
			halt("网站维护中");
		}
	}

	//异步验证登录账号与密码
	Public function checkLogin () {
		if (!$this->isAjax()) halt('页面不存在');

		$account = $this->_post['account'];
		$where = array('account' => $account);

		$pwd = M('user')->where($where)->getField('password');
		if (!$pwd || $pwd != $this->_post('password', 'md5')) {
			echo 0;
		}else {
			echo 1;
		}

	}
	

	//注册表单处理
	Public function register () {
		if (!$this->isPost()) halt('页面不存在');

		$db = D('User');
		if (!$db->create()) {
			$this->error($db->getError());
		}

		$username = $db->username;
		if (!$uid = $db->add()) $this->error('注册失败，请重试...');
		
		session('uid', $uid);
		session('username', $username);
		$this->success('注册成功，请在为你跳转', __APP__);

	}
	

	//异步验证账号
	Public function checkAccount () {
		if (!$this->isAjax()) halt('页面不存在');
		$account = $this->_post('account');
		$where = array('account' => $account);
		if (M('user')->where($where)->getField('id')) {
			echo 0;
		}else {
			echo 1;
		}
	}

	//异步验证用户名
	Public function checkUsername () {
		if (!$this->isAjax()) halt('页面不存在');
		$username = $this->_post('username');
		$where = array('username' => $username);
		if (M('user')->where($where)->getField('id')) {
			echo 0;
		}else {
			echo 1;
		}
	}

	//异步验证验证码
	Public function checkVerify () {
		if (!$this->isAjax()) halt('页面不存在');

		if ($_SESSION['verify'] == $this->_post('verify', 'md5')) {
			echo 1;
		} else {
			echo 0;
		}		
	}

	//验证码
	Public function verify () {
		import('ORG.Util.Image');
		Image::buildImageVerify();
	}


}
?>