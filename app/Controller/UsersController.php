<?php
class UsersController extends AppController{
	public $name = 'Users';
	public $helpers = array('Html','Form');
	
	function register(){
		if($this->request->is('post')){
			$this->User->create();
			$this->request->data['User']['password']=md5($this->request->data['User']['password']);
			if($this->User->save($this->request->data)){
				$this->Session->setFlash(__('The user has been added.'));
				$this->redirect(array('action'=>'index'));
			}else{
				$this->Session->setFlash('Some error happend,try again.');
			}
		}
	}
	
	function login(){
		if(!empty($this->data)){
			$user=$this->User->findByUsername($this->data['User']['username']);
			if($user&&md5($this->data['User']['password'])==$user['User']['password']){
				$this->Session->write('user',$this->data['User']['username']);
				$this->redirect(array('controller'=>'posts','action'=>'index'));
			}else{
				$this->set('error',true);
			}
		}
	}
	
	function logout(){
		$this->Session->delete('user');
		$this->Session->setFlash(__('Logout successful.'));
		$this->redirect(array('action'=>'login'));
	}
	
	
}