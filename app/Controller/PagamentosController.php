<?php 

	App::uses('AppController', 'Controller');

	class PagamentosController extends AppController{
		public $helpers = array('Html', 'Form', 'Session');
    	public $components = array('Session','Boletos.BoletoBb');


    	public function admin_geraBoleto($id = null){
	    	$this->autoRender = false;
	    	$this->loadModel('Inscricao');
	    	$this->Inscricao->recursive= -1;
	    	$evento = $this->Inscricao->findByEventoId($id);

			$dados = array(
				'sacado' => 'Fulano de Tal',
				'endereco1' => 'Rua do funal de tal, 88',
				'endereco2' => 'Curitiba/PR',
				'valor_cobrado' => $evento['Inscricao']['valor'],
				'pedido' => 5 // Usado para gerar o número do documento e o nosso número.
			);
			$this->BoletoBb->render($dados);
	    }
	}

?>