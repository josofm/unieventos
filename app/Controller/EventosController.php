<?php 
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class EventosController extends AppController{
	public $helpers = array('Html', 'Form');
	public $components = array('Session');

	public function admin_index(){
		$this->Evento->recursive= 0;
		$this->set('eventos', $this->Evento->find('all'));
	}

	public function admin_cadastrarEvento() {
	    if ($this->request->is('post')) {
	    	$this->Evento->create();
	    	if ($this->Evento->saveAll($this->request->data)) {
	        	$this->Session->setFlash(__('O Evento foi cadastrado com sucesso'),'success');
	        	$this->redirect(array('action' => 'index'));
	      	} else {
	        	$this->Session->setFlash(__('Erro ao cadastrar o evento. Por favor, tente novamente em alguns segundos.'),'error');
	      	} 
	    }
	}

	public function admin_listaAprovacoes(){
		$this->set('lista', $this->Evento->find('all', array('conditions' => array('Evento.aprovacao = 0'))));
	}

	public function admin_aprovacao($id = null){
		if (!$id) {
	        throw new NotFoundException(__('Evento Invalido'));
	    }

	    $evento = $this->Evento->findById($id);
	    if (!$evento) {
	        throw new NotFoundException(__('Evento Invalido'));
	    }

	    //if ($this->request->is(array('post', 'put'))) {
	        $this->Evento->id = $id;
	        $this->request->data['Evento']['aprovacao'] = 1;
	        $this->Evento->save($this->request->data);
	        $Email = new CakeEmail('default');
			$Email->from(array('adrianoknofre@gmail.com' => 'My Site'));
			$Email->to('asantos@inf.ufsm.br');
			$Email->subject('About');
			$Email->send('My message');


	        $this->redirect(array('action' => 'admin_listaAprovacoes'));
	    
	}


}
?>