<?php 
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class EventosController extends AppController{
	public $helpers = array('Html', 'Form');
	public $components = array('Session');


    public function todosEventos(){
       $this->set('evento', 
            $this->Evento->find(
            'all', array( 
                'conditions' => array('aprovacao' => 1)
                )
            )
        );
        
    }

    public function todosInicio(){
       $this->set('evento', 
            $this->Evento->find(
            'all', array( 
                'conditions' => array(
                    'aprovacao' => 1,
                    'data_ini >= CURDATE()'
                    ),
                'order' => array('data_ini ASC')
                )
            )
        );        
    }


    public function view($id = null) {
        //$this->Evento->recursive= 0;
        $this->Evento->id = $id;
        if (!$this->Evento->exists()) {
            throw new NotFoundException(__('Evento invalido'));
        }
        $this->Evento->hasMany['Inscricao']['conditions'] = array('Inscricao.evento_id' => $id);

        $this->set('evento', $this->Evento->findById($id));
    }

	public function admin_index(){
		$this->Evento->recursive= 0;
		$this->set('eventos', $this->Evento->findById('all'));
	}

	public function admin_cadastrarEvento() {
	    if ($this->request->is('post')) {
	    	$this->Evento->create();
            $this->request->data['Evento']['nivel'] = 1 ;// 1 = dono do evento
            if ($this->Evento->saveAll($this->request->data)) {
                $id = $this->Evento->id;
	        	$this->Session->setFlash(__('O Evento foi cadastrado com sucesso!'),'success');
	        	$this->redirect(array('controller' => 'inscricoes','action' => 'inscricoesEvento',$id));
	      	} else {
	        	$this->Session->setFlash(__('Erro ao cadastrar o evento. Por favor, tente novamente em alguns segundos.'),'error');
	      	} 
	    }
	}


	public function admin_verEvento($id = null){
		if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $evento = $this->Evento->findById($id);
        if (!$evento) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('evento', $evento);
	}

	public function admin_meusEventos(){
		$this->set('eventos', $this->Evento->find(
        	'all', array(
        		'fields' => array('*'),
        		'conditions' => array( 
        			'Evento.aprovacao ' => '1' 
        			),
        		'joins' =>  array(
                    array(
                        'table' => 'cadastros',
                        'alias' => 'Euser',
                        'type' => 'INNER', 
                        'conditions'=> array(
                        	'Euser.usuario_id' => $this->Auth->user('id')
                        	)
                    )
              	),
              	'group' => 'id'
            )
        ));
	}

	public function admin_listaAprovacoes(){
		$this->set('lista', $this->Evento->find('all', array('conditions' => array('Evento.aprovacao = 0'))));
	}

	public function admin_aprovacao($id = null){
    $this->autoRender = false;
      if (!$id) {
            throw new NotFoundException(__('Evento Invalido'));
        }

  
        //if ($this->request->is(array('post', 'put'))) {
            $this->Evento->id = $id;
           $this->Evento->aprovacao = 1;
           $this->request->data['Evento']['aprovacao'] = 1;
            $this->Evento->save($this->request->data);
            $Email = new CakeEmail('gmail');
            $Email->from(array('me@example.com' => 'My Site'));
            $Email->to('asantos@inf.ufsm.com');
            $Email->subject('About');
            $Email->send('minha mensagem');
 
           $this->redirect(array('action' => 'admin_listaAprovacoes'));
        
    }

    public function admin_listarEventos(){
        $this->set('lista', $this->Evento->find('all', array('conditions' => array('Evento.aprovacao = 1'))));   
    }

    public function eventosRecentes(){
        $this->Evento->recursive= 0;
       return $this->Evento->find(
            'all', array(
                'limit' => 4, 
                'conditions' => array('aprovacao' => 1),
                'order' => array('created DESC')
                )
            );
    }

    public function eventosInicio(){
       return $this->Evento->find(
            'all', array(
                'limit' => 4, 
                'conditions' => array(
                    'aprovacao' => 1,
                    'data_ini >= CURDATE()'
                    ),
                'order' => array('data_ini ASC')
                )
            );        
    }

}
?>