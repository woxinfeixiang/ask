<?php 
/**
 * 展示页面回答视图模型
 */
Class AnswerInfoViewModel extends ViewModel {

	Protected $viewFields = array(
		'answer' => array(
			'id', 'content', 'time',
			'_type' => 'LEFT'
		),
		'user' => array(
			'id' => 'uid', 'username', 'face',
			'_on' => 'answer.uid = user.id'
		)
	);

}


?>