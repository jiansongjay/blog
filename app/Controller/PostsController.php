<?php
class PostsController extends AppController{
	public $name = 'Posts';
	public $helpers = array('Html','Form','Time');
	public $uses = array('User','Post');
// 	public $scaffold;
/* 	function beforeFilter(){
		$this->Auth->allow('add');
		parent::beforeFilter();
	} */
/* 	function beforeFilter(){
		 if(!$this->Session->read('user')){
			$this->Session->setFlash('Please login');
		 	$this->redirect(array('controller'=>'users','action'=>'login'));
		 }
	} */
	function index(){
/* 		$posts=$this->Post->find('all',array(
				'order'=>'modified DESC'
				));
		$this->set('posts',$posts); */

		$this->paginate=array(
				'order'=>'modified DESC',
				'limit'=>'5',
				'page'=>'1'
		);
		$posts=$this->paginate('Post');
		$this->set(compact('posts'));
		/* else{
			$this->Session->setFlash(__('Please Login first.'));
			$this->redirect(array('controller'=>'users','action'=>'login'));
		} */
	
	}
	
	function view($id=null){
		if(!$id){
			$this->Session->setFlash(__('Invalid post id'));
		}
		$this->set('post',$this->Post->findById($id));
	}
	function delete($id=null){
		if(!$this->request->is('post')){
			throw new MethodNotAllowedException();
		}
		if($id){
			$this->Post->delete($id);
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function edit($id=null){
		if(!$id&&empty($this->data)){
			$this->Session->setFlash(__('Invalid ID'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Post->id=$id;
		if(empty($this->data)){
			$this->data=$this->Post->read();
		}else{
			if($this->Post->save($this->data)){
				$this->Session->setFlash('Post has been updated.');
				$this->redirect(array('action'=>'index'));
			}
		}
// 		$this->Post->create();
/* 		$this->Post->id=$id;
		if($this->request->is('get')){
			$this->request->data=$this->Post->read();
			var_dump($this->data);
		}else{
			if($this->Post->save($this->request->data)){
				$this->Session->setFlash('Post has been updated.');
				$this->redirect(array('action'=>'index'));
			}
		} */
	}
	
	function add(){
		$username=$this->Session->read('user');
		$user=$this->User->findByUsername($username);
		$user_id=$user['User']['id'];
		if($this->request->is('post')){
			$this->Post->create();
			$this->request->data['Post']['user_id']=$user_id;
			if($this->Post->save($this->data)){
				$this->Session->setFlash(__('The Post has been added.'));
				$this->redirect(array('action'=>'index'));
			}else{
				$this->Session->setFlash(__('Fail to add post, try again.'));
			}
		}
	}
}