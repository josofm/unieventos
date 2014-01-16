<?php 
App::uses('AppController', 'Controller');

class MsgsController extends AppController {
	
	public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');
    
    public function admin_index() {
        $this->set('msgs', $this->Msg->find(
        	'all', array(
        		'fields' => array('*'),
        		'conditions' => array( 
        			'Msg.usuario_msg ' => $this->Auth->user('id') 
        			),
        		'joins' =>  array(
                    array(
                        'table' => 'usuarios',
                        'alias' => 'Usuario',
                        'type' => 'INNER', 
                        'conditions'=> 'Usuario.id = Msg.usuarios_id'
                    )
              	)
            )
        ));
    }

    public function admin_conta(){
        return $this->Msg->find(
            'count', array(
                'fields' => array('*'),
                'conditions' => array( 
                    'Msg.usuario_msg ' => $this->Auth->user('id'),
                    'Msg.status' => 0 
                    ),
                'joins' =>  array(
                    array(
                        'table' => 'usuarios',
                        'alias' => 'Usuario',
                        'type' => 'INNER', 
                        'conditions'=> 'Usuario.id = Msg.usuarios_id'
                    )
                )
            )
        );
    }


    public function admin_visualizar($id) {
        if (!$id) {
            throw new NotFoundException(__('Erro! Menssagem invalida'));
        }

        $post = $this->Msg->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Erro! Menssagem invalida'));
        }
        $this->set('msg', $post);
    	$this->Msg->id = $id;
    	$this->request->data['Msg']['status'] = 1;
    	$this->Msg->save($this->request->data);
        
    

    
    }

    public function admin_enviar() {
        if ($this->request->is('post')) {
            $this->Msg->create();
            $this->request->data['Msg']['usuarios_id'] = $this->Auth->user('id');
            if ($this->Msg->save($this->request->data)) {
                $this->Session->setFlash(__('Sua menssagem foi enviada.'),'success');
                return $this->redirect(array('action' => 'index','admin' => true));
            }else{
            	$this->Session->setFlash(__('Erro ao enviar sua menssagem.'), 'error');	
            }    
        }
        $this->loadModel('Usuario');
        $this->set('usuarios', $this->Usuario->find('list',array('fields' => array('id','nome'))));
        $this->set(compact('Usuarios'));
		
    }


    public function admin_naoLidas(){
        return $this->Msg->find(
            'all', array(
                'fields' => array('*'),
                'conditions' => array( 
                    'Msg.usuario_msg ' => $this->Auth->user('id'),
                    'Msg.status' => 0 
                    ),
                'joins' =>  array(
                    array(
                        'table' => 'usuarios',
                        'alias' => 'Usuario',
                        'type' => 'INNER', 
                        'conditions'=> 'Usuario.id = Msg.usuarios_id'
                    )
                )
            )
        );
    }


}

?>