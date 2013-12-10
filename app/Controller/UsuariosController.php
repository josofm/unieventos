<?php 
App::uses('AppController', 'Controller');

class UsuariosController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');

	public function cadastro(){
        $isPost = $this->request->isPost(); //apagar
		if ($this->request->is('post')) {
            $this->Usuario->create();
            
            //$this->request->data['Usuario']['senha'] = Security::hash($this->request->data['Usuario']['senha'], null, true);
            //$last = $this->Usuario->save($this->request->data);
            if ($this->Usuario->save($this->request->data)) {
                $this->Session->setFlash(__('Voce foi cadastrado com sucesso.'));
                return $this->redirect(array('action' => 'sucesso'));
            }
            $this->Session->setFlash(__('Ocorreu um erro!'));
	    }
            //apagar daqui
            
            
             //ateh aqui
	    self::getEstado();	
	}

	public function getEstado(){
			//projetos = $this->Aluno->Projeto->find('list', array('fields' => array('id', 'nome')));
			$this->set('estados', $this->Usuario->Estado->find('list',array('fields' => array('id','nome'))));
			$this->set(compact('Estado'));
	}

	public function sucesso(){

	}

	// action do prefix admin

	public function admin_index(){
		$this->Usuario->recursive= 0;
		$this->set('usuarios', $this->Usuario->find('all'));
	}

	public function admin_deletar($id) {
	    if ($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }

	    if ($this->Usuario->delete($id)) {
	        $this->Session->setFlash(
	            __('The post with id: %s has been deleted.', h($id))
	        );
	        return $this->redirect(array('action' => 'index'));
	    }
	}

	public function admin_verPerfil($id = null) {
		$this->Usuario->id = $id;
        if (!$this->Usuario->exists()) {
            throw new NotFoundException(__('Usuario Invalido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Usuario->save($this->request->data)) {
                $this->Session->setFlash(__('O Usuario foi Salvo com sucesso.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('O usuario não foi salvo, tente novamente em alguns segundos.'));
        } else {
        	$this->Usuario->recursive= 0;
            $this->request->data = $this->Usuario->read(null, $id);
            unset($this->request->data['Usuario']['senha']);
        }
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


	public function admin_perfil($id = null) {
        $this->Usuario->id = $id;
        if (!$this->Usuario->exists()) {
            throw new NotFoundException(__('Usuario Invalido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Usuario->save($this->request->data)) {
                $this->Session->setFlash(__('O Usuario foi Salvo com sucesso.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('O usuario não foi salvo, tente novamente em alguns segundos.'));
        } else {
        	$this->Usuario->recursive= 0;
            $this->request->data = $this->Usuario->read(null, $id);
            unset($this->request->data['Usuario']['senha']);
        }
    }

}
?>