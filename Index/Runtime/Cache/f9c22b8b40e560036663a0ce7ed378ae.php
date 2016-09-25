<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title><?php echo (C("webname")); ?></title>
	<meta name="keywords" content="<?php echo (C("keywords")); ?>"/>
	<meta name="description" content="<?php echo (C("description")); ?>"/>
	<link rel="stylesheet" href="__PUBLIC__/Css/common.css" />
	<script type="text/javascript" src='__PUBLIC__/Js/jquery-1.7.2.min.js'></script>
	<script type="text/javascript" src='__PUBLIC__/Js/top-bar.js'></script>
	<link rel="stylesheet" href="__PUBLIC__/Css/index.css" />
	<script type="text/javascript" src='__PUBLIC__/Js/index.js'></script>
</head>
<body>
	<div id='top-fixed'>
	<div id='top-bar'>
		<!-- <ul class="top-bar-left fl">
			<li><a href="http://www.houdunwang.com" target='_blank'>后盾网</a></li>
			<li><a href="http://bbs.houdunwang.com" target='_blank'>后盾论坛</a></li>
			<li><a href="http://study.houdunwang.com" target='_blank'>后盾学习社区</a></li>
		</ul> -->
		
		<ul class='top-bar-right fr'>
			<?php if(!isset($_SESSION["uid"]) OR !isset($_SESSION["username"])): ?><li><a href="" class='login'>登录</a></li>
				<li style='color:#eaeaf1'>|</li>
				<li><a href="" class='register'>注册</a></li>
			<?php else: ?>
				<li class="userinfo">
					<a href="<?php echo U('Member/index', array('id' => $_SESSION['uid']));?>" class="uname"><?php echo ($_SESSION['username']); ?></a>
				</li>
				<li style='color:#eaeaf1'>|</li>			
				<li><a href="">退出</a></li><?php endif; ?>
		</ul>
	</div>

	<div id='search'>
		<div class='logo'></div>
		<form action="" method=''>
			<input type="text" name='' class='sech-cons'/>
			<input type="submit" class='sech-btn'/>
		</form>
		<a href="/wd/index.php/Ask/index" class='ask-btn'></a>
	</div>
</div>
<div style='height:110px'></div>
<!----------导航条---------->
<div id='nav'>
	<ul class='list'>
		<li class='nav-sel'><a href="/wd/index.php" class='home'>问答首页</a></li>
		<li class='nav-sel ask-cate'>
			<a href="/wd/index.php/List/index" class='ask-list'><span>问题分类</span><i></i></a>
			<ul class='hidden'>
				<?php $where = array("pid" => 0);$_topcatesResult = M("category")->where($where)->limit()->select();foreach ($_topcatesResult as $v) : extract($v);?><li><a href="<?php echo U('List/index', array('id' => $id));?>"><?php echo ($name); ?></a></li><?php endforeach;?>
			</ul>
		</li>
	</ul>
	<p class='total'>累计提问：10240000</p>
</div>

<script type="text/javascript" src='/wd/Public/Js/validate.js'></script>
	<script type="text/javascript">
		var CONTROL = "__APP__/Common/";
	</script>
	<!----------注册框---------->
	<div id='register' class='hidden'>
		<div class='reg-title'>
			<p>欢迎注册后盾问答</p>
			<a href="" title='关闭' class='close-window'></a>
		</div>
		<div id='reg-wrap'>
			<div class='reg-left'>
				<ul>
					<li><span>账号注册</span></li>
				</ul>
				<div class='reg-l-bottom'>
					已有账号，<a href="" id='login-now'>马上登录</a>
				</div>
			</div>
			<div class='reg-right'>
				<form action="<?php echo U('Common/register');?>" method='post' name='register'>
					<ul>
						<li>
							<label for="reg-account">账号</label>
							<input type="text" name='account' id='reg-account'/>
							<span>7-20个字符：以字母开头的字母、数字或下划线 _</span>
						</li>
						<li>
							<label for="reg-uname">用户名</label>
							<input type="text" name='username' id='reg-uname'/>
							<span>2-14个字符：字母、数字或中文</span>
						</li>
						<li>
							<label for="reg-pwd">密码</label>
							<input type="password" name='pwd' id='reg-pwd'/>
							<span>6-20个字符:字母、数字或下划线 _</span>
						</li>
						<li>
							<label for="reg-pwded">确认密码</label>
							<input type="password" name='pwded' id='reg-pwded'/>
							<span>请再次输入密码</span>
						</li>
						<li>
							<label for="reg-verify">验证码</label>
							<input type="text" name='verify' id='reg-verify'/>
							<img src="<?php echo U('Common/verify');?>" width='99' height='35' alt="验证码" id='verify-img'/>
							<span>请输入图中的字母或数字，不区分大小写</span>
						</li>
						<li class='submit'>
							<input type="submit" value='立即注册'/>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>

	<!----------登录框---------->	
	<div id='login' class='hidden'>
		<div class='login-title'>
			<p>欢迎您登录后盾网</p>
			<a href="" title='关闭' class='close-window'></a>
		</div>
		<div class='login-form'>
			<span id='login-msg'></span>
			<form action="<?php echo U('Common/login');?>" method='post' name='login'>
				<ul>
					<li>
						<label for="login-acc">账号</label>
						<input type="text" name='account' class='input' id='login-acc'/>
					</li>
					<li>
						<label for="login-pwd">密码</label>
						<input type="password" name='pwd' class='input' id='login-pwd'/>
					</li>
					<li class='login-auto'>
						<label for="auto-login">
							<input type="checkbox" checked='checked' name='auto' id='auto-login'/>&nbsp;下一次自动登录
						</label>
						<a href="" id='regis-now'>注册新账号</a>
					</li>
					<li>
						<input type="submit" value='' id='login-btn'/>
					</li>
				</ul>
			</form>
		</div>
	</div>
