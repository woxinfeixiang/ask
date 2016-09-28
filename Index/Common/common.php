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

/**
 * 经验值转换为等级
 * @param  [type] $exp [description]
 * @return [type]      [description]
 */
function exp_to_level ($exp) {
	switch (true) {
		case $exp >= C('LV20');
			return 20;
		case $exp >= C('LV19');
			return 19; 
		case $exp >= C('LV18');
			return 18; 
		case $exp >= C('LV17');
			return 17; 
		case $exp >= C('LV16');
			return 16; 
		case $exp >= C('LV15');
			return 15; 
		case $exp >= C('LV14');
			return 14; 
		case $exp >= C('LV13');
			return 13; 
		case $exp >= C('LV12');
			return 12; 
		case $exp >= C('LV11');
			return 11; 
		case $exp >= C('LV10');
			return 10; 
		case $exp >= C('LV9');
			return 9; 
		case $exp >= C('LV8');
			return 8; 
		case $exp >= C('LV7');
			return 7; 
		case $exp >= C('LV6');
			return 6;
		case $exp >= C('LV5');
			return 5;
		case $exp >= C('LV4');
			return 4;
		case $exp >= C('LV3');
			return 3;
		case $exp >= C('LV2');
			return 2;
		default:
			return 1;      
	}
}



?>