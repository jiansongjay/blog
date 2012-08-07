<?php
class PostsController extends AppController{
	public $name = 'Posts';
	public $helpers = array('Html','Form');
// 	public $scaffold;
	
	function index(){
		$posts=$this->Post->find('all',array(
				'order'=>'modified DESC'
				));
		$this->set('posts',$posts);
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
		if(!$id||empty($this->data)){
			$this->Session->setFlash(__('Invalid ID'));
			$this->redirect(array('action'=>'index'));
		}
		if(empty($this->data)){
			$this->data=$this->Post->read(null,$id);
		}else{
			if($this->Post->save($this->data)){
				$this->Session->setFlash('Post has been updated.');
				$this->redirect(array('action'=>'index'));
			}
		}
	}
	
	function add(){
		if($this->request->is('post')){
			if($this->Post->save($this->data)){
				$this->Session->setFlash(__('The Post has been added.'));
				$this->redirect(array('action'=>'index'));
			}else{
				$this->Session->setFlash(__('Fail to add post, try again.'));
			}
		}
	}
}