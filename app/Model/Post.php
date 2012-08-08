<?php
class Post extends AppModel{
	public $name = 'Post';
	public $validate=array(
			'title'	=>	array(
					'rule'	=> array('notEmpty'),
					'message'=>'Title cannot be empty!'
			)
	);
}