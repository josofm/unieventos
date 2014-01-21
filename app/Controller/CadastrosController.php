<?php 
App::uses('AppController', 'Controller');

	class CadastrosController extends AppController {

		public $helpers = array('Html', 'Form', 'Session');
    	public $components = array('Session');

    	public function inscricao($id =null){
    		//$this->autoRender = false;
	        if ($this->request->is('post')) {
	            $this->Cadastro->create();
	            $this->request->data['Cadastro']['usuario_id'] = $this->Auth->user('id');
	            $this->request->data['Cadastro']['evento_id'] = $id;
	            $this->request->data['Cadastro']['nivel'] = 0;
	            if ($this->Cadastro->save($this->request->data)) {
	                $this->Session->setFlash(__('Sua Inscricao foi realizada.'));
	                return $this->redirect(array('action' => 'inscricao'));
	            }
	            $this->Session->setFlash(__('Unable to add your post.'));
	        }
	    }

	    public function admin_boletos(){
	    	$this->set('bol', $this->Cadastro->findAllByUsuarioId($this->Auth->user('id')));
	    }
	    
	    public function conta($id = null){
	    	 return $this->Cadastro->find('count', array('conditions' => array('evento_id' => $id)));
	    	
	    }
	}	
?>