<?php 
	App::uses('AppController', 'Controller');

	class PresencasController extends AppController{
		public $helpers = array('Html', 'Form', 'Session');
    	public $components = array('Session');


    	public function admin_chamada($id = null){
    		if(!$id)
				throw new NotFoundException(__('Evento Invalido'));
			$this->loadModel('Evento');
			$evento = $this->Evento->findById($id);
			if(!$evento)
				throw new NotFoundException(__('Evento Invalido'));
			if($this->request->is('post')){
				$this->Presenca->create();
				$this->Presenca->cadastros_evento_id= $id;
				$this->Presenca->status= 1;
				if($this->Presenca->save($this->request->data)){
					$this->Session->setFlash(__('Presença Confirmada'));
					$this->redirect(array('action' => 'chamada', 'admin' => true, $id));
				}else{
					$this->Session->setFlash(__('Erro ao cadastrar a presença.'));
				}
			}else
				$this->loadModel('Usuario');
				$this->set('usuarios',$this->Usuario->find('list', array('fields' => array('id','nome'))));
				$this->loadModel('Programacao');
				$this->set('prog', $this->Programacao->find('list',array(
					'fields' => array('id','titulo'),
					'conditions' => array('evento_id' => $id )
					)));
				$this->set('evento', $evento);
    	}

    	public function admin_listar($id = null){
    		$pres = $this->Presenca->find('all', array(
    			'fields' => array('*'),
    			'conditions' => array(
    				'Presenca.cadastros_evento_id' => $id
    				),
    			'joins' => array(
    				array(
    					'table' => 'usuarios',
    					'alias' => 'user',
    					'type' => 'INNER',
    					'conditions' => array(
    						'user.id = Presenca.cadastros_usuario_id'
    						)
    					)
    				)
    			)
    		);
    		$this->set('pres',$pres);
    	}
	}
?>