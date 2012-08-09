<?php
class User extends AppModel{
	public $name = 'User';
	public $validate =array(
			'username' =>array(
					'requeired'=>array(
							'rule'=>array('notEmpty'),
							'message'=>'Username cannot be empty.'
							)
					),
			'password'=>array(
					'rule'=>array('notEmpty'),
					'message'=>'A password needed'
					),
			'email'=>array(
					'rule'=>array('email'),
					'allowEmpty'=>'no',
					'message'=>'Not the correct email'
					)
			);
	function beforeSave(){
		if(isset($this->data[$this->alias]['password'])){
			$this->data[$this->alias]['password']=AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
	
	
	
	
	
}