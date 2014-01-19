<?php 
	class InscricoesController extends AppController{
		public $uses = array('Inscricao');
		public $helpers = array('Html', 'Form');
		public $components = array('Session');

		public function admin_index(){

		}

		public function admin_inscrever($idEvento = null){
			if ($this->request->is('post')) {
            	$this->Inscricao->create();
            	$this->request->data['Inscricao']['evento_id'] = $idEvento;
            if ($this->Inscricao->saveAll($this->request->data)) {
                $this->Session->setFlash(__('A programação foi salva.'),'success');
                return $this->redirect(array('action' => 'index','admin' => true, $id));
            }else{
            	$this->Session->setFlash(__('Erro ao enviar sua menssagem.'), 'error');	
            }    
        }	
		}

		public function admin_inscricoesEvento($idEvento = null){
			if ($this->request->is('post')) {
	            $this->Inscricao->create();
	            $this->request->data['Inscricao']['evento_id'] = $idEvento;
	            if ($this->Inscricao->save($this->request->data)) {
	                $this->Session->setFlash(__('Seu Evento foi cadastrado.'));
	                return $this->redirect(array('controller' => 'pages','action' => 'index', 'admin' => true));
	            }
	            $this->Session->setFlash(__('Unable to add your post.'));
	        }
		}
	}

?>