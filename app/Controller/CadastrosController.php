<?php 
App::uses('AppController', 'Controller');

	class CadastrosController extends AppController {

		public $helpers = array('Html', 'Form', 'Session');
    	public $components = array('Session');

    	public function inscricao($id =null){
    		$this->autoRender = false;
	        if ($this->request->is('post')) {
	            $this->Cadastro->create();
	            $this->request->data['Cadastro']['usuario_id'] = $this->Auth->user('id');
	            $this->request->data['Cadastro']['evento_id'] = $id;
	            if ($this->Cadastro->save($this->request->data)) {
	                $this->Session->setFlash(__('Your post has been saved.'));
	                return $this->redirect(array('action' => 'index'));
	            }
	            $this->Session->setFlash(__('Unable to add your post.'));
	        }
	    }



	}	
?>