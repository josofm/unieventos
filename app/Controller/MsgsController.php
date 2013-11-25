<?php 
App::uses('AppController', 'Controller');

class MsgsController extends AppController {
	
	public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');
    
    public function admin_index() {
        $this->set('recados', $this->Msg->find('list',array('fields' => array('id','titulo'), 'conditions' => array('usuarios_msg' => $this->Auth->user('id')))));
			$this->set(compact('Recado'));
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }

    public function admin_enviar() {
        if ($this->request->is('post')) {
            $this->Msg->create();
            $this->request->data['Msg']['usuarios_id'] = $this->Auth->user('id');
            if ($this->Msg->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                //return $this->redirect(array('action' => 'index'));
            }else{
            	$this->Session->setFlash(__('Unable to add your post.'));	
            }    
        }
        $this->set('usuarios', $this->Msg->Usuario->find('list',array('fields' => array('id','nome'))));
		$this->set(compact('Usuario'));
    }



}

?>