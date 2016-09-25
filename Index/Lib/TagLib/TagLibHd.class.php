<?php 
//载入Thinkphp核心标签类
import('TagLib');
/**
 * 自定义标签类
 */
Class TagLibHd extends TagLib {
	//自定义标签
	Protected $tags = array(
		'topcates' => array('attr' => 'limit'),
		'userinfo' => array('attr' => 'uid')
	);

	//顶级分类对标签
	Public function _topcates ($attr, $content) {
		$attr = $this->parseXmlAttr($attr);
		$limit = isset($attr['limit']) ? $attr['limit'] : '';

		$str = '<?php ';
		$str .= '$where = array("pid" => 0);';
		$str .= '$_topcatesResult = M("category")->where($where)->limit(' . $limit .')->select();';
		$str .= 'foreach ($_topcatesResult as $v) : ';
		$str .= 'extract($v);?>';
		$str .= $content;
		$str .= '<?php endforeach;?>';
		

		return $str;
	}

	//读取用户信息
	Public function _userinfo ($attr, $content) {
		$attr = $this->parseXmlAttr($attr);
		$uid = $attr['uid'];
		$str = <<<str
<?php
	\$field = array('id', 'username', 'face', 'answer', 'adopt', 'ask', 'point', 'exp');
	\$_userinfoResult = M('user')->field(\$field)->find({$uid});
	p(\$_userinfoResult);
?>
str;
		$str .= $content;
		return $str;
	}

}


?>