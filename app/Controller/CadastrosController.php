<?php 
App::uses('AppController', 'Controller');

	class CadastrosController extends AppController {

		public $helpers = array('Html', 'Form', 'Session');
    	public $components = array('Session','Boletos.BoletoBb');

    	public function inscricao($id =null){
    		$this->autoRender = false;
	        if ($this->request->is('post')) {
	            $this->Cadastro->create();
	            $this->request->data['Cadastro']['usuario_id'] = $this->Auth->user('id');
	            $this->request->data['Cadastro']['evento_id'] = $id;
	            $this->request->data['Cadastro']['evento_id'] = 0;
	            if ($this->Cadastro->save($this->request->data)) {
	                $this->Session->setFlash(__('Your post has been saved.'));
	                return $this->redirect(array('action' => 'index'));
	            }
	            $this->Session->setFlash(__('Unable to add your post.'));
	        }
	    }

	    public function inscricaoPaga($id =null){
    		//$this->autoRender = false;
	        if ($this->request->is('post')) {
	            $this->Cadastro->create();
	            $this->request->data['Cadastro']['usuario_id'] = $this->Auth->user('id');
	            $this->request->data['Cadastro']['evento_id'] = $id;
	            $this->request->data['Cadastro']['evento_id'] = 0;
	            if ($this->Cadastro->save($this->request->data)) {
	                $this->Session->setFlash(__('Your post has been saved.'));
	                return $this->redirect(array('action' => 'geraBoleto'));
	            }
	            $this->Session->setFlash(__('Unable to add your post.'));
	        }
	    }

	    public function geraBoleto($id = null){
	    	$this->autoRender = false;
	    	$this->loadModel('Inscricao');
	    	$this->Inscricao->recursive= -1;
	    	$evento = $this->Inscricao->findByEventoId($id);

			$dados = array(
				'sacado' => 'Fulano de Tal',
				'endereco1' => 'Rua do funal de tal, 88',
				'endereco2' => 'Curitiba/PR',
				'valor_cobrado' => $evento['Inscricao']['valor'],
				'pedido' => 5 // Usado para gerar o número do documento e o nosso número.
			);
			$this->BoletoBb->render($dados);
	    }

	}	
?>