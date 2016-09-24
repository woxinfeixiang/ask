<?php 

/**
 * 格式化打印数组
 */
function p ($array) {
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

function encrytion ($value, $type=0) {
	$key = md5(C('AUTO_LOGIN_KEY'));
	if ($type) {
		return str_replace('=', '', base64_encode($value ^ $key));
	}

	$value = base64_decode($value);
	return $value ^ $key;
}



?>