<?php 
/*
问题详细视图模型
 */
Class AskInfoViewModel extends ViewModel {

	Protected $viewFields = array(
		'ask' => array(
			'id', 'content', 'reward', 'solve', 'time', 'cid',
			'_type' => 'LEFT' 	
		),

		'user' => array(
			'id' => 'uid', 'username', 'exp',
			'_on' => 'ask.uid = user.id'
		)

	);
}


?>