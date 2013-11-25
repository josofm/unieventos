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

	public function admin_cadastro(){
		if ($this->request->is('post')) {
            $this->Usuario->create();
            if ($this->Usuario->save($this->request->data)) {
                $this->Session->setFlash(__('O usuario foi cadastrado com sucesso.'));
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

	public function admin_login(){
			$this->layout = 'login';
			if($this->request->is('post')){
				if($this->Auth->login()){
					$this->redirect(array('controller' => 'pages', 'action' => 'index', 'admin' => true));	
				}
					
				}else{
					$this->Session->setFlash('Siape e/ou Senha Incorretos!');
				}
			}
	public function admin_logout(){
			$this->redirect($this->Auth->logout());
		}




}
?>