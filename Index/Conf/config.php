<?php
$config =  array(
	'TAGLIG_LOAD' => true,
	'APP_AUTOLOAD_PATH' => '@.TagLib',
	'TAGLIB_BUILD_IN' => 'Cx,Hd',	
);
return array_merge(include './Conf/config.php', $config);
?>