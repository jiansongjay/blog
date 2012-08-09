<?php
class PostsController extends AppController{
	public $name = 'Posts';
	public $helpers = array('Html','Form','Time','Js');
	public $uses = array('User','Post');
	public $components =array('RequestHandler');
	
// 	public $scaffold;
	function beforeFilter(){
		$this->Auth->allow('add','viewall');
		parent::beforeFilter();
	}
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
	
	function viewall(){
// 		$this->RequestHandler->setContent('xml','application/xml');
		$posts=$this->Post->find('all');
/* 		$this->set('posts',$posts);
		$this->render(null,'ajax'); */

/* 		$this->set('posts',$posts);
		$this->set('_serialize ','posts'); */
/* 		if($this->RequestHandler->ext=='json'){
			$this->autoRender=false;
			echo json_encode($posts);
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
		if($this->Auth->user()){
			$user=$this->Auth->user();
			$user_id=$user['id'];
		}else{
			$this->redirect(array('controller'=>'users','action'=>'login'));
		}
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