<!--背景遮罩--><div id='background' class='hidden'></div>
<!--------------------内容主体-------------------->
	<div class='main'>
		<div id='left'>
			<p class='left-title'>所有问题分类</p>
			<ul class='left-list'>
				<li class='list-l1'>
					<div class='list-l1-wrap'>
						<h4><a href="/wenda/index.php/List/index/id/31">问答系统</a></h4>
						<ul class='list-l2'>
							<li><a href="/wenda/index.php/List/index/id/33">安装</a></li><li><a href="/wenda/index.php/List/index/id/32">使用</a></li><li><a href="/wenda/index.php/List/index/id/40">手机版</a></li>						</ul>
					</div>
					<div class='list-more hidden'>
						<ul>
							<li><a href="/wenda/index.php/List/index/id/41">升级</a></li><li><a href="/wenda/index.php/List/index/id/43">BUG</a></li>						</ul>
					</div>
				</li><li class='list-l1'>
					<div class='list-l1-wrap'>
						<h4><a href="/wenda/index.php/List/index/id/25">开发</a></h4>
						<ul class='list-l2'>
							<li><a href="/wenda/index.php/List/index/id/28">开发设计</a></li><li><a href="/wenda/index.php/List/index/id/27">开发建议</a></li><li><a href="/wenda/index.php/List/index/id/26">开发功能</a></li>						</ul>
					</div>
					<div class='list-more hidden'>
						<ul>
							<li><a href="/wenda/index.php/List/index/id/42">开发费用</a></li>						</ul>
					</div>
				</li><li class='list-l1'>
					<div class='list-l1-wrap'>
						<h4><a href="/wenda/index.php/List/index/id/44">技术相关</a></h4>
						<ul class='list-l2'>
							<li><a href="/wenda/index.php/List/index/id/47">css</a></li><li><a href="/wenda/index.php/List/index/id/46">javascript</a></li><li><a href="/wenda/index.php/List/index/id/45">PHP</a></li>						</ul>
					</div>
					<div class='list-more hidden'>
						<ul>
							<li><a href="/wenda/index.php/List/index/id/48">python</a></li><li><a href="/wenda/index.php/List/index/id/49">perl</a></li>						</ul>
					</div>
				</li>			</ul>
		</div>

		<div id='center'>
			<div id='animate'>
				<div class='imgs-wrap'>
					<ul>
						<li>
							<a href=""><img src="/wenda/Public/Images/animate1.png" width='558' height='190'/></a>
						</li>
						<li>
							<a href=""><img src="/wenda/Public/Images/animate2.png" width='558' height='190'/></a>
						</li>
						<li>
							<a href=""><img src="/wenda/Public/Images/animate3.png" width='558' height='190'/></a>
						</li>
					</ul>
				</div>
				<ul class='ani-btn'>
					<li class='ani-btn-cur'>后盾网<i></i></li>
					<li>后盾网论坛<i></i></li>
					<li style='border:none'>后盾网学习社区<i></i></li>
				</ul>
			</div>

			<dl class='answer-list'>
				<dt>
					<span class='wait-as'>待解决问题</span>
					<a href=''>更多>></a>
				</dt>
							</dl>

			<dl class='answer-list'>
				<dt>
					<span class='reward-as'>高分悬赏问题</span>
					<a href=''>更多>></a>
				</dt>
							</dl>

		</div>
		<div id='right'>
	<?php if(!isset($_SESSION["uid"]) OR !isset($_SESSION["username"])): ?><div class='r-login'>
				<span class='login'><i></i>&nbsp;登录</span>
				<span class='register'><i></i>&nbsp;注册</span>
		</div>
	<?php else: ?>	
		<?php
 $field = array('id', 'username', 'face', 'answer', 'adopt', 'ask', 'point', 'exp'); $_userinfoResult = M('user')->field($field)->find($_SESSION["uid"]); p($_userinfoResult); ?><div class='userinfo'>
			<dl>
				<dt>
					<a href=""><img src="" width='48' height='48'/></a>
				</dt>
				<dd class='username'>
					<a href=""><b></b><i class='level lv2' title='Level 2'></i></a>
				</dd>
				<dd>金币：<a href="" style="color: #888888;"><b class='point'>0</b></a></dd>
				<dd>经验值：11</dd>
			</dl>
			<table>
				<tr>
					<td>回答数</td>
					<td>采纳率</td>
					<td class='last'>提问数</td>
				</tr>
				<tr>
					<td><a href="">0</a></td>
					<td><a href="">0%</a></td>
					<td class='last'><a href="">0</a></td>
				</tr>
			</table>
			<ul>
				<li><a href="">我提问的</a></li>
				<li><a href="">我回答的</a></li>
			</ul>
		</div><?php endif; ?>

	
	<div class='clear'></div>
	<div class='star'>
		<p class='title'>后盾问答之星</p>
		<span class='star-name'>本日回答问题最多的人</span>
					<div class='star-info'>
				<div>
					<a href="/wenda/index.php/Member/index/" class='star-face'><img src="/wenda/Public/Images/noface.gif" width='48px' height='48px'/></a>
					<ul>
						<li><a href="/wenda/index.php/Member/index/"></a></li>
						<li><i class='level lv1' title='Level 1'></i></li>
					</ul>
				</div>
				<ul class='star-count'>
					<li>回答数：<span></span></li>
					<li>采纳率：<span>0%</span></li>
				</ul>
			</div>
		<span class='star-name'>历史回答问题最多的人</span>
				<div class='star-info'>
			<div>
				<a href="/wenda/index.php/Member/index/" class='star-face'><img src="/wenda/Public/Images/noface.gif" width='48px' height='48px'/></a>
				<ul>
					<li><a href="/wenda/index.php/Member/index/"></a></li>
					<li><i class='level lv1' title='Level 1'></i></li>
				</ul>
			</div>
			<ul class='star-count'>
				<li>回答数：<span></span></li>
				<li>采纳率：<span>0%</span></li>
			</ul>
		</div>
	</div>


	<div class='star-list'>
	<p class='title'>后盾问答助人光荣榜</p>
		<div>
			<ul class='ul-title'>
				<li>用户名</li>
				<li style='text-align:right;'>帮助过的人数</li>
			</ul>
			<ul class='ul-list'>
				<li>
					<a href="/wenda/index.php/Member/index/id/6"><i class='rank r1'></i>后端12</a>
					<span>0</span>
				</li>
				<li>
					<a href="/wenda/index.php/Member/index/id/3"><i class='rank r2'></i>后端</a>
					<span>0</span>
				</li>
				<li>
					<a href="/wenda/index.php/Member/index/id/4"><i class='rank r3'></i>测试00011</a>
					<span>0</span>
				</li>
				<li>
					<a href="/wenda/index.php/Member/index/id/5"><i class='rank r4'></i>test002</a>
					<span>0</span>
				</li>
				<li>
					<a href="/wenda/index.php/Member/index/id/1"><i class='rank r5'></i>admin</a>
					<span>0</span>
				</li>			
			</ul>
		</div>
	</div>
</div>

	
	</div>
<!--------------------内容主体结束-------------------->
	<div class='clear'></div>
	<div id='bottom'>
		<p>Copyright © 2013 houdunwang.Com All Rights Reserved 后盾网</p>
		<p>京ICP备10027771号-1</p>
	</div>
<!--[if IE 6]>
    <script type="text/javascript" src="/wenda/Public/Js/iepng.js"></script>
    <script type="text/javascript">
    	DD_belatedPNG.fix('.logo','background');
        DD_belatedPNG.fix('.nav-sel a','background');
        DD_belatedPNG.fix('.ask-cate i','background');
    </script>
<![endif]-->
</body>
</html>