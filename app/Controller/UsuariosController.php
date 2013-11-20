<?php 
App::uses('AppController', 'Controller');

class UsuariosController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');

	public function cadastro(){
		if ($this->request->is('post')) {
            $this->Usuario->create();
            if ($this->Usuario->save($this->request->data)) {
                $this->Session->setFlash(__('Voce foi cadastrado com sucesso.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Ocorreu um erro!'));
	    }
	    self::getEstado();	
	}

	public function getEstado(){
			//projetos = $this->Aluno->Projeto->find('list', array('fields' => array('id', 'nome')));
			$this->set('estados', $this->Usuario->Estado->find('list',array('fields' => array('id','nome'))));
			$this->set(compact('Estado'));
		}

}
?>