<?php 
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class EventosController extends AppController{
	public $helpers = array('Html', 'Form','Locale.Locale');
	public $components = array('Session');


    public function todosEventos(){
       $this->set('eventos', 
            $this->Evento->find(
            'all', array( 
                'conditions' => array('aprovacao' => 1)
                )
            )
        );
        
    }

    public function todosProximo(){
       $this->set('eventos', 
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

    public function verMais($id = null) {
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

    public function admin_informacoes($id = null){
        if(!$id)
            throw new NotFoundException(__('Evento Invalido'));
        $evento = $this->Evento->findById($id);
        if(!$evento)
            throw new NotFoundException(__('Evento Invalido'));
        $this->set('evento', $evento);
    }

    public function admin_inscritos($id = null){
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
        $dados = $this->Evento->Cadastro->find(
            'all', array(
                'fields' => array('*'),
                'conditions' => array(
                    'Cadastro.evento_id' => $id
                    ),
                'joins' => array(
                    array(
                            'table' => 'usuarios',
                            'alias' => 'user',
                            'type' => 'INNER', 
                            'conditions'=> array(
                                'user.id = Cadastro.usuario_id'
                                )
                        ),
                    array(
                            'table' => 'pagamentos',
                            'alias' => 'pag',
                            'type' => 'INNER', 
                            'conditions'=> array(
                                'AND' => array(
                                    array('pag.cadastros_evento_id' => $id),
                                    array('pag.cadastros_usuario_id =  Cadastro.usuario_id')
                                )
                            )
                        )
                    )
                )
            );
        if (!$dados) {
                throw new NotFoundException(__('Invalid post'));
            }
        $this->set('dados', $dados);
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

    public function admin_certificados($id = null){
        if(!$id)
            throw new NotFoundException(__('Evento Invalido'));

        $event = $this->Evento->findById($id);
        
        if(!$event)
            throw new NotFoundException(__('Evento Invalido'));

        $this->set('evento', $event);

    }

    public function logar(){
        
    }

}
?>