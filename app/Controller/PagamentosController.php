<?php 

	App::uses('AppController', 'Controller');

	class PagamentosController extends AppController{
		public $helpers = array('Html', 'Form', 'Session');
    	public $components = array('Session');

	    public function admin_validarPagamento($dados = null){
	    	$dados = explode('-', $dados);
	    	if (!$dados[0] && !$dados[1]) {
		        throw new NotFoundException(__('Invalid post'));
		    }

		    $pag = $this->Pagamento->findById($dados[2]);
		    if (!$pag) {
		        throw new NotFoundException(__('Invalid post'));
		    }
		    $this->request->data['Pagamento']['status'] = 1;
		    if ($this->request->is(array('post', 'put'))) {
		        $this->Pagamento->id = $dados[2];
		        if ($this->Pagamento->save($this->request->data)) {
		            $this->Session->setFlash(__('Your post has been updated.'));
		            return $this->redirect(array('controller' => 'eventos', 'action' => 'inscritos', $dados[1]));
		        }
		        $this->Session->setFlash(__('Unable to update your post.'));
		    }else{
		    	$usuario = $this->Pagamento->find('first',
		    		array(
		    			'fields' => array('*'),
                		'conditions' => array(
                    		'Pagamento.cadastros_usuario_id' => $dados[0]
                    	),
                    	'joins' => array(
                    		array(
	                            'table' => 'usuarios',
	                            'alias' => 'user',
	                            'type' => 'INNER', 
	                            'conditions'=> array(
	                                'user.id' => $dados[0]
                                )
                        	)
                		)
		    		)
		    	);
		    	$this->set('usuario', $usuario);
		    }

		    if (!$this->request->data) {
		        $this->request->data = $pag;
		    }
		}
	}

?>