<?php 
App::uses('AppController', 'Controller');

class EventosController extends AppController{
	public $helpers = array('Html', 'Form');
	public $components = array('Session');

	public function admin_add() {
	    if ($this->request->is('post')) {
	    	$this->Evento->create();
	    	if ($this->Evento->saveAll($this->request->data)) {
	        	$this->Session->setFlash(__('The post has been saved'));
	        	$this->redirect(array('action' => 'index'));
	      	} else {
	        	$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
	      	} 
	    }
	}

	public function admin_listaAprovacoes(){
		$this->set('lista', $this->Evento->find('all', array('conditions' => array('Evento.aprovacao = 0'))));
	}

	public function admin_aprovacao($id = null){
		$this->autoRender = false;
		if (!$id) {
	        throw new NotFoundException(__('Evento Invalido'));
	    }

	    $evento = $this->Evento->findById($id);
	    if (!$evento) {
	        throw new NotFoundException(__('Invalid post'));
	    }

	    //if ($this->request->is(array('post', 'put'))) {
	        $this->Evento->id = $id;
	        $this->Evento->aprovacao = 1;
	        $this->Evento->save($this->request->data);
	    
	}


}
?>